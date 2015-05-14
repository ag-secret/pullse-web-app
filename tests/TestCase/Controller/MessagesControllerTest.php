<?php
namespace App\Test\TestCase\Controller;

use App\Controller\MessagesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\MessagesController Test Case
 */
class MessagesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Messages' => 'app.messages',
        'Users' => 'app.users',
        'Clubs' => 'app.clubs',
        'Events' => 'app.events',
        'Checkins' => 'app.checkins',
        'Hearts' => 'app.hearts',
        'VipListSubscriptions' => 'app.vip_list_subscriptions'
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
