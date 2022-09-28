<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Controllers\BaseController;

class Siswa extends BaseController
{
    public function __construct(){
        $this->siswaModel = new SiswaModel();
    }
    public function index()
    {


        $data = [
            'title' => 'Data Siswa',
            'active' => 'data_siswa',
            'siswa' => $this->siswaModel->findAll(),
        ];
        return view('fitur/data_siswa', $data);
    }

    
}
