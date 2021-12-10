<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Person;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Person Test Case
 */
class PersonTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\Person
     */
    protected $Person;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->Person = new Person();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Person);

        parent::tearDown();
    }
}
