<?php
use Migrations\AbstractMigration;

class CreateContainers extends AbstractMigration
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
        $table = $this->table('containers', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'uuid');

        $table->addColumn('container_id', 'string', [
            'limit' => 150,
            'null' => false
        ]);

        $table->addColumn('container_name', 'string', [
            'limit' => 100,
            'null' => false
        ]);

        $table->addColumn('radius_port', 'integer', [
            'null' => false
        ]);

        $table->addColumn('companies_id', 'uuid');
        $table->addTimestamps('created_at', 'updated_at');

        $table->addIndex([
            'created_at',
            'updated_at'
        ]);

        $table->addIndex([
            'container_id',
            'container_name',
            'radius_port'
        ], [
            'unique' => true
        ]);

        $table->create();
    }
}
