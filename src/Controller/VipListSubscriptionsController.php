<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VipListSubscriptions Controller
 *
 * @property \App\Model\Table\VipListSubscriptionsTable $VipListSubscriptions
 */
class VipListSubscriptionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Users']
        ];
        $this->set('vipListSubscriptions', $this->paginate($this->VipListSubscriptions));
        $this->set('_serialize', ['vipListSubscriptions']);
    }

    /**
     * View method
     *
     * @param string|null $id Vip List Subscription id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vipListSubscription = $this->VipListSubscriptions->get($id, [
            'contain' => ['Events', 'Users']
        ]);
        $this->set('vipListSubscription', $vipListSubscription);
        $this->set('_serialize', ['vipListSubscription']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vipListSubscription = $this->VipListSubscriptions->newEntity();
        if ($this->request->is('post')) {
            $vipListSubscription = $this->VipListSubscriptions->patchEntity($vipListSubscription, $this->request->data);
            if ($this->VipListSubscriptions->save($vipListSubscription)) {
                $this->Flash->success('The vip list subscription has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The vip list subscription could not be saved. Please, try again.');
            }
        }
        $events = $this->VipListSubscriptions->Events->find('list', ['limit' => 200]);
        $users = $this->VipListSubscriptions->Users->find('list', ['limit' => 200]);
        $this->set(compact('vipListSubscription', 'events', 'users'));
        $this->set('_serialize', ['vipListSubscription']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vip List Subscription id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vipListSubscription = $this->VipListSubscriptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vipListSubscription = $this->VipListSubscriptions->patchEntity($vipListSubscription, $this->request->data);
            if ($this->VipListSubscriptions->save($vipListSubscription)) {
                $this->Flash->success('The vip list subscription has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The vip list subscription could not be saved. Please, try again.');
            }
        }
        $events = $this->VipListSubscriptions->Events->find('list', ['limit' => 200]);
        $users = $this->VipListSubscriptions->Users->find('list', ['limit' => 200]);
        $this->set(compact('vipListSubscription', 'events', 'users'));
        $this->set('_serialize', ['vipListSubscription']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vip List Subscription id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vipListSubscription = $this->VipListSubscriptions->get($id);
        if ($this->VipListSubscriptions->delete($vipListSubscription)) {
            $this->Flash->success('The vip list subscription has been deleted.');
        } else {
            $this->Flash->error('The vip list subscription could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
