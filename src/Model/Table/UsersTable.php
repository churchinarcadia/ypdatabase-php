<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\BelongsTo $People
 * @property \App\Model\Table\UserTypesTable&\Cake\ORM\Association\BelongsTo $UserTypes
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin App\Model\Behavior\CreatorModifier
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CreatorModifier');

        $this->belongsTo('People', [
            'foreignKey' => 'person_id',
        ]);
        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id',
        ]);
        $this->belongsTo('UserCreators', [
            'foreignKey' => 'creator',
            'className' => 'Users',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('UserModifiers', [
            'foreignKey' => 'creator',
            'className' => 'Users',
            'joinType' => 'LEFT',
        ]);
        $this->hasMany('CreatedAddresses', [
            'foreignKey' => 'creator',
            'className' => 'Addresses'
        ]);
        $this->hasMany('ModifiedAddresses', [
            'foreignKey' => 'modifier',
            'className' => 'Addresses'
        ]);
        $this->hasMany('CreatedMeetingLocationsNotify', [
            'foreignKey' => 'creator',
            'className' => 'MeetingLocationsNotify'
        ]);
        $this->hasMany('ModifiedMeetingLocationsNotify', [
            'foreignKey' => 'modifier',
            'className' => 'MeetingLocationsNotify'
        ]);
        $this->hasMany('CreatedMeetingLocations', [
            'foreignKey' => 'creator',
            'className' => 'MeetingLocations'
        ]);
        $this->hasMany('ModifiedMeetingLocations', [
            'foreignKey' => 'modifier',
            'className' => 'MeetingLocations'
        ]);
        $this->hasMany('CreatedMeetingPeople', [
            'foreignKey' => 'creator',
            'className' => 'MeetingPeople'
        ]);
        $this->hasMany('ModifiedMeetingPeople', [
            'foreignKey' => 'modifier',
            'className' => 'MeetingPeople'
        ]);
        $this->hasMany('CreatedMeetings', [
            'foreignKey' => 'creator',
            'className' => 'Meetings'
        ]);
        $this->hasMany('ModifiedMeetings', [
            'foreignKey' => 'modifier',
            'className' => 'Meetings'
        ]);
        $this->hasMany('CreatedMeetingTypes', [
            'foreignKey' => 'creator',
            'className' => 'MeetingTypes'
        ]);
        $this->hasMany('ModifiedMeetingTypes', [
            'foreignKey' => 'modifier',
            'className' => 'MeetingTypes'
        ]);
        $this->hasMany('CreatedPeople', [
            'foreignKey' => 'creator',
            'className' => 'People'
        ]);
        $this->hasMany('ModifiedPeople', [
            'foreignKey' => 'modifier',
            'className' => 'People'
        ]);
        $this->hasMany('CreatedSocialMedias', [
            'foreignKey' => 'creator',
            'className' => 'SocialMedias'
        ]);
        $this->hasMany('ModifiedSocialMedias', [
            'foreignKey' => 'modifier',
            'className' => 'SocialMedias'
        ]);
        $this->hasMany('CreatedSocialMediaTypes', [
            'foreignKey' => 'creator',
            'className' => 'SocialMediaTypes'
        ]);
        $this->hasMany('ModifiedSocialMediaTypes', [
            'foreignKey' => 'modifier',
            'className' => 'SocialMediaTypes'
        ]);
        $this->hasMany('CreatedUsers', [
            'foreignKey' => 'creator',
            'className' => 'Users'
        ]);
        $this->hasMany('ModifiedUsers', [
            'foreignKey' => 'modifier',
            'className' => 'Users'
        ]);
        $this->hasMany('CreatedUserTypes', [
            'foreignKey' => 'creator',
            'className' => 'UserTypes'
        ]);
        $this->hasMany('ModifiedUserTypes', [
            'foreignKey' => 'modifier',
            'className' => 'UserTypes'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('status')
            ->maxLength('status', 10)
            ->allowEmptyString('status');

        $validator
            ->nonNegativeInteger('creator')
            ->allowEmptyString('creator');

        $validator
            ->nonNegativeInteger('modifier')
            ->allowEmptyString('modifier');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('person_id', 'People'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn('user_type_id', 'UserTypes'), ['errorField' => 'user_type_id']);

        return $rules;
    }
}
