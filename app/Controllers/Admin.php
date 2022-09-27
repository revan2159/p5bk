<?php

namespace App\Controllers;

use App\Controllers\DataSekolah;
use Config\Services;

class Admin extends BaseController
{

    protected $identitas;
    protected $tahun_ajaran;
    protected $semester;

    public function __construct()
    {
        $this->tahun_ajaran = new DataSekolah();
        $this->tahun_ajaran = $this->tahun_ajaran->tahun_ajaran();
        //session 
        $this->session = Services::session();
    }

    public function index()
    {

        $data = [
            'title' => 'Dashboard ',
            'active' => 'dashboard',
            'identitas' => $this->identitas[0],
            'tahun_ajaran' => $this->session->get('tahun_ajaran'),
            'nama' => user()->username,
        ];

        return view('fitur/dashboard', $data);
    }

    public function profil()
    {
        return view('admin/profil');
    }

    public function data_sekolah()
    {
        $data = [
            'title' => 'Data Sekolah',
            'active' => 'data_sekolah',
            'identitas' => $this->identitas[0],
            'tahun_ajaran' => $this->session->get('tahun_ajaran'),
            'nama' => user()->username,
        ];
        return view('fitur/data_sekolah', $data);
    }
}
