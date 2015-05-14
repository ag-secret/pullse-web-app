<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $layout = 'custom';
    
    public $helpers = [
        'BootstrapText',
        'Html' => [
            'className' => 'Bootstrap3.BootstrapHtml'
        ],
        'Form' => [
            'className' => 'Bootstrap3.BootstrapForm'
        ],
        'Paginator' => [
            'className' => 'Bootstrap3.BootstrapPaginator'
        ],
        'Modal' => [
            'className' => 'Bootstrap3.BootstrapModal'
        ]
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'loginAction' => [
                'controller' => 'AdmUsers',
                'action' => 'login',
                'club_slug' => $this->request->params['club_slug']
            ],
            'authError' => 'Você deve logar para acessar esta área.',
            'loginRedirect' => [
                'controller' => 'Events',
                'action' => 'index'
            ],
            'authenticate' => [
                'Form' => [
                    'contain' => ['Clubs'],
                    'userModel' => 'AdmUsers',
                    'scope' => ['AdmUsers.is_active' => 1, 'Clubs.slug' => $this->request->params['club_slug']]
                ]
            ]
        ]);
    }

    public function isAuthorized($user)
    {
        if ($user['club']['slug'] != $this->request->params['club_slug']) {
            return false;
        }
        return true;
    }

    public function beforeFilter(Event $event)
    {
        if ($this->Auth->user()) {
            $loggedinUser = $this->Auth->user();
            // print_r($loggedinUser['club']['name']);
            // exit();

            $this->set(compact('loggedinUser'));
        }
    }
}