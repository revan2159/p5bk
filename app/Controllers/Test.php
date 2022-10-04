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
        // rencana_id	nama	deskripsi
        // 0	1	Proyek 1	MEMBUAT AYANG
        // 1	9	Projek 2	membuat adasda
        // 2	10	Projek 3	asdasdasda


        //get all opsi
        $opsi = new OpsiModel();
        $opsi = $opsi->getAllopsi();

        //get data dimensi
        $dimensi = new DimensiModel();
        $dimensi = $dimensi->findAll();

        //get aspek
        $aspek = $db->table('aspek_penilaian');
        $aspek = $aspek->get()->getResultArray();


        //get data nilai dimensi
        $kueri_nilai = $db->table('nilai_p5bk');
        $kueri_nilai->select('nilai_p5bk.dimensi_id,nilai_p5bk.rencana_id,nilai_p5bk.rencana_id,nilai_p5bk.elemen_id,nilai_p5bk.opsi_id');
        $kueri_nilai->where('nilai_p5bk.siswa_id', $id_siswa);
        $nilai = $kueri_nilai->get()->getResultArray();
        // dimensi_id	rencana_id	elemen_id	opsi_id
        // 0	1	1	1	1
        // 1	1	1	2	1
        // 2	1	1	3	1
        // 3	1	1	4	2
        // 4	1	1	5	2
        // 5	2	1	6	3
        // 6	2	1	7	3
        // 7	2	1	8	3
        // 8	2	1	9	1
        // 9	3	1	10	4
        // 10	3	1	11	4
        // 11	3	1	12	1

        //find nama proyek, name dimensi, name elemen, opsi_id with siswa_id
        $nilai_dimensi = $db->table('nilai_p5bk');
        $nilai_dimensi->select('nilai_p5bk.dimensi_id,nilai_p5bk.rencana_id,nilai_p5bk.elemen_id,nilai_p5bk.opsi_id');
        $nilai_dimensi->where('nilai_p5bk.siswa_id', $id_siswa);
        $nilai_dimensi = $nilai_dimensi->get()->getResultArray();

        //get name dimensi
        $elm = $db->table('elemen');
        $elm->select('elemen.id_elemen,elemen.dimensi_id, elemen.nama_elemen, elemen.elemen_deskripsi');
        $elm = $elm->get()->getResultArray();

        //get catatan
        $catatan = $db->table('catatan');
        $catatan->select('catatan.catatan');
        $catatan->where('catatan.siswa_id', $id_siswa);
        $catatan = $catatan->get()->getRowArray();




        $data = [
            'title' => 'Set Aspek',
            'siswa' => $siswa,
            'rencana' => $rencana,
            'opsi' => $opsi,
            'dimensi' => $dimensi,
            'nilai' => $nilai,
            'nilai_dimensi' => $nilai_dimensi,
            'elemen' => $elm,
            'aspek' => $aspek,
            'catatan' => $catatan
        ];


        return view('fitur/test', $data);
    }
}
