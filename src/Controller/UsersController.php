<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public $layout = 'custom';

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $breadcrumb = [
            'parent' => 'Clientes',
        ];

        $conditions = [];

        $q = $this->request->query('q');
        if ($q) {
            $conditions[] = ['Users.name LIKE' => "%{$q}%"];
        }

        $idadeMin = $this->request->query('idade_min');
        if ($idadeMin) {
            $conditions[] = ['TIMESTAMPDIFF(YEAR, Users.dt_nascimento, CURDATE()) >=' => $idadeMin];
        }

        $idadeMax = $this->request->query('idade_max');
        if ($idadeMax) {
            $conditions[] = ['TIMESTAMPDIFF(YEAR, Users.dt_nascimento, CURDATE()) <=' => $idadeMax];
        }

        $conditions[] = ['Users.club_id' => $this->Auth->user('club_id')];

        $this->paginate = [
            'fields' =>[
                'Users.id',
                'Users.email',
                'Users.name',
                'Users.facebook_uid',
                'Users.dt_nascimento',
                'Users.is_active'
            ],
            'conditions' => $conditions,
            'order' => ['Users.created' => 'DESC']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set(compact('breadcrumb'));
    }
}
