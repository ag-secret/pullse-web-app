<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CustomPushNotificationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CustomPushNotificationsController Test Case
 */
class CustomPushNotificationsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.custom_push_notifications',
        'app.clubs',
        'app.adm_users',
        'app.events',
        'app.checkins',
        'app.users',
        'app.messages',
        'app.vip_list_subscriptions',
        'app.hearts',
        'app.tags',
        'app.events_tags',
        'app.general_settings'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
