<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mailbox extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'mailbox_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'mailbox_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mailbox_color' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'mailbox_createdBy' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,

            ],
            'mailbox_createdAt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 60,
            ],
            'mailbox_email_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'isActive' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',

        ]);

        $this->forge->addKey('mailbox_id', true);
        $this->forge->createTable('mailbox');
    }

    public function down()
    {
        //
        $this->forge->dropTable('mailbox');
    }
}
