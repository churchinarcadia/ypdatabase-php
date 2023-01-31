<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocialMediasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocialMediasTable Test Case
 */
class SocialMediasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SocialMediasTable
     */
    protected $SocialMedias;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SocialMedias',
        'app.People',
        'app.SocialMediaTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SocialMedias') ? [] : ['className' => SocialMediasTable::class];
        $this->SocialMedias = $this->getTableLocator()->get('SocialMedias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SocialMedias);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SocialMediasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SocialMediasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
