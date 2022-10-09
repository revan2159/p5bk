<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Siswa extends BaseController
{
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }
    public function index()
    {

        //get nama_kelas from tb_kelas table join with tb_siswa siswa_kelas
        $db = \Config\Database::connect();
        $builder = $db->table('tb_siswa');
        $builder->join('tb_kelas', 'tb_kelas.kelas_id = tb_siswa.siswa_kelas');
        $builder->select('tb_siswa.siswa_id,tb_siswa.siswa_nama,tb_siswa.siswa_status, tb_siswa.siswa_nis,tb_siswa.siswa_jk,tb_siswa.siswa_alamat,tb_siswa.siswa_agama,tb_siswa.siswa_kelas');
        $builder->select('tb_kelas.kelas_id,tb_kelas.kelas_nama');
        $query = $builder->get()->getResultArray();




        $data = [
            'title' => 'Data Siswa',
            'active' => 'data_siswa',
            'siswa' => $query,
        ];
        return view('fitur/data_siswa', $data);
    }
}
