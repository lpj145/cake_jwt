<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'uuid');
        $table->addColumn('name', 'string', [
            'limit' => 40
        ]);
        $table->addColumn('lastname', 'string', [
            'limit' => 40,
            'default' => '',
            'null' => true
        ]);

        $table->addColumn('username', 'string', [
            'limit' => 60
        ]);
        $table->addColumn('password', 'string', [
            'limit' => 244
        ]);
        $table->addColumn('token', 'string', [
            'limit' => 244,
            'default' => '',
            'null' => true
        ]);
        $table->addColumn('token_old', 'string', [
            'limit' => 244,
            'default' => '',
            'null' => true
        ]);
        $table->addColumn('phone', 'string', [
            'limit' => 40
        ]);
        $table->addColumn('two_way', 'boolean', [
            'default' => false,
            'null' => true
        ]);
        $table->addColumn('role', 'string', [
            'default' => 'user',
            'null' => true
        ]);
        $table->addColumn('active', 'boolean', [
            'default' => true,
            'null' => true
        ]);
        $table->addTimestamps();
        $table->addIndex(['username'], ['unique' => true]);
        $table->addIndex(['token'], ['unique' => true]);
        $table->addIndex(['token_old'], ['unique' => false]);
        $table->addIndex(['phone'], ['unique' => true]);
        $table->create();
    }
}
