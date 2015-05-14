<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


use Cake\ORM\Entity;
use Cake\Event\Event;

use Cake\Utility\Security;

use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

use Cake\Network\Exception\NotFoundException;

/**
 * Events Model
 */
class EventsTable extends Table
{

    public $imagemCapaMaxSize = 1000; // Em kb

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->table('events');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id'
        ]);
        $this->hasMany('Checkins', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('Hearts', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('VipListSubscriptions', [
            'foreignKey' => 'event_id'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'events_tags'
        ]);
    }

    protected function _handle($value)
    {
        return trim(strtolower($value));
    }

    protected function _buildTags($tagString)
    {
        $new = array_unique(array_map([$this, '_handle'], explode(',', $tagString)));
        $out = [];
        $query = $this->Tags->find()
            ->where(['Tags.name IN' => $new]);

        // Remove existing tags from the list of new tags.
        foreach ($query->extract('name') as $existing) {
            $index = array_search($existing, $new);
            if ($index !== false) {
                unset($new[$index]);
            }
        }
        // Add existing tags.
        foreach ($query as $tag) {
            $out[] = $tag;
        }
        // Add new tags.
        foreach ($new as $tag) {
            $out[] = $this->Tags->newEntity(['name' => $tag]);
        }
        return $out;
    }

    public function beforeSave($event, $entity)
    {
        if ($entity->tag_string) {
            $entity->tags = $this->_buildTags($entity->tag_string);
        }

        if ($entity->imagem_capa_placeholder['name']) {
            // IMPORTANTE, se possuir imagem upload ele apaga a facebook pq deve sobrepor
            $entity->facebook_img = null;

            $file = new File($entity->imagem_capa_placeholder['name']);
            $ext = $file->ext();

            $fileNamehashed = Security::hash($file->name(), 'md5');
            $entity->imagem_capa = "imagem.{$ext}";
        }

        if ($entity->facebook_img) {
            // IMPORTANTE, se possuir iamgem facebook suprepor a image_capa
            $entity->imagem_capa = null;
        }
    
    }

    public function afterSave($event, $entity)
    {
        if (isset($entity->imagem_capa_placeholder)) {
            switch ($entity->imagem_capa_placeholder['error']) {
                case UPLOAD_ERR_OK:
                    $this->uploadImage($entity);
                    break;
                // Se não possuir arquivo tudo bem, nao tratar como erro
                case UPLOAD_ERR_NO_FILE:
                    break;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }
        }
    }

    public function uploadImage($entity)
    {
        $destFolderPath = Folder::addPathElement(
            WWW_ROOT,
            [
                'img',
                'eventos',
                $entity->id
            ]
        );

        $destFolder = new Folder();

        if ($destFolder->create($destFolderPath, true, 0755)) {

            $file = new File($entity->imagem_capa_placeholder['tmp_name']);

            if (!$file->copy(Folder::addPathElement($destFolderPath, $entity->imagem_capa), true)) {
                throw new Exception('Erro ao copiar a imagem', 1);
            }
        };
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('data_inicio', 'valid', ['rule' => 'datetime'])
            ->requirePresence('data_inicio', 'create')
            ->notEmpty('data_inicio')
            ->add('data_fim', 'valid', ['rule' => 'datetime'])
            ->requirePresence('data_fim', 'create')
            ->notEmpty('data_fim')
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao')
            
            ->allowEmpty('imagem_capa_placeholder')

            ->add('imagem_capa_placeholder', 'fileSize', [
                'rule' => function($value, $context){
                    if (($value['size'] / 1024) > $this->imagemCapaMaxSize) {
                        return false;
                    }
                    return true;
                },
                'message' => "A imagem excedeu o máximo permitido"
            ])
            ->add('imagem_capa_placeholder', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'A imagem deve estar no formato JPG ou PNG'
            ])

            ->notEmpty('descricao_lista_vip', 'Por favor, preencha este campo', function($context){
                if (empty($context['data']['lista_vip_qtd_fem']) && empty($context['data']['lista_vip_qtd_masc'])) {
                    return false;
                }
                return true;
            })

            ->requirePresence('lista_vip_qtd_fem', 'create')
            ->notEmpty('lista_vip_qtd_fem')
            ->add('lista_vip_qtd_fem', 'valid', ['rule' => 'numeric'])

            ->requirePresence('lista_vip_qtd_masc', 'create')
            ->notEmpty('lista_vip_qtd_masc')
            ->add('lista_vip_qtd_masc', 'valid', ['rule' => 'numeric'])

            ->add('lista_vip_dt_inicio', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('lista_vip_dt_inicio')

            ->add('lista_vip_dt_fim', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('lista_vip_dt_fim')

            ->allowEmpty('facebook_img')

            ->add('is_active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));
        return $rules;
    }
}
