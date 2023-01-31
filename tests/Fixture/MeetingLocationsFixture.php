<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MeetingLocationsFixture
 */
class MeetingLocationsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor ',
                'address_id' => 1,
                'active' => 1,
                'notify' => 1,
                'notes' => 1675135207,
                'creator' => 1,
                'created' => '2023-01-31 03:20:07',
                'modifier' => 1,
                'modified' => '2023-01-31 03:20:07',
            ],
        ];
        parent::init();
    }
}
