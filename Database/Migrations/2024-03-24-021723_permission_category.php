<?php

namespace Authentication\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class PermissionCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'perm_group_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'short_code' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'enable_view' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'enable_add' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'enable_edit' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'enable_delete' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => null,
                'null' => true,
                'on update' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('permission_category');
    }

    public function down()
    {
        $this->forge->dropTable('permission_category');
    }
}
