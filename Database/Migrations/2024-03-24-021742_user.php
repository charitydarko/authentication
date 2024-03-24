<?php

namespace Authentication\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
              'type' => 'INT',
              'unsigned' => true,
              'auto_increment' => true
            ],
            'user_id' => [
              'type' => 'VARCHAR',
              'type' => 'INT',
              'null' => false
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => false
            ],
            'verification_code' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false
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
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('user');

    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
