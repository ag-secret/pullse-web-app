<?php
namespace App\Model\Table;

use App\Model\Entity\Ad;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use WideImage\WideImage;

use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

use Cake\I18n\Time;

use md5;

/**
 * Ads Model
 */
class AdsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('ads');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    public function beforeMarshal($event, $data)
    {
        if ($data['tipo'] == 0) {
            if ($data['imagem_file']['error'] == 4) {
                unset($data['imagem_file']);
            } elseif ($data['imagem_file']['error'] == 0) {
                // Como só terá uma imagem dei essa nome padrão e caso ele edite ela será sobrescripta
                $data['url'] = 'imagem.jpg';
            }
        } else {
            $data['url'] = $data['video_url'];
        }
    }

    public function afterDelete($event, $entity)
    {
        $folderPath = Folder::addPathElement(
            WWW_ROOT,
            [
                'img',
                'propagandas',
                $entity->id
            ]
        );
        $folder = new Folder($folderPath);
        if ($folder) {
            $folder->delete();
        }
    }

    public function afterSave($event, $entity)
    {
        if (isset($entity->imagem_file['error'])) {
            switch ($entity->imagem_file['error']) {
                case UPLOAD_ERR_OK:
                    $this->_uploadImage($entity);
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

    protected function _uploadImage($entity)
    {
        $destFolderPath = Folder::addPathElement(
            WWW_ROOT,
            [
                'img',
                'propagandas',
                $entity->id
            ]
        );

        $destFolder = new Folder();

        if ($destFolder->create($destFolderPath, true, 0755)) {

            $file = new File($entity->imagem_file['tmp_name']);

            WideImage::load($file->path)
                ->resize(960, 1080, 'outside')
                ->crop('top', 'center', 960, 1080)
                ->saveToFile(Folder::addPathElement($destFolderPath, $entity->url));
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');
            
        $validator
            ->add('tipo', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');
            
        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');
            
        $validator
            ->add('tempo', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tempo', 'create')
            ->notEmpty('tempo');
            
        $validator
            ->add('dt_inicio', 'valid', ['rule' => 'date'])
            ->requirePresence('dt_inicio', 'create')
            ->notEmpty('dt_inicio');
            
        $validator
            ->add('dt_fim', 'valid', ['rule' => 'date'])
            ->requirePresence('dt_fim', 'create')
            ->notEmpty('dt_fim');
            
        $validator
            ->add('ordem', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ordem', 'create')
            ->notEmpty('ordem');
            
        $validator
            ->add('ativo', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ativo', 'create')
            ->notEmpty('ativo');

        /**
         * imagem_file
         */
        $validator
            ->requirePresence('imagem_file', 'create')
            ->allowEmpty('imagem_file', function($context){
                if (isset($context['data']['tipo'])) {
                    if ($context['data']['tipo'] == 1) {
                        return true;
                    }
                    return false;
                }
            })
            ->add('imagem_file', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'A imagem deve estar no formato JPG ou PNG',
                'on' => function ($context) {
                    if (isset($context['data']['tipo'])) {
                        if ($context['data']['tipo'] == 1) {
                            return false;
                        }
                    }
                    return true;
                }
            ])
            ->add('imagem_file', 'custom', [
                'rule' => function($value, $context){
                    if ($value['error'] == 0) {
                        if (($value['size'] / 1024) <= 3000) {
                            return true;
                        }
                    }
                    return false;
                },
                'message' => 'A imagem não pode ter mais que 3 MB.',
                // 'on' => function ($context) {
                //     if (isset($context['data']['tipo'])) {
                //         if ($context['data']['tipo'] == 1) {
                //             return false;
                //         }
                //     }
                //     return true;
                // }
            ]);
            // ->add('imagem_file', 'customImage', [
            //     'rule' => function($value, $context){
            //         return false;
            //         if ($context['data']['tipo'] == 1) {
            //             if (!$value) {
            //                 return false;
            //             }
            //         }
            //         return true;
            //     },
            //     'message' => 'Você deve selecionar uma imagem'
            // ]);

        $validator
            ->allowEmpty('video_url', function($context){
                if (isset($context['data']['tipo'])) {
                    if ($context['data']['tipo'] == 0) {
                        return true;
                    }
                    return false;
                }
            });
        return $validator;
    }
}
