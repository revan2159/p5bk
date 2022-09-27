<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTbSemester extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'semester_id' => [
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
            'tahun_ajaran_id' => [
                'type' => 'DECIMAL',
                'constraint' => '4,0',
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
        $this->forge->addKey('semester_id', true);
        $this->forge->addForeignKey('tahun_ajaran_id', 'tb_tahun_ajaran', 'tahun_ajaran_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_semester');
    }

    public function down()
    {
        $this->forge->dropTable('tb_semester');
    }
}
