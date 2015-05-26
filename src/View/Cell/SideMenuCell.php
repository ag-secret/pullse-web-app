<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SideMenu cell
 */
class SideMenuCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    protected $items = [
        [
            'icon' => 'send',
            'label'=> 'Notificações push',
            'url' => [
                'controller' => 'CustomPushNotifications',
                'action' => 'index'
            ]
        ],
        [
            'icon' => 'fire',
            'label'=> 'Eventos',
            'url' => [
                'controller' => 'Events',
                'action' => 'index'
            ]
        ],
        [
            'icon' => 'bullhorn',
            'label'=> 'Propagandas',
            'url' => [
                'controller' => 'Ads',
                'action' => 'index'
            ]
        ],
        [
            'icon' => 'flash',
            'label'=> 'Clientes',
            'url' => [
                'controller' => 'Users',
                'action' => 'index'
            ]
        ],
        [
            'icon' => 'user',
            'label'=> 'Usuários',
            'url' => [
                'controller' => 'AdmUsers',
                'action' => 'index'
            ]
        ]
    ];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($loggedinUser)
    {
        $this->set(compact('loggedinUser'));
        $this->set(['items' => $this->items]);
    }
}
