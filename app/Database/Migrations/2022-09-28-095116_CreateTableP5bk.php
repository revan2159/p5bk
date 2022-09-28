<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableP5bk extends Migration
{
    public function up()
    {
        //create table p5bk
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],

                'kelas' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],

                'judul_proyek' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'tema_proyek' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'deskripsi_proyek' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'tema_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
            ],
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('p5bk');
    }

    public function down()
    {
        $this->forge->dropTable('p5bk');
    }
}
