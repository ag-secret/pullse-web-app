<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $conditions = [];
        $q = $this->request->query('q');
        if ($q) {
            $conditions[] = ['Events.name LIKE' => "%{$q}%"];
        }

        $dataInicio = $this->request->query('data_inicio');
        if ($dataInicio) {
            $conditions[] = ['Events.data_inicio >=' => $dataInicio];
        }
        $dataFim = $this->request->query('data_fim');
        if ($dataFim) {
            $conditions[] = ['Events.data_fim <=' => $dataFim];
        }

        if ($this->request->query('order') == 'ASC') {
            $order = 'ASC';
        } else {
            $order = 'DESC';
        }

        $conditions[] = ['Events.club_id' => $this->Auth->user('club_id')];

        $conditions[] = ['Events.deleted' => 0];

        $this->paginate = [
            'contain' =>  ['Tags'],
            'limit' => 10,
            'conditions' => $conditions,
            'order' => ['Events.data_inicio' => $order]
        ];

        /**
         * Pega o último dia que envio as notificações para os celulares
         */
        $data = $this->Events->Clubs->GeneralSettings->find('all', [
            'fields' => [
                'GeneralSettings.envio_notificacoes_evento'
            ],
            'conditions' => [
                'GeneralSettings.club_id' => $this->Auth->user('club_id')
            ]
        ])
        ->first();

        $notificacao_ultimo_envio = ($data) ? $data->envio_notificacoes_evento : null;

        $this->set('events', $this->paginate($this->Events));
        $this->set(compact('notificacao_ultimo_envio'));
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();

        if ($this->request->is('post')) {
            $this->request->data['club_id'] = $this->Auth->user('club_id');

            $event = $this->Events->patchEntity($event, $this->request->data);

            if ($this->Events->save($event)) {
                $this->Flash->success('O evento foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O evento não pode ser salvo. Por favor, tente novamente.');
            }
        }

        $tags = $this->Events->Tags->find('list');

        $this->set(compact('event', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->find('all', [
            'contain' => ['Tags'],
            'conditions' => [
                'Events.id' => $id,
                'Events.deleted' => 0,
                'Events.club_id' => $this->Auth->user('club_id')
            ]
        ])->first();

        if (!$event) {
            throw new NotFoundException('Evento inexistente');
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success('O evento foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O evento não pode ser salvo. Pro favor, tente novamente.');
            }
        }
        $this->set(compact('event'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $event = $this->Events->find('all', [
            'fields' => [
                'Events.id',
                'Events.is_active'
            ],
            'conditions' => [
                'Events.id' => $id,
                'Events.club_id' => $this->Auth->user('club_id')
            ]
        ])->first();

        if (!$event) {
            throw new NotFoundException('Evento inexistente');
        }
        
        $event->deleted = 1;
        if ($this->Events->save($event, ['checkRules' => false])) {
            $this->Flash->success('O evento foi deletado.');
        } else {
            $this->Flash->error('O evento não pode ser deletado. Por favor, tente novamente.');
        }
        return $this->redirect(['controller' => 'Events', 'action' => 'index']);
    }
}
