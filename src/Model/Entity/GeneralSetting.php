<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GeneralSetting Entity.
 */
class GeneralSetting extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'notificacoes_semana_ultimo' => true,
        'club_id' => true,
        'club' => true,
    ];
}
