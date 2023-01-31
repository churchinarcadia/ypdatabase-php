<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\MeetingLocationsNotifyController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MeetingLocationsNotifyController Test Case
 *
 * @uses \App\Controller\MeetingLocationsNotifyController
 */
class MeetingLocationsNotifyControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MeetingLocationsNotify',
        'app.MeetingLocations',
        'app.People',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\MeetingLocationsNotifyController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\MeetingLocationsNotifyController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\MeetingLocationsNotifyController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\MeetingLocationsNotifyController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\MeetingLocationsNotifyController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
