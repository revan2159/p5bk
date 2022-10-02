<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OpsiModel;
use App\Models\PenilaianModel;


class Penilaian extends BaseController
{
    //contractor
    public function __construct()
    {
        $this->penilaian = new PenilaianModel();
        $this->opsi = new OpsiModel();
    }
    public function index()
    {
        $pil_kelas = $this->request->getVar('kelas');
        $pil_projek = $this->request->getVar('projek');


        $kelas = new PenilaianModel();
        $kelas = $kelas->getKelas();

        //getprojek
        $projek = new PenilaianModel();
        $projek = $projek->getProjek($pil_kelas);

        //getrencana
        $rencana = new PenilaianModel();
        $rencana = $rencana->getAspek($pil_projek);

        //getsiswa
        $siswa = new PenilaianModel();
        $siswa = $siswa->getSiswa($pil_projek);
        $count_siswa = count($siswa);

        //getelemen
        $elemen = new PenilaianModel();
        $elemen = $elemen->getElemen($pil_projek);

        //count elemen
        $count_elemen = count($elemen);

        //getopsi
        $opsi = new OpsiModel();
        $opsi = $opsi->getAllopsi();

        $pilih = new PenilaianModel();
        $pilih = $pilih->getPilihan($pil_projek);


        $data = [
            'title' => 'Penilaian',
            'active' => 'penilaian',
            'kelas' => $kelas,
            'projek' => $projek,
            'dimensi' => $rencana,
            'elemen' => $elemen,
            'siswa' => $siswa,
            'opsi' => $opsi,
            'pilih' => $pilih,
            'count_elemen' => $count_elemen,
            'count_siswa' => $count_siswa,
        ];
        return view('fitur/penilaian', $data);
    }

    public function save()
    {

        $siswa_id = $this->request->getVar('siswa_id');
        $rencana_id = $this->request->getVar('p_id');
        $aspek_id = $this->request->getVar('aspek_id');
        $elemen_id = $this->request->getVar('elemen_id');
        $opsi_id = $this->request->getVar('opsi_id');
        $dimensi_id = $this->request->getVar('dimensi_id');
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
                    'aspek_id' => $aspek_id[$j],
                    'rencana_id' => $rencana_id[$j],
                    'elemen_id' => $elemen_id[$j],
                    'dimensi_id' => $dimensi_id[$j],
                    'opsi_id' => $opsi_id[$index],
                ));
                $index++;
            }
        }
        // for ($i = 0; $i < $count_siswa; $i++) {
        //     for ($j = 0; $j < $count; $j++) {
        //         array_push($data, array(
        //             'siswa_id' => $siswa_id[$i],
        //             'aspek_id' => $aspek_id[$j],
        //             'rencana_id' => $rencana_id[$j],
        //             'elemen_id' => $elemen_id[$j],
        //             'opsi_id' => $opsi_id[$index],
        //         ));
        //         $index++;
        //     }
        // }

        $filter = array_filter(
            //jika opsi_id = 0 maka hapus elemen_id siswa_id dan opsi_id
            array_map(function ($item) {
                if ($item['opsi_id'] == 0) {
                    unset($item['elemen_id']);
                    unset($item['siswa_id']);
                    unset($item['opsi_id']);
                    unset($item['aspek_id']);
                    unset($item['rencana_id']);
                    unset($item['dimensi_id']);
                }
                return $item;
            }, $data)
        );
        dd($filter);
        // $this->penilaian->insertBatch($filter);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/penilaian');
    }
}
