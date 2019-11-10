<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContainersFixture
 */
class ContainersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'container_id' => ['type' => 'string', 'length' => 150, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'container_name' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'radius_port' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'companies_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'created_at' => ['type' => 'timestamp', 'length' => null, 'default' => 'CURRENT_TIMESTAMP', 'null' => false, 'comment' => null, 'precision' => null],
        'updated_at' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_indexes' => [
            'containers_created_at_updated_at' => ['type' => 'index', 'columns' => ['created_at', 'updated_at'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'containers_container_id_container_name_radius_port' => ['type' => 'unique', 'columns' => ['container_id', 'container_name', 'radius_port'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 'fd2b67f9-5b50-4611-91da-086341e0ff00',
                'container_id' => 'Lorem ipsum dolor sit amet',
                'container_name' => 'Lorem ipsum dolor sit amet',
                'radius_port' => 1,
                'companies_id' => '9bc1b108-c285-4a31-9efa-3eebf510ff6f',
                'created_at' => 1573426645,
                'updated_at' => 1573426645
            ],
        ];
        parent::init();
    }
}
