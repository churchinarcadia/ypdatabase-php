<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\MeetingType;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\MeetingType Test Case
 */
class MeetingTypeTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\MeetingType
     */
    protected $MeetingType;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->MeetingType = new MeetingType();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MeetingType);

        parent::tearDown();
    }
}
