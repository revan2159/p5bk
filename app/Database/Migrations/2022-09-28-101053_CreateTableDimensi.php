<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDimensi extends Migration
{
    public function up()
    {
        //create table dimensi
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],

                'nama_dimensi' => [
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

        $this->forge->createTable('dimensi');
    }

    public function down()
    {
        $this->forge->dropTable('dimensi');
    }
}
