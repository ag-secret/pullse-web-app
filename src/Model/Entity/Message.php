<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity.
 */
class Message extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'mensagem' => true,
        'is_active' => true,
        'is_read' => true,
        'user_id' => true,
        'user' => true,
    ];
}
