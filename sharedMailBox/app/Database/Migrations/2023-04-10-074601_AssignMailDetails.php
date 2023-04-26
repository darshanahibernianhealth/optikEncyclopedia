<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AssignMailDetails extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'assign_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'assign_mail_conv_id' => [
                'type'    => 'TEXT',
            ],
            'assign_member_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'assign_member_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'assign_datetime' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'assign_by' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',

        ]);
        $this->forge->addKey('assign_id', true);
        $this->forge->createTable('assign_mail_details');
    }

    public function down()
    {
        //
        $this->forge->dropTable('assign_mail_details');
    }
}
