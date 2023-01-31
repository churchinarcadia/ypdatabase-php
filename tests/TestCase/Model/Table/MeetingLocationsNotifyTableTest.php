<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeetingLocationsNotifyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeetingLocationsNotifyTable Test Case
 */
class MeetingLocationsNotifyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MeetingLocationsNotifyTable
     */
    protected $MeetingLocationsNotify;

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
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MeetingLocationsNotify') ? [] : ['className' => MeetingLocationsNotifyTable::class];
        $this->MeetingLocationsNotify = $this->getTableLocator()->get('MeetingLocationsNotify', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MeetingLocationsNotify);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MeetingLocationsNotifyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MeetingLocationsNotifyTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
