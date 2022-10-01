<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Test extends BaseController

{


    public function index()
    {
        $db = Database::connect();

        $kelas = $this->request->getVar('kelas');
        //get input from url segment 3
        $projek = $this->request->getVar('projek');

        //get all rencana
        $rencana = $db->table('rencana_budaya_kerja');
        $kueri2 = $rencana->select('rencana_id,nama');
        $kueri2 = $rencana->where('kelas_id', $kelas);
        $kueri2 = $rencana->get()->getResultArray();

        $pilih = $db->table('tb_kelas');
        $pilih->select('kelas_nama');
        $pilih->where('kelas_id', $kelas);
        $kueri3 = $pilih->get()->getRowArray();

        $kls = $db->table('tb_kelas');
        $kueri = $kls->select('kelas_id,kelas_nama');
        $kueri = $kls->get()->getResultArray();

        $p1 = $db->table('aspek_penilaian');
        $p1->select('aspek_penilaian.dimensi_id,aspek_penilaian.aspek_id,aspek_penilaian.rencana_id,dimensi.nama_dimensi');
        $p1->join('dimensi', 'dimensi.id_dimensi = aspek_penilaian.dimensi_id');
        $p1->where('rencana_id', $projek);
        //data dimensi 
        $ka = $p1->get()->getResultArray();

        $p2 = $db->table('elemen');
        $p2->select('elemen.id_elemen,elemen.nama_elemen,elemen.dimensi_id,dimensi.nama_dimensi');
        $p2->join('aspek_penilaian', 'aspek_penilaian.dimensi_id = elemen.dimensi_id');
        $p2->join('dimensi', 'dimensi.id_dimensi = elemen.dimensi_id');


        $p2->where('aspek_penilaian.rencana_id', $projek);
        $p2->where('rencana_id', $projek);
        //data elemen
        $ka2 = $p2->get()->getResultArray();

        $p3 = $db->table('opsi_penilaian');
        $p3->select('opsi_penilaian.opsi_id,opsi_penilaian.kode_opsi');
        //data opsi
        $opsi = $p3->get()->getResultArray();


        $p4 = $db->table('tb_siswa');
        //get siswa by siswa_kelas from rencana_budaya_kerja where rencana_id = $projek
        $p4->select('tb_siswa.siswa_id,tb_siswa.siswa_nama');
        $p4->join('rencana_budaya_kerja', 'rencana_budaya_kerja.kelas_id = tb_siswa.siswa_kelas');
        //kelas nama 

        $p4->where('rencana_id', $projek);
        //data siswa 
        $siswa = $p4->get()->getResultArray();

        $count = count($ka2);

        $p5 = $db->table('rencana_budaya_kerja');
        $p5->select('rencana_budaya_kerja.nama');
        $p5->where('rencana_id', $projek);
        $pilih2 = $p5->get()->getRowArray();


        $data = [
            'title' => 'Set Aspek',
            'id_kelas' => $kelas,
            'project' => $kueri2,
            'kelas' => $kueri,
            'pilih' => $kueri3,
            'dimensi' => $ka,
            'elemen' => $ka2,
            'opsi' => $opsi,
            'siswa' => $siswa,
            'pilih2' => $pilih2,
            'count' => $count,
            'count_siswa' => count($siswa),
            'count_dimensi' => count($ka),
            'count_aspek' => count($ka2),
            'count_opsi' => count($opsi),
        ];


        return view('fitur/test', $data);
    }

    //input-nilai
    public function input_nilai()
    {


        $siswa_id = $this->request->getVar('siswa_id');
        //$dimensi_id = $this->request->getVar('dimensi_id');
        // $aspek_id = $this->request->getVar('aspek_id');
        $elemen_id = $this->request->getVar('elemen_id');
        $opsi_id = $this->request->getVar('opsi_id');
        //$count_dimensi = $this->request->getVar('count_dimensi');
        // $count_aspek = $this->request->getVar('count_aspek');
        //$count_opsi = $this->request->getVar('count_opsi');

        //count array
        $count = $this->request->getVar('count');
        $count_siswa = $this->request->getVar('count_siswa');

        $data = array();
        $index = 0;
        for ($i = 0; $i < $count_siswa; $i++) {
            for ($j = 0; $j < $count; $j++) {
                array_push($data, array(
                    'siswa_id' => $siswa_id[$i],
                    'elemen_id' => $elemen_id[$j],
                    'opsi_id' => $opsi_id[$index],
                ));
                $index++;
            }
        }
        $db = Database::connect();
        $input = $db->table('nilai_p5bk')->insertBatch($data);
        if ($input) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('test'));
        } else {
            session()->setFlashdata('pesan', 'Data gagal ditambahkan');
            return redirect()->to(base_url('test'));
        }
    }
}
