<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocialMediaTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocialMediaTypesTable Test Case
 */
class SocialMediaTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SocialMediaTypesTable
     */
    protected $SocialMediaTypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.SocialMediaTypes',
        'app.SocialMedias',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SocialMediaTypes') ? [] : ['className' => SocialMediaTypesTable::class];
        $this->SocialMediaTypes = $this->getTableLocator()->get('SocialMediaTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SocialMediaTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SocialMediaTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SocialMediaTypesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
