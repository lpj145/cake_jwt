<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'lastname' => ['type' => 'string', 'length' => 40, 'default' => '', 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'username' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 244, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'token' => ['type' => 'string', 'length' => 244, 'default' => '', 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'token_old' => ['type' => 'string', 'length' => 244, 'default' => '', 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'phone' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'two_way' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => null, 'precision' => null],
        'role' => ['type' => 'string', 'length' => 255, 'default' => 'user', 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'default' => 1, 'null' => true, 'comment' => null, 'precision' => null],
        'created_at' => ['type' => 'timestamp', 'length' => null, 'default' => 'CURRENT_TIMESTAMP', 'null' => false, 'comment' => null, 'precision' => null],
        'updated_at' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'users_username' => ['type' => 'unique', 'columns' => ['username'], 'length' => []],
            'users_token' => ['type' => 'unique', 'columns' => ['token'], 'length' => []],
            'users_token_old' => ['type' => 'unique', 'columns' => ['token_old'], 'length' => []],
            'users_phone' => ['type' => 'unique', 'columns' => ['phone'], 'length' => []],
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
                'id' => 'bd2f0808-5fb2-481f-8cbe-562eacf41827',
                'name' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'token' => 'Lorem ipsum dolor sit amet',
                'token_old' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'two_way' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'created_at' => 1561395085,
                'updated_at' => 1561395085
            ],
        ];
        parent::init();
    }
}
