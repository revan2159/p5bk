<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbTahunAjar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tahun_ajaran_id' => [
                'type'           => 'DECIMAL',
                'constraint'     => '4,0',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => true,
            ],
            'periode_aktif' => [
                'type' => 'DECIMAL',
                'constraint' => '1,0',
                'null' => true,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'last_sync' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('tahun_ajaran_id', true);
       
        $this->forge->createTable('tb_tahun_ajaran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tahun_ajaran');
    }
}
