<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Checkin Entity.
 */
class Checkin extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'event_id' => true,
        'lat' => true,
        'lng' => true,
        'user' => true,
        'event' => true,
    ];
}
