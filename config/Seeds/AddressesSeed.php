<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Addresses seed.
 */
class AddressesSeed extends AbstractSeed
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
                'number' => '630',
                'direction' => 'E',
                'street' => 'Live Oak Ave',
                'unit' => '',
                'city' => 'Arcadia',
                'state' => 'CA',
                'zip' => '91006',
                'creator' => NULL,
                'created' => '2023-02-01 00:55:35',
                'modifier' => NULL,
                'modified' => '2023-02-01 00:55:35',
            ],
            [
                'id' => '2',
                'number' => '612',
                'direction' => 'N',
                'street' => 'Alhambra Ave',
                'unit' => '',
                'city' => 'Monterey Park',
                'state' => 'CA',
                'zip' => '91755',
                'creator' => NULL,
                'created' => '2023-02-01 00:56:00',
                'modifier' => NULL,
                'modified' => '2023-02-01 00:56:00',
            ],
            [
                'id' => '3',
                'number' => '1212',
                'direction' => 'N',
                'street' => 'Hubbel Way',
                'unit' => '',
                'city' => 'Anaheim',
                'state' => 'CA',
                'zip' => '94801',
                'creator' => NULL,
                'created' => '2023-02-01 00:56:15',
                'modifier' => NULL,
                'modified' => '2023-02-01 00:56:15',
            ],
            [
                'id' => '4',
                'number' => '39364',
                'direction' => '',
                'street' => 'Oak Glen Rd',
                'unit' => '',
                'city' => 'Yucaipa',
                'state' => 'CA',
                'zip' => '92399',
                'creator' => NULL,
                'created' => '2023-02-01 01:11:52',
                'modifier' => NULL,
                'modified' => '2023-02-01 01:11:52',
            ],
        ];

        $table = $this->table('addresses');
        $table->insert($data)->save();
    }
}
