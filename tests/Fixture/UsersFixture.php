<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'person_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ip',
                'user_type_id' => 1,
                'creator' => 1,
                'created' => '2023-01-31 03:22:04',
                'modifier' => 1,
                'modified' => '2023-01-31 03:22:04',
            ],
        ];
        parent::init();
    }
}
