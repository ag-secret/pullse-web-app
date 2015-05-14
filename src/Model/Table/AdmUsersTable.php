<?php
namespace App\Model\Table;

use App\Model\Entity\AdmUser;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Auth\DefaultPasswordHasher;

/**
 * AdmUsers Model
 */
class AdmUsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('adm_users');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id',
            'joinType' => 'INNER'
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

            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'valid', ['rule' => 'email'])

            ->add('username', 'unique', [
                'rule' => ['validateUnique',
                    ['scope' => 'club_id']
                ],
                'provider' => 'table'
            ])

            ->add('is_active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active')

            ->requirePresence('password', 'create')
            ->notEmpty('password', null, 'create')
            ->add('password', 'length', [
                'rule' => ['minlength', 4]
            ])
            ->add('current_password', 'custom', [
                'rule' => function($value, $context){
                    $user = $this->get($context['data']['id']);
                    if ($user) {
                        return (new DefaultPasswordHasher)->check($value, $user->password);
                    }
                    return false;
                },
                'message' => 'Você não confirmou a sua senha atual corretamente'
            ])
            ->add('password', 'custom', [
                'rule' => function($value, $context){
                    if ($context['data']['password'] != $context['data']['confirm_password']) {
                        return false;
                    }
                    return true;
                },
                'message' => 'Você não confirmou a senha corretamente.'
            ]);

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
        // $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));
        return $rules;
    }
}
