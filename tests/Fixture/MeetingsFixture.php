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
                'date' => '2021-12-10',
                'start_time' => '04:14:12',
                'end_time' => '04:14:12',
                'meeting_type_id' => 1,
                'creator' => 1,
                'created' => '2021-12-10 04:14:12',
                'modifier' => 1,
                'modified' => '2021-12-10 04:14:12',
            ],
        ];
        parent::init();
    }
}
