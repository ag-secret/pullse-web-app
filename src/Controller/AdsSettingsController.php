<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdsSettings Controller
 *
 * @property \App\Model\Table\AdsSettingsTable $AdsSettings
 */
class AdsSettingsController extends AppController
{

    /**
     * Edit method
     *
     * @param string|null $id Ads Setting id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $breadcrumb = [
            'parent' => 'Configurações de Propaganda',
            'children' => [
                [
                    'label' => 'Propagandas',
                    'url' => [
                        'controller' => 'Ads',
                        'action' => 'index'
                    ]
                ]
            ]
        ];
        $adsSetting = $this->AdsSettings->find('all', [
            'conditions' => [
                'AdsSettings.club_id' => $this->Auth->user('club_id')
            ]
        ])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $adsSetting = $this->AdsSettings->patchEntity($adsSetting, $this->request->data);
            if ($this->AdsSettings->save($adsSetting)) {
                $this->Flash->success('As configurações da propaganda foram salvas.');
                return $this->redirect(['controller' => 'Ads','action' => 'index']);
            } else {
                $this->Flash->error('As configurações da propaganda não foram salvas. Por favor, tente novamente.');
            }
        }
        $this->set(compact('adsSetting', 'breadcrumb'));
    }
}
