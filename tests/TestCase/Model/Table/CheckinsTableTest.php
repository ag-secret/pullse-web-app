<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CheckinsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CheckinsTable Test Case
 */
class CheckinsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Checkins' => 'app.checkins',
        'Users' => 'app.users',
        'Clubs' => 'app.clubs',
        'Events' => 'app.events',
        'Hearts' => 'app.hearts',
        'VipListSubscriptions' => 'app.vip_list_subscriptions',
        'Messages' => 'app.messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Checkins') ? [] : ['className' => 'App\Model\Table\CheckinsTable'];
        $this->Checkins = TableRegistry::get('Checkins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Checkins);

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
