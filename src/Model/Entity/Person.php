<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $gender
 * @property string|null $mobile_phone
 * @property string|null $call_or_text
 * @property string|null $email
 * @property int|null $hs_grad_year
 * @property string|null $home_phone
 * @property int|null $address_id
 * @property bool|null $baptized
 * @property bool|null $active
 * @property string|null $notes
 * @property string|null $internal_notes
 * @property int|null $district
 * @property int|null $father
 * @property int|null $mother
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\MeetingPerson[] $meeting_people
 * @property \App\Model\Entity\User[] $users
 */
class Person extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'middle_name' => true,
        'last_name' => true,
        'gender' => true,
        'mobile_phone' => true,
        'call_or_text' => true,
        'email' => true,
        'hs_grad_year' => true,
        'home_phone' => true,
        'address_id' => true,
        'baptized' => true,
        'active' => true,
        'notes' => true,
        'internal_notes' => true,
        'district' => true,
        'father' => true,
        'mother' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'meeting_people' => true,
        'users' => true,
    ];
}
