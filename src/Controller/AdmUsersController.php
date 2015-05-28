<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\Auth\DefaultPasswordHasher;

/**
 * AdmUsers Controller
 *
 * @property \App\Model\Table\AdmUsersTable $AdmUsers
 */
class AdmUsersController extends AppController
{
    public $layout = 'custom';

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('add');
    }

    public function settings()
    {

        $admUser = $this->AdmUsers->get($this->Auth->user('id'));
        $currentPassword = $admUser->password;
        unset($admUser->password);

        if ($this->request->is(['put', 'patch'])) {

            $this->request->data['club_id'] = $this->Auth->user('club_id');

            if ($this->request->data('name')) {
                $this->_updatePersonalData($admUser, $this->request->data);
            } else {
                $this->_updatePassword($admUser, $this->request->data, $currentPassword);
            }
        }

        $this->set(compact('admUser'));
    }

    public function _updatePassword($entity, $data, $currentPassword)
    {        
        $admUser = $this->AdmUsers->patchEntity($entity, $data);
        if ($this->AdmUsers->save($admUser)) {
            $this->Flash->success('A sua senha foi alterada com sucesso!');
        }
    }

    public function _updatePersonalData($entity, $data)
    {
        $admUser = $this->AdmUsers->patchEntity($entity, $data);
        if ($this->AdmUsers->save($admUser)) {
            $this->Flash->success('Os seus dados pessoais foram atualizados com sucesso!');
        }
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clubs'],
            'conditions' => [
                'AdmUsers.club_id' => $this->Auth->user('club_id')
            ]
        ];
        $this->set('admUsers', $this->paginate($this->AdmUsers));
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admUser = $this->AdmUsers->newEntity();

        if ($this->request->is('post')) {
            $admUser = $this->AdmUsers->patchEntity($admUser, $this->request->data);
            
            $admUser->club_id = $this->Auth->user('club_id');

            if ($this->AdmUsers->save($admUser)) {
                $this->Flash->success('O usuário foi adicionado com sucesso!');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O usuário não pode ser salvo. Por favor, tente novamente.');
            }
        }
        
        $this->set(compact('admUser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adm User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $admUser = $this->AdmUsers->find('all', ['conditions' => [
            'AdmUsers.id' => $id,
            'AdmUsers.club_id' => $this->Auth->user('club_id')
        ]])->first();

        if (!$admUser) {
            throw new NotFoundException('Usuário não existe!');
        }

        if ($this->request->is(['patch', 'post', 'put'])) {

            $admUser = $this->AdmUsers->patchEntity($admUser, $this->request->data);
            if (!$this->request->data('password')) {
                unset($admUser->password);
            }
            if ($this->AdmUsers->save($admUser)) {
                $this->Flash->success('O usuário foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O usuário não pode ser salvo. Por favor, tente novamente.');
            }
        } else {
            unset($admUser->password);
        }
        $clubs = $this->AdmUsers->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('admUser'));
    }
    public function login()
    {
        $this->layout = 'login';

        $club = $this->AdmUsers->Clubs->find('all', [
            'fields' => [
                'Clubs.id',
                'Clubs.name'
            ],
            'conditions' => [
                'Clubs.slug' => $this->request->params['club_slug'],
                'Clubs.is_active' => 1
            ]
        ])->first();

        if (!$club) {
            throw new NotFoundException('Boate inexistente!');
        }
        
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->loginError('Emai ou senha incorretos','default',[],'auth');
            }
        }

        $this->set(compact('club'));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
