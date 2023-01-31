<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SocialMediaType Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime|null $description
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\SocialMedia[] $social_medias
 */
class SocialMediaType extends Entity
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
        'description' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'social_medias' => true,
    ];

	public const FIELD_ID = 'id';
	public const FIELD_NAME = 'name';
	public const FIELD_DESCRIPTION = 'description';
	public const FIELD_CREATOR = 'creator';
	public const FIELD_CREATED = 'created';
	public const FIELD_MODIFIER = 'modifier';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_SOCIAL_MEDIAS = 'social_medias';
}
