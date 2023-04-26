<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mails extends Migration
{
    public function up()
    {
        //
         //
         $this->forge->addField([
            'mail_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'mail_mail_id' => [
                'type'           => 'TEXT',
            ],
            'mail_conversation_id' => [
                'type'           => 'TEXT'
            ],
            'mail_to' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,

            ],
            'mail_from' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_cc' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_bcc' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_subject' => [
                'type'           => 'TEXT'
            ],
            'mail_content' => [
                'type'           => 'TEXT'
            ],
            'mail_bodyPreview' => [
                'type'           => 'TEXT'
            ],
            'mail_has_attachment' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'mail_recivedAt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'mail_mailbox_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'mail_reminder_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'mail_is_open' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'mail_openAt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 60,
            ],
            'mail_to_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_from_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_flag' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'member_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'isStarred' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'starred_mail_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'mail_status' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'mail_deletedBy' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_deleteAt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_assignBy' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_AssignAt' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'mail_folder_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',

        ]);

        $this->forge->addKey('mail_id', true);
        $this->forge->createTable('mails');

    }

    public function down()
    {
        //
        $this->forge->dropTable('mails');
    }
}
