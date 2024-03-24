<?php

namespace Authentication\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class RolePermission extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null'  => false
            ],
            'perm_cat_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null'  => false
            ],
            'can_view' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'can_add' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'can_edit' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'can_delete' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
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
        $this->forge->addForeignKey('role_id', 'role', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('perm_cat_id', 'permission_category', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('role_permission');
    }

    public function down()
    {
        $this->forge->dropTable('role_permission');
    }
}
