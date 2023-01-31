<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MeetingsFixture
 */
class MeetingsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'date' => '2023-01-31',
                'start_time' => '03:20:57',
                'end_time' => '03:20:57',
                'meeting_type_id' => 1,
                'meeting_location_id' => 1,
                'creator' => 1,
                'created' => '2023-01-31 03:20:57',
                'modifier' => 1,
                'modified' => '2023-01-31 03:20:57',
            ],
        ];
        parent::init();
    }
}
