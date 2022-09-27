<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSekolah extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'sekolah_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'sekolah_npsn' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'sekolah_nama' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => true,
            ],
            'sekolah_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => true,
            ],
            'sekolah_kodepos' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            'sekolah_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'sekolah_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'sekolah_website' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'sekolah_created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'sekolah_updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'sekolah_logo' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('sekolah_id', true);
        $this->forge->createTable('tb_sekolah');
    }

    public function down()
    {
        $this->forge->dropTable('tb_sekolah');
    }
}
