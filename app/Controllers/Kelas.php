<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kelas extends BaseController
{
    public function index()
    {
        $kelas = new \App\Models\KelasModel();

        $sum_siswa = $kelas->select('tb_kelas.kelas_id, tb_kelas.kelas_nama, tb_kelas.kelas_jurusan,COUNT(tb_siswa.siswa_id) as jumlah_siswa')
            ->join('tb_siswa', 'tb_siswa.siswa_kelas = tb_kelas.kelas_id', 'left')
            ->groupBy('tb_kelas.kelas_id')
            ->get()->getResultArray();



        $data = [
            'title' => 'Data Kelas',
            'active' => 'data_kelas',
            'kelas' => $sum_siswa
        ];
        return view('fitur/kelas', $data);
    }
}
