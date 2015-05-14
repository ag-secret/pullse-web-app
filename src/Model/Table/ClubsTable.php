<?php
namespace App\Model\Table;

use App\Model\Entity\Club;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clubs Model
 */
class ClubsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('clubs');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('AdmUsers', [
            'foreignKey' => 'club_id'
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'club_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'club_id'
        ]);
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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao')
            ->allowEmpty('foto_capa')
            ->allowEmpty('foto_perfil')
            ->add('is_active', 'valid', ['rule' => 'numeric'])
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active')
            ->add('lat', 'valid', ['rule' => 'decimal'])
            ->requirePresence('lat', 'create')
            ->notEmpty('lat')
            ->add('lng', 'valid', ['rule' => 'decimal'])
            ->requirePresence('lng', 'create')
            ->notEmpty('lng')
            ->add('raio', 'valid', ['rule' => 'numeric'])
            ->add('raio', 'valid', ['rule' => ['range', 10, 200]])
            ->allowEmpty('raio')
            ->add('map_zoom', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('map_zoom');

        return $validator;
    }
}
