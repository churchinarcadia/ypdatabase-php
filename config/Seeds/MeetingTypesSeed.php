<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * MeetingTypes seed.
 */
class MeetingTypesSeed extends AbstractSeed
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
                'name' => 'Lord\'s Day Morning',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:34:18',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:34:18',
            ],
            [
                'id' => '2',
                'name' => 'Prayer Meeting',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:34:29',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:34:29',
            ],
            [
                'id' => '3',
                'name' => 'Small Group',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:34:40',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:34:40',
            ],
            [
                'id' => '4',
                'name' => 'Conference/Training',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:34:50',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:34:50',
            ],
        ];

        $table = $this->table('meeting_types');
        $table->insert($data)->save();
    }
}
