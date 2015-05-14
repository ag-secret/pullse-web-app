<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VipListSubscriptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VipListSubscriptionsTable Test Case
 */
class VipListSubscriptionsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'VipListSubscriptions' => 'app.vip_list_subscriptions',
        'Events' => 'app.events',
        'Clubs' => 'app.clubs',
        'Users' => 'app.users',
        'Checkins' => 'app.checkins',
        'Messages' => 'app.messages',
        'Hearts' => 'app.hearts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VipListSubscriptions') ? [] : ['className' => 'App\Model\Table\VipListSubscriptionsTable'];
        $this->VipListSubscriptions = TableRegistry::get('VipListSubscriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VipListSubscriptions);

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
