<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Club Entity.
 */
class Club extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'descricao' => true,
        'foto_capa' => true,
        'foto_perfil' => true,
        'is_active' => true,
        'lat' => true,
        'lng' => true,
        'raio' => true,
        'map_zoom' => true,
        'adm_users' => true,
        'events' => true,
        'users' => true,
    ];
}
