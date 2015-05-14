<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsTagsTable Test Case
 */
class EventsTagsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'EventsTags' => 'app.events_tags',
        'Events' => 'app.events',
        'Clubs' => 'app.clubs',
        'Users' => 'app.users',
        'Checkins' => 'app.checkins',
        'Messages' => 'app.messages',
        'VipListSubscriptions' => 'app.vip_list_subscriptions',
        'Hearts' => 'app.hearts',
        'Tags' => 'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EventsTags') ? [] : ['className' => 'App\Model\Table\EventsTagsTable'];
        $this->EventsTags = TableRegistry::get('EventsTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventsTags);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
