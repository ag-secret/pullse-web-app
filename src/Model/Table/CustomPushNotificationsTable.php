<?php
namespace App\Model\Table;

use App\Model\Entity\CustomPushNotification;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomPushNotifications Model
 */
class CustomPushNotificationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('custom_push_notifications');
        $this->displayField('title');
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->add('title', [
                'maxLength' => [
                    'rule' => ['maxLength', 14],
                    'message' => 'O título não pode ter mais de 14 caracteres'
                ]
            ]);
            
        $validator
            ->requirePresence('message', 'create')
            ->notEmpty('message')
            ->add('message', [
                'maxLength' => [
                    'rule' => ['maxLength', 120],
                    'message' => 'A mensagem não pode ter mais de 120 caracteres'
                ]
            ]);
            
        $validator
            ->add('last_sended', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('last_sended');

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
