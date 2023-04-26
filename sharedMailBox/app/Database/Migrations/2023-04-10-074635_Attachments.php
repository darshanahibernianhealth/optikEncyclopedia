<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attachments extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'attachment_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'attachment_mail_mail_id' => [
                'type'    => 'TEXT',
            ],
            'attatchment_type' => [
                'type'           => 'TEXT',
            ],
            'attachment_name' => [
                'type'           => 'TEXT',

            ],
            'attachment_size' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'attachment_content_id' => [
                'type'           => 'TEXT',
            ],
            'attachment_bytes' => [
                'type'           => 'TEXT',
            ],
            'attachment_main_id' => [
                'type'           => 'TEXT',
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',

        ]);

        $this->forge->addKey('attachment_id', true);
        $this->forge->createTable('attachments');
    }

    public function down()
    {
        //
        $this->forge->dropTable('attachments');
    }
}
