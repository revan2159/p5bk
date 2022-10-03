<?php

namespace App\Controllers;

use Mpdf\Tag\Dd;
use Config\Database;
use App\Models\OpsiModel;
use App\Models\DimensiModel;
use App\Controllers\BaseController;

class Test extends BaseController

{


    public function index()
    {
        $db = Database::connect();

        $id_siswa = 1;

        //get data siswa 
        $siswa = $db->table('tb_siswa');
        $siswa = $siswa->select('tb_siswa.siswa_id, tb_siswa.siswa_nama, tb_siswa.siswa_nis, tb_siswa.siswa_nisn, tb_siswa.siswa_jk, tb_siswa.siswa_tempat_lahir, tb_siswa.siswa_tanggal_lahir, tb_siswa.siswa_agama, tb_siswa.siswa_alamat, tb_siswa.siswa_kelas, tb_kelas.kelas_nama');
        $siswa = $siswa->join('tb_kelas', 'tb_kelas.kelas_id = tb_siswa.siswa_kelas');
        $siswa = $siswa->where('tb_siswa.siswa_id', $id_siswa);
        $siswa = $siswa->get()->getRowArray();


        //get data rencana
        $rencana = $db->table('rencana_budaya_kerja');
        $rencana = $rencana->select('rencana_budaya_kerja.rencana_id,rencana_budaya_kerja.nama, rencana_budaya_kerja.deskripsi');
        $rencana = $rencana->where('rencana_budaya_kerja.kelas_id', $siswa['siswa_kelas']);
        $rencana = $rencana->get()->getResultArray();

        //get all opsi
        $opsi = new OpsiModel();
        $opsi = $opsi->getAllopsi();

        //get data dimensi
        $dimensi = new DimensiModel();
        $dimensi = $dimensi->findAll();

        // dd($rencana);

        //get data nilai dimensi
        $nilai = $db->table('nilai_p5bk');
        $nilai = $nilai->get()->getResultArray();


        $data = [
            'title' => 'Set Aspek',
            'siswa' => $siswa,
            'rencana' => $rencana,
            'opsi' => $opsi,
            'dimensi' => $dimensi,
            'nilai' => $nilai
        ];


        return view('fitur/test', $data);
    }
}
