<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property int|null $person_id
 * @property string $email
 * @property string $password
 * @property string|null $status
 * @property int|null $user_type_id
 * @property int|null $creator
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modifier
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Person|null $person
 * @property \App\Model\Entity\UserType|null $user_type
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'status' => true,
        'user_type_id' => true,
        'creator' => true,
        'created' => true,
        'modifier' => true,
        'modified' => true,
        'person' => true,
        'user_type' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

	public const FIELD_ID = 'id';
	public const FIELD_PERSON_ID = 'person_id';
	public const FIELD_EMAIL = 'email';
	public const FIELD_PASSWORD = 'password';
	public const FIELD_STATUS = 'status';
	public const FIELD_USER_TYPE_ID = 'user_type_id';
	public const FIELD_CREATOR = 'creator';
	public const FIELD_CREATED = 'created';
	public const FIELD_MODIFIER = 'modifier';
	public const FIELD_MODIFIED = 'modified';
	public const FIELD_PERSON = 'person';
	public const FIELD_USER_TYPE = 'user_type';

    /**
     * Virtual field username
     */
    protected $_virtual = ['username'];
    
    /**
     * getUsername method
     * 
     * @return String
     */
    protected function _getUsername()
    {
        if($this->has('person'))
        {
            $username = strtolower(substr($this->Person->first_name,0,1) . $this->Person->last_name);
        } else {
            $username = explode('@',$this->email)[0];
        }
        
        return $username;
    }

    // Automatically hash passwords when they are changed.
    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
