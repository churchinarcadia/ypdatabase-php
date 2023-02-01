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
 * @property \App\Model\Entity\Address|null $address
 * @property \App\Model\Entity\MeetingLocationsNotify[] $meeting_locations_notify
 * @property \App\Model\Entity\SocialMedia[] $social_medias
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

	public const FIELD_ID = 'id';
	public const FIELD_FIRST_NAME = 'first_name';
	public const FIELD_MIDDLE_NAME = 'middle_name';
	public const FIELD_LAST_NAME = 'last_name';
	public const FIELD_GENDER = 'gender';
	public const FIELD_MOBILE_PHONE = 'mobile_phone';
	public const FIELD_CALL_OR_TEXT = 'call_or_text';
	public const FIELD_EMAIL = 'email';
	public const FIELD_HS_GRAD_YEAR = 'hs_grad_year';
	public const FIELD_HOME_PHONE = 'home_phone';
	public const FIELD_ADDRESS_ID = 'address_id';
	public const FIELD_BAPTIZED = 'baptized';
	public const FIELD_ACTIVE = 'active';
	public const FIELD_NOTES = 'notes';
	public const FIELD_INTERNAL_NOTES = 'internal_notes';
	public const FIELD_DISTRICT = 'district';
	public const FIELD_FATHER = 'father';
	public const FIELD_MOTHER = 'mother';
	public const FIELD_CREATOR = 'creator';
	public const FIELD_CREATED = 'created';
	public const FIELD_MODIFIER = 'modifier';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_MEETING_PEOPLE = 'meeting_people';
	public const FIELD_USERS = 'users';
	public const FIELD_ADDRESS = 'address';
	public const FIELD_MEETING_LOCATIONS_NOTIFY = 'meeting_locations_notify';
	public const FIELD_SOCIAL_MEDIAS = 'social_medias';

    /**
     * Virtual field full_name
     */
    protected $_virtual = ['full_name'];
    
    /**
     * getFullName method
     * 
     * @return String
     */
    protected function _getFullName()
    {
        $full_name = $this->first_name . ' ' . $this->last_name;

        return $full_name;
    }
}