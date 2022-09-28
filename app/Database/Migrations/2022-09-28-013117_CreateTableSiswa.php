<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSiswa extends Migration
{
    public function up()
    {
        //table siswa
        $this->forge->addField([
            'siswa_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'siswa_nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'siswa_nis' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'siswa_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'siswa_jk' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
                'null' => true,
            ],
            'siswa_tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'siswa_tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'siswa_agama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'siswa_alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'siswa_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'siswa_email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'siswa_kelas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'siswa_tahun_masuk' => [
                'type' => 'YEAR',
                'null' => true,
            ],
            'siswa_tahun_lulus' => [
                'type' => 'YEAR',
                'null' => true,
            ],
            'siswa_status' => [
                'type' => 'ENUM',
                'constraint' => ['Aktif', 'Tidak Aktif'],
                'null' => true,
            ],
            'siswa_foto' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'siswa_created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'siswa_updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

        ]);
        $this->forge->addKey('siswa_id', true);
        $this->forge->createTable('tb_siswa');
    }

    public function down()
    {
    $this->forge->dropTable('tb_siswa');    
    }
}
