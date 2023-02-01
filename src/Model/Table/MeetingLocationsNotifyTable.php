<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MeetingLocationsNotify Model
 *
 * @property \App\Model\Table\MeetingLocationsTable&\Cake\ORM\Association\BelongsTo $MeetingLocations
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\BelongsTo $People
 *
 * @method \App\Model\Entity\MeetingLocationsNotify newEmptyEntity()
 * @method \App\Model\Entity\MeetingLocationsNotify newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify get($primaryKey, $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingLocationsNotify[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin App\Model\Behavior\CreatorModifier
 */
class MeetingLocationsNotifyTable extends Table
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

        $this->setTable('meeting_locations_notify');
        $this->setDisplayField('MeetingLocation.name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CreatorModifier');

        $this->belongsTo('MeetingLocations', [
            'foreignKey' => 'meeting_location_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('People', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn('meeting_location_id', 'MeetingLocations'), ['errorField' => 'meeting_location_id']);
        $rules->add($rules->existsIn('person_id', 'People'), ['errorField' => 'person_id']);

        return $rules;
    }
}
