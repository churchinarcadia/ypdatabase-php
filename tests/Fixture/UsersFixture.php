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
                'active' => 1,
                'user_type_id' => 1,
                'creator' => 1,
                'created' => '2021-12-10 04:14:33',
                'modifier' => 1,
                'modified' => '2021-12-10 04:14:33',
            ],
        ];
        parent::init();
    }
}
