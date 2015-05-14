<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ClubsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ClubsController Test Case
 */
class ClubsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Clubs' => 'app.clubs',
        'Events' => 'app.events',
        'Checkins' => 'app.checkins',
        'Users' => 'app.users',
        'Messages' => 'app.messages',
        'VipListSubscriptions' => 'app.vip_list_subscriptions',
        'Hearts' => 'app.hearts'
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
