<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MeetingPerson Entity
 *
 * @property int $id
 * @property int $meeting_id
 * @property int $person_id
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Meeting $meeting
 * @property \App\Model\Entity\Person $person
 */
class MeetingPerson extends Entity
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
        'meeting_id' => true,
        'person_id' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'meeting' => true,
        'person' => true,
    ];
}
