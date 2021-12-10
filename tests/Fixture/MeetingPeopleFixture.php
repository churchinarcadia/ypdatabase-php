<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MeetingPeopleFixture
 */
class MeetingPeopleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'meeting_people';
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
                'meeting_id' => 1,
                'person_id' => 1,
                'creator' => 1,
                'created' => '2021-12-10 04:14:05',
                'modifier' => 1,
                'modified' => '2021-12-10 04:14:05',
            ],
        ];
        parent::init();
    }
}
