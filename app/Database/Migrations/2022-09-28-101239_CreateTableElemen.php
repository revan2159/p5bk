<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableElemen extends Migration
{
    public function up()
    {
        //create table elemen
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],

                'nama_elemen' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],

                'sub_elemen_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
            ],
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('elemen');
    }

    public function down()
    {
        $this->forge->dropTable('elemen');
    }
}
