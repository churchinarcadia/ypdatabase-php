<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string $number
 * @property string|null $direction
 * @property string $street
 * @property string|null $unit
 * @property string $city
 * @property string $state
 * @property int $zip
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\MeetingLocation[] $meeting_locations
 * @property \App\Model\Entity\Person[] $people
 */
class Address extends Entity
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
        'number' => true,
        'direction' => true,
        'street' => true,
        'unit' => true,
        'city' => true,
        'state' => true,
        'zip' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'meeting_locations' => true,
        'people' => true,
    ];

	public const FIELD_ID = 'id';
	public const FIELD_NUMBER = 'number';
	public const FIELD_DIRECTION = 'direction';
	public const FIELD_STREET = 'street';
	public const FIELD_UNIT = 'unit';
	public const FIELD_CITY = 'city';
	public const FIELD_STATE = 'state';
	public const FIELD_ZIP = 'zip';
	public const FIELD_CREATOR = 'creator';
	public const FIELD_CREATED = 'created';
	public const FIELD_MODIFIER = 'modifier';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_MEETING_LOCATIONS = 'meeting_locations';
	public const FIELD_PEOPLE = 'people';
}
