<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdsSetting Entity.
 */
class AdsSetting extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'club_id' => true,
        'intervalo_ad' => true,
        'intervalo_chk' => true,
        'club' => true,
    ];
}
