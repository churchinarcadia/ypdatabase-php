<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PeopleFixture
 */
class PeopleFixture extends TestFixture
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
                'first_name' => 'Lorem ipsum dolor sit amet',
                'middle_name' => 'Lorem ipsum dolor ',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'gender' => 'L',
                'mobile_phone' => 'Lorem ip',
                'call_or_text' => 'Lo',
                'email' => 'Lorem ipsum dolor sit amet',
                'hs_grad_year' => 1,
                'home_phone' => 'Lorem ip',
                'address_id' => 1,
                'baptized' => 1,
                'active' => 1,
                'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'internal_notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'district' => 1,
                'father' => 1,
                'mother' => 1,
                'creator' => 1,
                'created' => '2023-01-31 03:21:06',
                'modifier' => 1,
                'modified' => '2023-01-31 03:21:06',
            ],
        ];
        parent::init();
    }
}
