<?php

namespace Modules\Authentication\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthLogins extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '45', // Length suitable for storing IPV4 and IPV6 addresses
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true, // Nullable because we might not always know the user (e.g., failed logins)
            ],
            'date' => [
                'type' => 'DATETIME',
            ],
            'success' => [
                'type'       => 'BOOLEAN', // Indicates whether the login attempt was successful
            ],
            'user_agent' => [
                'type'       => 'VARCHAR',
                'constraint' => '255', // Optional: stores the user agent string of the browser/device used
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('auth_logins', true);
    }

    public function down()
    {
        $this->forge->dropTable('auth_logins', true);
    }
}
