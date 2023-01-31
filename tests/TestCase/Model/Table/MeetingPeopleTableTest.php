<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeetingPeopleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeetingPeopleTable Test Case
 */
class MeetingPeopleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MeetingPeopleTable
     */
    protected $MeetingPeople;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MeetingPeople',
        'app.Meetings',
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
        $config = $this->getTableLocator()->exists('MeetingPeople') ? [] : ['className' => MeetingPeopleTable::class];
        $this->MeetingPeople = $this->getTableLocator()->get('MeetingPeople', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MeetingPeople);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MeetingPeopleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MeetingPeopleTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
