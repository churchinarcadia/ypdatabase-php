<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeetingTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeetingTypesTable Test Case
 */
class MeetingTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MeetingTypesTable
     */
    protected $MeetingTypesTable;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MeetingTypes',
        'app.Meetings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MeetingTypes') ? [] : ['className' => MeetingTypesTable::class];
        $this->MeetingTypesTable = $this->getTableLocator()->get('MeetingTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MeetingTypesTable);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MeetingTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MeetingTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
