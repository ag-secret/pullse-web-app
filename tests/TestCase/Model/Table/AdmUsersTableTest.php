<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmUsersTable Test Case
 */
class AdmUsersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'AdmUsers' => 'app.adm_users',
        'Clubs' => 'app.clubs',
        'Events' => 'app.events',
        'Checkins' => 'app.checkins',
        'Users' => 'app.users',
        'Messages' => 'app.messages',
        'VipListSubscriptions' => 'app.vip_list_subscriptions',
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
        $config = TableRegistry::exists('AdmUsers') ? [] : ['className' => 'App\Model\Table\AdmUsersTable'];
        $this->AdmUsers = TableRegistry::get('AdmUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdmUsers);

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
