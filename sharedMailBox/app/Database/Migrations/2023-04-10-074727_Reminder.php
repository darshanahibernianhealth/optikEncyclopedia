<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reminder extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'reminder_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'reminder_mail_conv_id' => [
                'type'           => 'TEXT'
            ],
            'reminder_flag' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'reminder_createdBy' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,

            ],
            'reminder_createdAt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 60,
            ],
            'reminder_date_time' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',

        ]);

        $this->forge->addKey('reminder_id', true);
        $this->forge->createTable('reminder');
    }

    public function down()
    {
        //
        $this->forge->dropTable('reminder');
    }
}
