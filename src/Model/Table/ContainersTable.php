<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Containers Model
 *
 * @property \App\Model\Table\ContainersTable&\Cake\ORM\Association\BelongsTo $Containers
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\ContainersTable&\Cake\ORM\Association\HasMany $Containers
 *
 * @method \App\Model\Entity\Container get($primaryKey, $options = [])
 * @method \App\Model\Entity\Container newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Container[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Container|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Container saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Container patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Container[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Container findOrCreate($search, callable $callback = null, $options = [])
 */
class ContainersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('containers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Containers', [
            'foreignKey' => 'container_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'companies_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Containers', [
            'foreignKey' => 'container_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('container_name')
            ->maxLength('container_name', 100)
            ->requirePresence('container_name', 'create')
            ->notEmptyString('container_name');

        $validator
            ->integer('radius_port')
            ->requirePresence('radius_port', 'create')
            ->notEmptyString('radius_port');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['container_id'], 'Containers'));
        $rules->add($rules->existsIn(['companies_id'], 'Companies'));

        return $rules;
    }
}
