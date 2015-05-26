<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomPushNotification Entity.
 */
class CustomPushNotification extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'message' => true,
        'club_id' => true,
        'last_sended' => true,
        'club' => true,
    ];
}
