<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HeartsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HeartsTable Test Case
 */
class HeartsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Hearts' => 'app.hearts',
        'Events' => 'app.events',
        'Clubs' => 'app.clubs',
        'Users' => 'app.users',
        'Checkins' => 'app.checkins',
        'Messages' => 'app.messages',
        'VipListSubscriptions' => 'app.vip_list_subscriptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hearts') ? [] : ['className' => 'App\Model\Table\HeartsTable'];
        $this->Hearts = TableRegistry::get('Hearts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hearts);

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
