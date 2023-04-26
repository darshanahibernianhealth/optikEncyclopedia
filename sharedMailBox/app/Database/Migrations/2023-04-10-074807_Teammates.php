<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Teammates extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'member_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'member_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'member_mailbox_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'member_createdBy' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,

            ],
            'member_createdAt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',

        ]);

        $this->forge->addKey('member_id', true);
        $this->forge->createTable('teammates');
    }

    public function down()
    {
        //
        $this->forge->dropTable('teammates');
    }
}
