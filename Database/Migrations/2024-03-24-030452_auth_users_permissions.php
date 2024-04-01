<?php

namespace Modules\Authentication\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AuthUsersPermissions extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'group_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'permission_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
        ]);
    
        // Setting the Foreign Keys
        // Note: Ensure your database engine supports foreign keys.
        $this->forge->addForeignKey('group_id', 'auth_groups', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('permission_id', 'auth_permissions', 'id', 'CASCADE', 'CASCADE');
    
        // Adding a composite primary key to ensure uniqueness.
        $this->forge->addKey(['group_id', 'permission_id'], true);
    
        $this->forge->createTable('auth_groups_permissions');
    }
    
    public function down()
    {
        $this->forge->dropTable('auth_groups_permissions');
    }
}
