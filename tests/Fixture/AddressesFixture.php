<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddressesFixture
 */
class AddressesFixture extends TestFixture
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
                'number' => 'Lor',
                'direction' => 'L',
                'street' => 'Lorem ipsum dolor ',
                'unit' => 'Lo',
                'city' => 'Lorem ipsum dolor ',
                'state' => 'Lo',
                'zip' => 1,
                'creator' => 1,
                'created' => '2023-01-31 03:19:56',
                'modifier' => 1,
                'modified' => '2023-01-31 03:19:56',
            ],
        ];
        parent::init();
    }
}
