<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
/**
 * Ads Controller
 *
 * @property \App\Model\Table\AdsTable $Ads
 */
class AdsController extends AppController
{

    // public function isAuthorized($user)
    // {
    //     if (in_array($this->request->action, ['edit', 'delete'])) {
    //         $adId = (int)$this->request->params['pass'][0];
    //         if ($this->Ads->isOwnedBy($adId, $user['club_id'])) {
    //             return true;
    //         }
    //         $message = ($this->request->action == 'edit') ? 'editar' : 'deletar';
    //         $this->Flash->error('Você não tem permissão para '.$message.' esta propaganda.');
    //         return $this->redirect(['action' => 'index']);
    //     }

    //     return parent::isAuthorized($user);
    // }

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
            $q = str_replace(' ', '%', $q);
            $conditions[] = ['Ads.nome LIKE' => "%{$q}%"];
        }

        $conditions[] = ['Ads.club_id' => $this->Auth->user('club_id')];

        $this->paginate = [
            'conditions' => $conditions
        ];

        $this->set('ads', $this->paginate($this->Ads));
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $ad = $this->Ads->newEntity();
        if ($this->request->is('post')) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);

            $ad->club_id = $this->Auth->user('club_id');

            if ($this->Ads->save($ad)) {
                $this->Flash->success('A propaganda foi salva.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('A propaganda não pode ser salva. Por Favor, tente novamente.');
            }
        }
        $this->set(compact('ad'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ad = $this->Ads->find('all', [
            'contain' => [],
            'conditions' => [
                'Ads.id' => $id,
                'Ads.club_id' => $this->Auth->user('club_id')
            ]
        ])->first();

        if (!$ad) {
            throw new NotFoundException('Propaganda inexistente');
        }

        if ($ad->tipo == 1) {
            $ad->video_url = $ad->url;
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);

            $ad->club_id = $this->Auth->user('club_id');

            if ($this->Ads->save($ad)) {
                $this->Flash->success('A propaganda foi salva.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('A propaganda não pode ser salva. Por favor, tente novamente.');
            }
        }
        $this->set(compact('ad'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ad = $this->Ads->find('all', [
            'conditions' => [
                'Ads.id' => $id,
                'Ads.club_id' => $this->Auth->user('club_id')
            ]
        ])->first();

        if (!$ad) {
            throw new NotFoundException('Propaganda inexistente');
        }

        if ($this->Ads->delete($ad)) {
            $this->Flash->success('A propaganda foi deletada.');
        } else {
            $this->Flash->error('A propaganda não pode ser deletada. Por favor, tente novamente.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
