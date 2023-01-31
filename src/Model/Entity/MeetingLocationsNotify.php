<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MeetingLocationsNotify Entity
 *
 * @property int $id
 * @property int $meeting_location_id
 * @property int $person_id
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\MeetingLocation $meeting_location
 * @property \App\Model\Entity\Person $person
 */
class MeetingLocationsNotify extends Entity
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
        'meeting_location_id' => true,
        'person_id' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'meeting_location' => true,
        'person' => true,
    ];

	public const FIELD_ID = 'id';
	public const FIELD_MEETING_LOCATION_ID = 'meeting_location_id';
	public const FIELD_PERSON_ID = 'person_id';
	public const FIELD_CREATOR = 'creator';
	public const FIELD_CREATED = 'created';
	public const FIELD_MODIFIER = 'modifier';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_MEETING_LOCATION = 'meeting_location';
	public const FIELD_PERSON = 'person';
}
