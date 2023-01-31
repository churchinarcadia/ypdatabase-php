<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * SocialMediaTypes seed.
 */
class SocialMediaTypesSeed extends AbstractSeed
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
                'name' => 'WeChat',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:31:41',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:31:41',
            ],
            [
                'id' => '2',
                'name' => 'Discord',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:32:06',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:32:06',
            ],
            [
                'id' => '3',
                'name' => 'Facebook',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:32:28',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:32:28',
            ],
            [
                'id' => '4',
                'name' => 'Instagram',
                'description' => '',
                'creator' => NULL,
                'created' => '2023-01-31 06:32:39',
                'modifier' => NULL,
                'modified' => '2023-01-31 06:32:39',
            ],
        ];

        $table = $this->table('social_media_types');
        $table->insert($data)->save();
    }
}
