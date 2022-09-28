<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableKelas extends Migration
{
    public function up()
    {
        //table tb_kelas 
        $this->forge->addField([
            'kelas_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kelas_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'kelas_wali' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'kelas_tahun_ajaran' => [
                 'type'           => 'DECIMAL',
                'constraint'     => '4,0',
                        ],
            'kelas_jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'kelas_deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('kelas_id', true);
        $this->forge->createTable('tb_kelas');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kelas');
    }
}
