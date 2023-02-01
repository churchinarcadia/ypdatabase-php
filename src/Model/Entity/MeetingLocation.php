<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MeetingLocation Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $address_id
 * @property bool $active
 * @property bool $notify
 * @property string|null $notes
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Address|null $address
 * @property \App\Model\Entity\MeetingLocationsNotify[] $meeting_locations_notify
 * @property \App\Model\Entity\Meeting[] $meetings
 */
class MeetingLocation extends Entity
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
        'name' => true,
        'address_id' => true,
        'active' => true,
        'notify' => true,
        'notes' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'address' => true,
        'meeting_locations_notify' => true,
        'meetings' => true,
    ];

	public const FIELD_ID = 'id';
	public const FIELD_NAME = 'name';
	public const FIELD_ADDRESS_ID = 'address_id';
	public const FIELD_ACTIVE = 'active';
	public const FIELD_NOTIFY = 'notify';
	public const FIELD_NOTES = 'notes';
	public const FIELD_CREATOR = 'creator';
	public const FIELD_CREATED = 'created';
	public const FIELD_MODIFIER = 'modifier';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_ADDRESS = 'address';
	public const FIELD_MEETING_LOCATIONS_NOTIFY = 'meeting_locations_notify';
	public const FIELD_MEETINGS = 'meetings';
}
