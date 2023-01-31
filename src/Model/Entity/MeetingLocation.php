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
 * @property \Cake\I18n\FrozenTime|null $notes
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Address $address
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
}
