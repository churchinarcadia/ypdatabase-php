<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\MeetingPerson;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\MeetingPerson Test Case
 */
class MeetingPersonTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\MeetingPerson
     */
    protected $MeetingPerson;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->MeetingPerson = new MeetingPerson();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MeetingPerson);

        parent::tearDown();
    }
}
