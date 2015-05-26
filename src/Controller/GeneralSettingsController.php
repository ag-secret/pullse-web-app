<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

use Sly\NotificationPusher\PushManager,
    Sly\NotificationPusher\Adapter\Apns as ApnsAdapter,
    Sly\NotificationPusher\Adapter\Gcm  as GcmAdapter,
    Sly\NotificationPusher\Collection\DeviceCollection,
    Sly\NotificationPusher\Model\Device,
    Sly\NotificationPusher\Model\Message as MessageNew,
    Sly\NotificationPusher\Model\Push;

/**
 * GeneralSettings Controller
 *
 * @property \App\Model\Table\GeneralSettingsTable $GeneralSettings
 */
class GeneralSettingsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clubs']
        ];
        $this->set('generalSettings', $this->paginate($this->GeneralSettings));
        $this->set('_serialize', ['generalSettings']);
    }

    public function sendNotificacoesEvento()
    {
        $this->layout = 'ajax';

        echo json_encode($this->Auth->User());

        $this->loadModel('Users');
        $users = $this->Users->find('all', [
            'conditions' => [
                'Users.club_id' => $this->Auth->user('club_id'),
                'Users.is_active' => 1,
                'Users.push_notification_device_token IS NOT' => null
            ]
        ]);

        $androidUsers = [];
        $iosUsers = [];
        foreach ($users as $user) {
            if ($user->platform == 'android') {
                $androidUsers[] = new Device ($user->push_notification_device_token);
            } elseif($user->platform == 'ios') {
                $iosUsers[] = new Device ($user->push_notification_device_token);
            }
        }
        
        $androidAdapter = new GcmAdapter([
            'apiKey' => $this->gcmApiKey
        ]);

        $iosAdapter = new ApnsAdapter([
            'certificate' => WWW_ROOT . '/ios_certificate/ck.pem',
            'passPhrase' => '123mudar'
        ]);

        $androidDevices = new DeviceCollection($androidUsers);
        $iosDevices = new DeviceCollection($iosUsers);

        $message = new MessageNew('Agenda da semana atualizada!', [
            'title' => 'Agenda da semana',
            'notId' => 3,
            'collapse_key' => 'agenda',
            'type' => 'agenda'
        ]);

        $pushManager = new PushManager();
        $push = new Push($androidAdapter, $androidDevices, $message);
        $pushManager->add($push);
        $pushManager->push();

        $pushManager = new PushManager();
        $push = new Push($iosAdapter, $iosDevices, $message);
        $pushManager->add($push);
        $pushManager->push();
        
        $query = $this->GeneralSettings->query();
        $query
            ->update()
            ->set(['envio_notificacoes_evento' => TIME::now()])
            ->where(['club_id' => $this->Auth->user('club_id')])
            ->execute();
    }

    /**
     * View method
     *
     * @param string|null $id General Setting id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $generalSetting = $this->GeneralSettings->get($id, [
            'contain' => ['Clubs']
        ]);
        $this->set('generalSetting', $generalSetting);
        $this->set('_serialize', ['generalSetting']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $generalSetting = $this->GeneralSettings->newEntity();
        if ($this->request->is('post')) {
            $generalSetting = $this->GeneralSettings->patchEntity($generalSetting, $this->request->data);
            if ($this->GeneralSettings->save($generalSetting)) {
                $this->Flash->success('The general setting has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The general setting could not be saved. Please, try again.');
            }
        }
        $clubs = $this->GeneralSettings->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('generalSetting', 'clubs'));
        $this->set('_serialize', ['generalSetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id General Setting id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $generalSetting = $this->GeneralSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $generalSetting = $this->GeneralSettings->patchEntity($generalSetting, $this->request->data);
            if ($this->GeneralSettings->save($generalSetting)) {
                $this->Flash->success('The general setting has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The general setting could not be saved. Please, try again.');
            }
        }
        $clubs = $this->GeneralSettings->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('generalSetting', 'clubs'));
        $this->set('_serialize', ['generalSetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id General Setting id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $generalSetting = $this->GeneralSettings->get($id);
        if ($this->GeneralSettings->delete($generalSetting)) {
            $this->Flash->success('The general setting has been deleted.');
        } else {
            $this->Flash->error('The general setting could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
