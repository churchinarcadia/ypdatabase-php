<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SocialMediaTypesFixture
 */
class SocialMediaTypesFixture extends TestFixture
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
                'name' => 'Lorem ipsum d',
                'description' => 1675135276,
                'creator' => 1,
                'created' => '2023-01-31 03:21:16',
                'modifier' => 1,
                'modified' => '2023-01-31 03:21:16',
            ],
        ];
        parent::init();
    }
}
