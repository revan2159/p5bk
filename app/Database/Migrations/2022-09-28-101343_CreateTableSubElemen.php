<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSubElemen extends Migration
{
    public function up()
    {
        //create table sub elemen
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],

                'nama_sub_elemen' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],

                'elemen_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
            ],
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('sub_elemen');
    }

    public function down()
    {
        //
    }
}
