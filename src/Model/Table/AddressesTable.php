<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

//Needed for ADmad/SocialAuth
use \Cake\Datasource\EntityInterface;
use \Cake\Http\Session;

/**
 * Addresses Model
 *
 * @property \App\Model\Table\MeetingLocationsTable&\Cake\ORM\Association\HasMany $MeetingLocations
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\HasMany $People
 *
 * @method \App\Model\Entity\Address newEmptyEntity()
 * @method \App\Model\Entity\Address newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin App\Model\Behavior\CreatorModifier
 */
class AddressesTable extends Table
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

        $this->setTable('addresses');
        $this->setDisplayField('full_address');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CreatorModifier');

        $this->hasMany('MeetingLocations', [
            'foreignKey' => 'address_id',
        ]);
        $this->hasMany('People', [
            'foreignKey' => 'address_id',
        ]);
        $this->belongsTo('AddressCreators', [
            'foreignKey' => 'creator',
            'className' => 'Users',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('AddressModifiers', [
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
            ->scalar('number')
            ->maxLength('number', 5)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->scalar('direction')
            ->maxLength('direction', 1)
            ->allowEmptyString('direction');

        $validator
            ->scalar('street')
            ->maxLength('street', 20)
            ->requirePresence('street', 'create')
            ->notEmptyString('street');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 4)
            ->allowEmptyString('unit');

        $validator
            ->scalar('city')
            ->maxLength('city', 20)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 2)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->nonNegativeInteger('zip')
            ->requirePresence('zip', 'create')
            ->notEmptyString('zip');

        $validator
            ->nonNegativeInteger('creator')
            ->allowEmptyString('creator');

        $validator
            ->nonNegativeInteger('modifier')
            ->allowEmptyString('modifier');

        return $validator;
    }

}