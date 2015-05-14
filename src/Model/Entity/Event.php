<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;

/**
 * Event Entity.
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'data_inicio' => true,
        'data_fim' => true,
        'descricao' => true,
        'imagem_capa_placeholder' => true,
        'descricao_lista_vip' => true,
        'lista_vip_qtd_masc' => true,
        'lista_vip_qtd_fem' => true,
        'lista_vip_dt_inicio' => true,
        'lista_vip_dt_fim' => true,
        'facebook_img' => true,
        'club_id' => true,
        'is_active' => true,
        'club' => true,
        'checkins' => true,
        'hearts' => true,
        'vip_list_subscriptions' => true,
        'tags' => true,
        'tag_string' => true,
        'vip_list_fem_subscriptions' => true,
        'vip_list_masc_subscriptions' => true,
        'deleted' => false
    ];

    protected function _getVipListFemSubscriptions()
    {
        $result = $this->_subscriptionsByGender('f');
        return $result;
    }

    protected function _getVipListMascSubscriptions()
    {
        $result = $this->_subscriptionsByGender('m');
        return $result;
    }

    protected function _subscriptionsByGender($gender)
    {
        $subscriptions = TableRegistry::get('vip_list_subscriptions');

        $result = $subscriptions->find('all', [
            'conditions' => [
                'event_id' => $this->_properties['id'],
                'sexo' => $gender
            ]
        ])
        ->count('*');

        return $result;
    }

    protected function _getTagString()
    {
        if (isset($this->_properties['tag_string'])) {
            return $this->_properties['tag_string'];
        }
        if (empty($this->tags)) {
            return '';
        }
        $tags = new Collection($this->tags);
        $str = $tags->reduce(function ($string, $tag) {
            return $string . $tag->name . ', ';
        }, '');

        return trim($str, ', ');
    }

}
