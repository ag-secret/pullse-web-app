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
 * CustomPushNotifications Controller
 *
 * @property \App\Model\Table\CustomPushNotificationsTable $CustomPushNotifications
 */
class CustomPushNotificationsController extends AppController
{
    public function send($id = null)
    {
        $this->loadModel('Users');
        $this->layout = 'ajax';
        
        $users = $this->Users->find('all', [
            'fields' => ['Users.platform', 'Users.push_notification_device_token'],
            'conditions' => [
                'Users.id' => 20,
                'Users.club_id' => $this->Auth->user('club_id'),
                'Users.push_notification_device_token IS NOT' => null
            ]
        ]);

        $notification = $this->CustomPushNotifications->find('all', [
            'fields' => ['CustomPushNotifications.title', 'CustomPushNotifications.message'],
            'conditions' => [
                'CustomPushNotifications.id' => $id
            ]
        ])->first();

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

        $message = new MessageNew($notification->message, [
            'title' => $notification->title,
            'notId' => $notification->id,
            'bigTextStyle' => 1,
            'type' => 'notificacao',
            'collapse_key' => $notification->id
        ]);

        $pushManager = new PushManager();
        $push = new Push($androidAdapter, $androidDevices, $message);
        $pushManager->add($push);
        $pushManager->push();

        $pushManager = new PushManager();
        $push = new Push($iosAdapter, $iosDevices, $message);
        $pushManager->add($push);
        $pushManager->push();

        $query = $this->CustomPushNotifications->query();
        $query
            ->update()
            ->set(['last_sended' => TIME::now()])
            ->where(['id' => $id])
            ->execute();

        echo json_encode('ok');

        $this->autoRender = false;
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $breadcrumb = [
            'parent' => 'Notificações push',
        ];

        $conditions = [];
        $conditions[] = ['CustomPushNotifications.club_id' => $this->Auth->user('club_id')];

        $this->paginate = [
            'fields' => ['id', 'title', 'message', 'last_sended'],
            'conditions' => $conditions
        ];
        $this->set('notifications', $this->paginate($this->CustomPushNotifications));
        $this->set(compact('breadcrumb'));
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customPushNotification = $this->CustomPushNotifications->newEntity();

        if ($this->request->is('post')) {

            $customPushNotification = $this
                ->CustomPushNotifications
                ->patchEntity($customPushNotification, $this->request->data);

            $customPushNotification->club_id = $this->Auth->user('club_id');

            $customPushNotification->accessible('last_sended', false);

            if ($this->CustomPushNotifications->save($customPushNotification)) {
                $this->Flash->success('A notificação foi salva com sucesso.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('A notificação não pode ficar salva. Por favor, tente novamente.');
            }
        }

        $this->set(compact('customPushNotification'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Custom Push Notification id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customPushNotification = $this->CustomPushNotifications->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $customPushNotification = $this->CustomPushNotifications->patchEntity($customPushNotification, $this->request->data);

            $customPushNotification->accessible('last_sended', false);

            if ($this->CustomPushNotifications->save($customPushNotification)) {
                $this->Flash->success('A notificação foi salva com sucesso.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('A notificação não pode ser salva. Por favor, tente novamente.');
            }
        }
        $this->set(compact('customPushNotification'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Custom Push Notification id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $customPushNotification = $this->CustomPushNotifications->find('all', [
            'conditions' => [
                'CustomPushNotifications.id' => $id,
                'CustomPushNotifications.club_id' => $this->Auth->user('club_id')
            ]
        ])->first();

        if (!$customPushNotification) {
            throw new NotFoundException('Notificação inexistente');
        }

        $customPushNotification = $this->CustomPushNotifications->get($id);
        if ($this->CustomPushNotifications->delete($customPushNotification)) {
            $this->Flash->success('A notificação foi deletada.');
        } else {
            $this->Flash->error('A notificação não pode ser salva. Por favor, tente novamente.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
