<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * UserTypes seed.
 */
class UserTypesSeed extends AbstractSeed
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
                'name' => 'Administrator',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:33:02',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:33:02',
            ],
            [
                'id' => '2',
                'name' => 'Serving One',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:33:16',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:33:16',
            ],
            [
                'id' => '3',
                'name' => 'Steward',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:33:27',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:33:27',
            ],
            [
                'id' => '4',
                'name' => 'Young Person',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:33:41',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:33:41',
            ],
        ];

        $table = $this->table('user_types');
        $table->insert($data)->save();
    }
}
