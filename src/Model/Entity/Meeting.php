<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meeting Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\Time|null $start_time
 * @property \Cake\I18n\Time|null $end_time
 * @property int|null $meeting_type_id
 * @property int|null $meeting_location_id
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\MeetingType|null $meeting_type
 * @property \App\Model\Entity\MeetingPerson[] $meeting_people
 * @property \App\Model\Entity\MeetingLocation|null $meeting_location
 */
class Meeting extends Entity
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
        'date' => true,
        'start_time' => true,
        'end_time' => true,
        'meeting_type_id' => true,
        'meeting_location_id' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'meeting_type' => true,
        'meeting_people' => true,
    ];

	public const FIELD_ID = 'id';
	public const FIELD_DATE = 'date';
	public const FIELD_START_TIME = 'start_time';
	public const FIELD_END_TIME = 'end_time';
	public const FIELD_MEETING_TYPE_ID = 'meeting_type_id';
	public const FIELD_MEETING_LOCATION_ID = 'meeting_location_id';
	public const FIELD_CREATOR = 'creator';
	public const FIELD_CREATED = 'created';
	public const FIELD_MODIFIER = 'modifier';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_MEETING_TYPE = 'meeting_type';
	public const FIELD_MEETING_PEOPLE = 'meeting_people';
	public const FIELD_MEETING_LOCATION = 'meeting_location';
}
