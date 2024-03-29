<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MeetingTypes Model
 *
 * @property \App\Model\Table\MeetingsTable&\Cake\ORM\Association\HasMany $Meetings
 *
 * @method \App\Model\Entity\MeetingType newEmptyEntity()
 * @method \App\Model\Entity\MeetingType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MeetingType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MeetingType get($primaryKey, $options = [])
 * @method \App\Model\Entity\MeetingType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MeetingType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MeetingType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MeetingType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeetingType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MeetingType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MeetingType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin App\Model\Behavior\CreatorModifier
 */
class MeetingTypesTable extends Table
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

        $this->setTable('meeting_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CreatorModifier');

        $this->hasMany('Meetings', [
            'foreignKey' => 'meeting_type_id',
        ]);
        $this->belongsTo('MeetingTypeCreators', [
            'foreignKey' => 'creator',
            'className' => 'Users',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('MeetingTypeModifiers', [
            'foreignKey' => 'creator',
            'className' => 'Users',
            'joinType' => 'LEFT',
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

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

        return $rules;
    }
}
