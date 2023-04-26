<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StarredMail extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'starred_mail_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'starred_mail_action' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'starred_date_time' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'starred_mail_mail_id' => [
                'type'           => 'TEXT'

            ],
            'starred_createdBy' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',

        ]);

        $this->forge->addKey('starred_mail_id', true);
        $this->forge->createTable('starred_mail');
    }

    public function down()
    {
        //
        $this->forge->dropTable('starred_mail');
    }
}
