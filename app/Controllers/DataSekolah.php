<?php

namespace App\Controllers;

use Config\Services;
use App\Models\SekolahModel;
use App\Models\TahunAjaranModel;


class DataSekolah extends BaseController
{
    protected $sekolah;
    protected $tahun_ajaran;
    public function __construct()
    {
        $this->sekolah = new SekolahModel();
        $this->tahun_ajaran = new TahunAjaranModel();
    }


    public function identitas()
    {
        $data = $this->sekolah->findAll();
        return $data;
    }

    public function tahun_ajaran()
    {
        $this->session = Services::session();

        $data = $this->tahun_ajaran->semester();
       if ($data !== null) {
            $this->session->setFlashdata('error', 'Data Tahun Ajaran Kosong');
        } else {
            $this->session->set('tahun_ajaran', $data[0]['nama']);
            return $data;
        }
    }

    public function ubah_sekolah()
    {
        $data = [
            'sekolah_nama' => $this->request->getVar('nama'),
            'sekolah_npsn' => $this->request->getVar('npsn'),
            'sekolah_alamat' => $this->request->getVar('alamat'),
            'sekolah_kodepos' => $this->request->getVar('kode_pos'),
            'sekolah_telepon' => $this->request->getVar('no_telp'),
            'sekolah_email' => $this->request->getVar('email'),
            'sekolah_website' => $this->request->getVar('website'),
            'sekolah_logo' => $this->request->getVar('logo'),
        ];
        if ($this->sekolah->update(1, $data)=== false){
            $errors = $this->sekolah->errors();
           // return redirect()->to('/data-sekolah');
            return redirect()->to('/admin/data-sekolah');
        }
        
    }
}
