<?php

namespace App\Controllers;

use App\Controllers\DataSekolah;
use App\Models\SekolahModel;
use Config\Services;

class Admin extends BaseController
{


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

        $identitas = new SekolahModel();
        $identitas = $identitas->getsekolah();
        $data = [
            'title' => 'Dashboard ',
            'active' => 'dashboard',
            'identitas' => $identitas,
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
        $datsekolah = new SekolahModel();
        $sekolah = $datsekolah->getSekolah();

        $data = [
            'title' => 'Data Sekolah',
            'active' => 'data_sekolah',
            'identitas' => $this->identitas,
            'tahun_ajaran' => $this->session->get('tahun_ajaran'),
            'nama' => user()->username,
            'sekolah' => $sekolah
        ];
        return view('fitur/data_sekolah', $data);
    }
}
