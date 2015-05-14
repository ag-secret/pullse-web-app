<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Checkins Controller
 *
 * @property \App\Model\Table\CheckinsTable $Checkins
 */
class CheckinsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Events']
        ];
        $this->set('checkins', $this->paginate($this->Checkins));
        $this->set('_serialize', ['checkins']);
    }

    /**
     * View method
     *
     * @param string|null $id Checkin id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $checkin = $this->Checkins->get($id, [
            'contain' => ['Users', 'Events']
        ]);
        $this->set('checkin', $checkin);
        $this->set('_serialize', ['checkin']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $checkin = $this->Checkins->newEntity();
        if ($this->request->is('post')) {
            $checkin = $this->Checkins->patchEntity($checkin, $this->request->data);
            if ($this->Checkins->save($checkin)) {
                $this->Flash->success('The checkin has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The checkin could not be saved. Please, try again.');
            }
        }
        $users = $this->Checkins->Users->find('list', ['limit' => 200]);
        $events = $this->Checkins->Events->find('list', ['limit' => 200]);
        $this->set(compact('checkin', 'users', 'events'));
        $this->set('_serialize', ['checkin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Checkin id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $checkin = $this->Checkins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkin = $this->Checkins->patchEntity($checkin, $this->request->data);
            if ($this->Checkins->save($checkin)) {
                $this->Flash->success('The checkin has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The checkin could not be saved. Please, try again.');
            }
        }
        $users = $this->Checkins->Users->find('list', ['limit' => 200]);
        $events = $this->Checkins->Events->find('list', ['limit' => 200]);
        $this->set(compact('checkin', 'users', 'events'));
        $this->set('_serialize', ['checkin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Checkin id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $checkin = $this->Checkins->get($id);
        if ($this->Checkins->delete($checkin)) {
            $this->Flash->success('The checkin has been deleted.');
        } else {
            $this->Flash->error('The checkin could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
