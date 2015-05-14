<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdsSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdsSettingsTable Test Case
 */
class AdsSettingsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ads_settings',
        'app.clubs',
        'app.adm_users',
        'app.events',
        'app.checkins',
        'app.users',
        'app.messages',
        'app.vip_list_subscriptions',
        'app.hearts',
        'app.tags',
        'app.events_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AdsSettings') ? [] : ['className' => 'App\Model\Table\AdsSettingsTable'];
        $this->AdsSettings = TableRegistry::get('AdsSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdsSettings);

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
