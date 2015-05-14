<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id'
        ]);
        $this->hasMany('Checkins', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('VipListSubscriptions', [
            'foreignKey' => 'user_id'
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
            ->requirePresence('facebook_uid', 'create')
            ->notEmpty('facebook_uid')
            ->requirePresence('app_access_token', 'create')
            ->notEmpty('app_access_token')
            ->requirePresence('facebook_access_token', 'create')
            ->notEmpty('facebook_access_token')
            ->requirePresence('platform', 'create')
            ->notEmpty('platform')
            ->allowEmpty('android_gcm_device_regid')
            ->add('dt_nascimento', 'valid', ['rule' => 'date'])
            ->requirePresence('dt_nascimento', 'create')
            ->notEmpty('dt_nascimento')
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo')
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('is_active', 'valid', ['rule' => 'numeric'])
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));
        return $rules;
    }
}
