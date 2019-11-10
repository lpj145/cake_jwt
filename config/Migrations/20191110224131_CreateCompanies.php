<?php
use Migrations\AbstractMigration;

class CreateCompanies extends AbstractMigration
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
        $table = $this->table('companies', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'uuid');

        $table->addColumn('name', 'string', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('description', 'string', [
            'default' => '',
            'limit' => 255,
            'null' => true
        ]);

        $table->addColumn('api_token', 'string', [
            'limit' => 255,
            'null' => false
        ]);

        $table->addTimestamps('created_at', 'updated_at');

        $table->addIndex([
            'created_at',
            'updated_at'
        ]);

        $table->addIndex([
            'name'
        ], [
            'unique' => true
        ]);

        $table->create();
    }
}
