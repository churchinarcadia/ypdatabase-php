<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Meeting;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Meeting Test Case
 */
class MeetingTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\Meeting
     */
    protected $Meeting;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->Meeting = new Meeting();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Meeting);

        parent::tearDown();
    }
}
