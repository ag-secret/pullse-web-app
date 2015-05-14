<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'facebook_uid' => true,
        'app_access_token' => true,
        'facebook_access_token' => true,
        'platform' => true,
        'android_gcm_device_regid' => true,
        'dt_nascimento' => true,
        'sexo' => true,
        'club_id' => true,
        'email' => true,
        'is_active' => true,
        'club' => true,
        'checkins' => true,
        'messages' => true,
        'vip_list_subscriptions' => true,
    ];
}
