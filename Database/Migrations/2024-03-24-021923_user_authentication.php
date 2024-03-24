<?php

namespace Authentication\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class UserAuthentication extends Migration
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
                'type' => 'INT',
                'unsigned' => true,
                'null'  => false
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'expired_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ] ,
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => null,
                'null' => true,
                'on update' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('user_authentication');
    }

    public function down()
    {
        $this->forge->dropTable('user_authentication');
    }

}
