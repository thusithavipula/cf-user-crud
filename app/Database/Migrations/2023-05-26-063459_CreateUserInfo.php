<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserInfo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'mobile' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ]
        ]);
        $this->forge->addKey('user_id');
        $this->forge->createTable('user_info');
    }

    public function down()
    {
        $this->forge->dropTable('user_info');
    }
}
