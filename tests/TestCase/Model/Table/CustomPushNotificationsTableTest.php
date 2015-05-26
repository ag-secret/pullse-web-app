<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomPushNotificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomPushNotificationsTable Test Case
 */
class CustomPushNotificationsTableTest extends TestCase
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustomPushNotifications') ? [] : ['className' => 'App\Model\Table\CustomPushNotificationsTable'];
        $this->CustomPushNotifications = TableRegistry::get('CustomPushNotifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomPushNotifications);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
