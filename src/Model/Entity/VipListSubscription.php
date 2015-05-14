<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VipListSubscription Entity.
 */
class VipListSubscription extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'event_id' => true,
        'user_id' => true,
        'sexo' => true,
        'event' => true,
        'user' => true,
    ];
}
