<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reportcates Model
 *
 * @property \App\Model\Table\ReportsTable|\Cake\ORM\Association\HasMany $Reports
 *
 * @method \App\Model\Entity\Reportcate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reportcate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reportcate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reportcate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reportcate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reportcate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reportcate findOrCreate($search, callable $callback = null, $options = [])
 */
class ReportcatesTable extends Table
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

        $this->setTable('reportcates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Reports', [
            'foreignKey' => 'reportcate_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('rc_name')
            ->requirePresence('rc_name', 'create')
            ->notEmpty('rc_name');

        $validator
            ->scalar('rc_note')
            ->allowEmpty('rc_note');

        $validator
            ->integer('rc_list_flg')
            ->requirePresence('rc_list_flg', 'create')
            ->notEmpty('rc_list_flg');

        $validator
            ->integer('rc_order')
            ->requirePresence('rc_order', 'create')
            ->notEmpty('rc_order');

        return $validator;
    }
}
