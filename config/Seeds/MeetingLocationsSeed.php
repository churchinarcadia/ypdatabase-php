<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * MeetingLocations seed.
 */
class MeetingLocationsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Arcadia Meeting Hall',
                'address_id' => '1',
                'active' => '1',
                'notify' => '0',
                'notes' => NULL,
                'creator' => NULL,
                'created' => '2023-02-01 01:06:50',
                'modifier' => NULL,
                'modified' => '2023-02-01 01:06:50',
            ],
            [
                'id' => '2',
                'name' => 'Monterey Park',
                'address_id' => '2',
                'active' => '1',
                'notify' => '0',
                'notes' => NULL,
                'creator' => NULL,
                'created' => '2023-02-01 01:10:53',
                'modifier' => NULL,
                'modified' => '2023-02-01 01:10:53',
            ],
            [
                'id' => '3',
                'name' => 'MCC',
                'address_id' => '3',
                'active' => '1',
                'notify' => '0',
                'notes' => NULL,
                'creator' => NULL,
                'created' => '2023-02-01 01:11:04',
                'modifier' => NULL,
                'modified' => '2023-02-01 01:11:04',
            ],
            [
                'id' => '4',
                'name' => 'Oak Glen',
                'address_id' => '4',
                'active' => '1',
                'notify' => '0',
                'notes' => NULL,
                'creator' => NULL,
                'created' => '2023-02-01 01:12:13',
                'modifier' => NULL,
                'modified' => '2023-02-01 01:12:13',
            ],
        ];

        $table = $this->table('meeting_locations');
        $table->insert($data)->save();
    }
}
