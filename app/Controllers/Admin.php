<?php

namespace App\Controllers;

use App\Controllers\DataSekolah;
use App\Models\SekolahModel;
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
        $datsekolah = new SekolahModel();
        $sekolah = $datsekolah->getSekolah();


        $data = [
            'title' => 'Data Sekolah',
            'active' => 'data_sekolah',
            'identitas' => $this->identitas[0],
            'tahun_ajaran' => $this->session->get('tahun_ajaran'),
            'nama' => user()->username,
            'sekolah' => $sekolah
        ];
        return view('fitur/data_sekolah', $data);
    }

    public function ubah_sekolah()
    {
        $datsekolah = new SekolahModel();
        $id_sekolah = 1;

        $nama_sekolah = $this->request->getVar('nama');
        $npsn = $this->request->getVar('npsn');
        $alamat = $this->request->getVar('alamat');
        $kepala_sekolah = $this->request->getVar('kepala_sekolah');
        $kode_pos = $this->request->getVar('kode_pos');
        $email = $this->request->getVar('email');
        $no_telp = $this->request->getVar('no_telp');
        $website = $this->request->getVar('website');

        $data = [
            'sekolah_nama' => $nama_sekolah,
            'sekolah_npsn' => $npsn,
            'sekolah_alamat' => $alamat,
            'sekolah_kepala_sekolah' => $kepala_sekolah,
            'sekolah_kodepos' => $kode_pos,
            'sekolah_email' => $email,
            'sekolah_telepon' => $no_telp,
            'sekolah_website' => $website,
        ];

        $datsekolah->update($id_sekolah, $data);
    }




    function form()
    {
        return view('fitur/user');
    }
}
