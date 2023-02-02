<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SocialMedias Model
 *
 * @property \App\Model\Table\PeopleTable&\Cake\ORM\Association\BelongsTo $People
 * @property \App\Model\Table\SocialMediaTypesTable&\Cake\ORM\Association\BelongsTo $SocialMediaTypes
 *
 * @method \App\Model\Entity\SocialMedia newEmptyEntity()
 * @method \App\Model\Entity\SocialMedia newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SocialMedia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SocialMedia get($primaryKey, $options = [])
 * @method \App\Model\Entity\SocialMedia findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SocialMedia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SocialMedia[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SocialMedia|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialMedia saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialMedia[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialMedia[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialMedia[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SocialMedia[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin App\Model\Behavior\CreatorModifier
 */
class SocialMediasTable extends Table
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

        $this->setTable('social_medias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CreatorModifier');

        $this->belongsTo('People', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SocialMediaTypes', [
            'foreignKey' => 'social_media_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SocialMediaCreators', [
            'foreignKey' => 'creator',
            'className' => 'Users',
            'joinType' => 'LEFT',
        ]);
        $this->belongsTo('SocialMediaModifiers', [
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
            ->scalar('handle')
            ->maxLength('handle', 25)
            ->requirePresence('handle', 'create')
            ->notEmptyString('handle');

        $validator
            ->nonNegativeInteger('creator')
            ->allowEmptyString('creator');

        $validator
            ->nonNegativeInteger('modifier')
            ->allowEmptyString('modifier');

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

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
        $rules->add($rules->existsIn('person_id', 'People'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn('social_media_type_id', 'SocialMediaTypes'), ['errorField' => 'social_media_type_id']);

        return $rules;
    }
}
