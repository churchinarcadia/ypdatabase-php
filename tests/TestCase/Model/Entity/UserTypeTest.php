<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\UserType;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\UserType Test Case
 */
class UserTypeTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\UserType
     */
    protected $UserType;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->UserType = new UserType();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserType);

        parent::tearDown();
    }
}
