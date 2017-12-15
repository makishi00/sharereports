<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReportsFixture
 *
 */
class ReportsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'レポートID', 'autoIncrement' => true, 'precision' => null],
        'rp_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '作業日', 'precision' => null],
        'rp_time_from' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '作業開始時間', 'precision' => null],
        'rp_time_to' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '作業終了時間', 'precision' => null],
        'rp_content' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '作業内容', 'precision' => null],
        'rp_created_at' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '登録日時', 'precision' => null],
        'reportcate_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '作業種類ID', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '報告者ID', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'reportcate_id' => ['type' => 'index', 'columns' => ['reportcate_id'], 'length' => []],
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'reports_ibfk_1' => ['type' => 'foreign', 'columns' => ['reportcate_id'], 'references' => ['reportcates', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'reports_ibfk_2' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'rp_date' => '2017-12-15',
            'rp_time_from' => '11:07:33',
            'rp_time_to' => '11:07:33',
            'rp_content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'rp_created_at' => '2017-12-15 11:07:33',
            'reportcate_id' => 1,
            'user_id' => 1
        ],
    ];
}
