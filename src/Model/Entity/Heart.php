<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Heart Entity.
 */
class Heart extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id1' => true,
        'user_id2' => true,
        'event_id' => true,
        'combination' => true,
        'combination_created' => true,
        'message' => true,
        'message_sender' => true,
        'event' => true,
    ];
}
