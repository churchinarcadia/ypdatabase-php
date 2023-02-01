<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MeetingLocations Model
 *
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\MeetingLocationsNotifyTable&\Cake\ORM\Association\HasMany $MeetingLocationsNotify
 * @property \App\Model\Table\MeetingsTable&\Cake\ORM\Association\HasMany $Meetings
 *
 * @method \App\Model\Entity\MeetingLocation newEmptyEntity()
 * @method \App\Model\Entity\MeetingLocation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MeetingLocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MeetingLocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\MeetingLocation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MeetingLocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MeetingLocation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MeetingLocation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeetingLocation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeetingLocation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingLocation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingLocation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingLocation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin App\Model\Behavior\CreatorModifier
 */
class MeetingLocationsTable extends Table
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

        $this->setTable('meeting_locations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CreatorModifier');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
        ]);
        $this->hasMany('MeetingLocationsNotify', [
            'foreignKey' => 'meeting_location_id',
        ]);
        $this->hasMany('Meetings', [
            'foreignKey' => 'meeting_location_id',
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
            ->scalar('name')
            ->maxLength('name', 20)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->boolean('active')
            ->notEmptyString('active');

        $validator
            ->boolean('notify')
            ->notEmptyString('notify');

        $validator
            ->dateTime('notes')
            ->allowEmptyDateTime('notes');

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
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);
        $rules->add($rules->existsIn('address_id', 'Addresses'), ['errorField' => 'address_id']);

        return $rules;
    }
}
