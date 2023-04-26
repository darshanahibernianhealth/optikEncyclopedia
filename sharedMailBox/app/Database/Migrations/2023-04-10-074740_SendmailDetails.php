<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SendmailDetails extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'send_mail_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'send_mail_to' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'send_mail_from' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'send_mail_cc' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,

            ],
            'send_mail_bcc' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'send_mail_subject' => [
                'type'           => 'TEXT',
            ],
            'send_mail_content' => [
                'type'           => 'TEXT',
            ],
            'send_mail_reminder_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 55,
            ],
            'send_mail_attachement_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'send_mail_dateTime' => [
                'type'           => 'VARCHAR',
                'constraint'     => 60,
            ],
            'send_conversation_id' => [
                'type'           => 'TEXT',
            ],
            'send_mail_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'send_mail_to_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'send_mail_mailbox_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'isStarred' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'starred_mail_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'send_mail_mail_id' => [
                'type'           => 'TEXT',
            ],
            'send_mail_bodyPreview' => [
                'type'           => 'TEXT',
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',

        ]);

        $this->forge->addKey('send_mail_id', true);
        $this->forge->createTable('sendmail_details');
    }

    public function down()
    {
        //
        $this->forge->dropTable('sendmail_details');
    }
}
