<?php

namespace Authentication\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Role extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
              'type' => 'INT',
              'unsigned' => true,
              'auto_increment' => true
            ],
            'name' => [
              'type' => 'VARCHAR',
              'constraint' => 100,
              'null' => false,
              'unique' => true
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'is_system' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'is_superadmin' => [
                'type' => 'INT',
                'default' => 0
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => null,
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('role');
    }

    public function down()
    {
        $this->forge->dropTable('role');
    }
}
