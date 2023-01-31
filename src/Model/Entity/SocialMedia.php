<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SocialMedia Entity
 *
 * @property int $id
 * @property int $person_id
 * @property int $social_media_type_id
 * @property string $handle
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $notes
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\SocialMediaType $social_media_type
 */
class SocialMedia extends Entity
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
        'person_id' => true,
        'social_media_type_id' => true,
        'handle' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'notes' => true,
        'person' => true,
        'social_media_type' => true,
    ];

	public const FIELD_ID = 'id';
	public const FIELD_PERSON_ID = 'person_id';
	public const FIELD_SOCIAL_MEDIA_TYPE_ID = 'social_media_type_id';
	public const FIELD_HANDLE = 'handle';
	public const FIELD_CREATOR = 'creator';
	public const FIELD_CREATED = 'created';
	public const FIELD_MODIFIER = 'modifier';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_NOTES = 'notes';
	public const FIELD_PERSON = 'person';
	public const FIELD_SOCIAL_MEDIA_TYPE = 'social_media_type';
}
