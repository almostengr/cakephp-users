<?php
declare(strict_types=1);

namespace CakephpUsers\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \CakephpUsers\Model\Table\UserRolesTable&\Cake\ORM\Association\BelongsTo $UserRoles
 *
 * @method \CakephpUsers\Model\Entity\User newEmptyEntity()
 * @method \CakephpUsers\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\CakephpUsers\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \CakephpUsers\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \CakephpUsers\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \CakephpUsers\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\CakephpUsers\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \CakephpUsers\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \CakephpUsers\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\CakephpUsers\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\CakephpUsers\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\CakephpUsers\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\CakephpUsers\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\CakephpUsers\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\CakephpUsers\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\CakephpUsers\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\CakephpUsers\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserRoles', [
            'foreignKey' => 'user_role_id',
            'joinType' => 'INNER',
            'className' => 'CakephpUsers.UserRoles',
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
            ->integer('user_role_id')
            ->notEmptyString('user_role_id');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 150)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('password_token')
            ->maxLength('password_token', 255)
            ->allowEmptyString('password_token');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 100)
            ->requirePresence('created_by', 'create')
            ->notEmptyString('created_by');

        $validator
            ->scalar('modified_by')
            ->maxLength('modified_by', 100)
            ->requirePresence('modified_by', 'create')
            ->notEmptyString('modified_by');

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
        $rules->add($rules->existsIn(['user_role_id'], 'UserRoles'), ['errorField' => 'user_role_id']);

        return $rules;
    }
}
