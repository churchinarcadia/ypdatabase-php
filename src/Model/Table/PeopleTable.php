<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * People Model
 *
 * @property \App\Model\Table\MeetingPeopleTable&\Cake\ORM\Association\HasMany $MeetingPeople
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Person newEmptyEntity()
 * @method \App\Model\Entity\Person newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\MeetingLocationsNotifyTable&\Cake\ORM\Association\HasMany $MeetingLocationsNotify
 * @property \App\Model\Table\SocialMediasTable&\Cake\ORM\Association\HasMany $SocialMedias
 */
class PeopleTable extends Table
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

        $this->setTable('people');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
        ]);
        $this->hasMany('MeetingLocationsNotify', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('MeetingPeople', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('SocialMedias', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'person_id',
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
            ->scalar('first_name')
            ->maxLength('first_name', 100)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('middle_name')
            ->maxLength('middle_name', 20)
            ->allowEmptyString('middle_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 100)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 1)
            ->allowEmptyString('gender');

        $validator
            ->scalar('mobile_phone')
            ->maxLength('mobile_phone', 10)
            ->allowEmptyString('mobile_phone');

        $validator
            ->scalar('call_or_text')
            ->maxLength('call_or_text', 4)
            ->allowEmptyString('call_or_text');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->nonNegativeInteger('hs_grad_year')
            ->allowEmptyString('hs_grad_year');

        $validator
            ->scalar('home_phone')
            ->maxLength('home_phone', 10)
            ->allowEmptyString('home_phone');

        $validator
            ->boolean('baptized')
            ->allowEmptyString('baptized');

        $validator
            ->boolean('active')
            ->allowEmptyString('active');

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

        $validator
            ->scalar('internal_notes')
            ->allowEmptyString('internal_notes');

        $validator
            ->nonNegativeInteger('district')
            ->allowEmptyString('district');

        $validator
            ->nonNegativeInteger('father')
            ->allowEmptyString('father');

        $validator
            ->nonNegativeInteger('mother')
            ->allowEmptyString('mother');

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
        $rules->add($rules->existsIn('address_id', 'Addresses'), ['errorField' => 'address_id']);

        return $rules;
    }
}
