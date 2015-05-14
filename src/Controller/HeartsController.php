<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hearts Controller
 *
 * @property \App\Model\Table\HeartsTable $Hearts
 */
class HeartsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events']
        ];
        $this->set('hearts', $this->paginate($this->Hearts));
        $this->set('_serialize', ['hearts']);
    }

    /**
     * View method
     *
     * @param string|null $id Heart id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $heart = $this->Hearts->get($id, [
            'contain' => ['Events']
        ]);
        $this->set('heart', $heart);
        $this->set('_serialize', ['heart']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $heart = $this->Hearts->newEntity();
        if ($this->request->is('post')) {
            $heart = $this->Hearts->patchEntity($heart, $this->request->data);
            if ($this->Hearts->save($heart)) {
                $this->Flash->success('The heart has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The heart could not be saved. Please, try again.');
            }
        }
        $events = $this->Hearts->Events->find('list', ['limit' => 200]);
        $this->set(compact('heart', 'events'));
        $this->set('_serialize', ['heart']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Heart id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $heart = $this->Hearts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $heart = $this->Hearts->patchEntity($heart, $this->request->data);
            if ($this->Hearts->save($heart)) {
                $this->Flash->success('The heart has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The heart could not be saved. Please, try again.');
            }
        }
        $events = $this->Hearts->Events->find('list', ['limit' => 200]);
        $this->set(compact('heart', 'events'));
        $this->set('_serialize', ['heart']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Heart id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $heart = $this->Hearts->get($id);
        if ($this->Hearts->delete($heart)) {
            $this->Flash->success('The heart has been deleted.');
        } else {
            $this->Flash->error('The heart could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
