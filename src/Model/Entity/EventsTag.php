<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventsTag Entity.
 */
class EventsTag extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'event_id' => true,
        'tag_id' => true,
        'event' => true,
        'tag' => true,
    ];
}
