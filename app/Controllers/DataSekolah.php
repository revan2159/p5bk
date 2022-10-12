<?php

namespace App\Controllers;

use Config\Services;
use App\Models\SekolahModel;
use App\Models\TahunAjaranModel;


class DataSekolah extends BaseController
{
    // protected $seassion;
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
        $data = $this->tahun_ajaran->select('tahun_ajaran_id, nama')->findAll();
        $session = Services::session();
        $session->set('tahun_ajaran', $data);
        return $data;
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
        if ($this->sekolah->update(1, $data) === false) {
            session()->setFlashdata('error', 'Data Sekolah Gagal Diubah');
            return redirect()->to(url_to('data-sekolah'));
        } else {
            session()->setFlashdata('pesan', 'Data Sekolah Berhasil Diubah');
            return redirect()->to(url_to('data-sekolah'));
        }
    }

    public function data_guru()
    {

        $filejson = file_get_contents('assets/guru_202210080740.json');
        $guru = json_decode($filejson, true);
        $guru = $guru['guru'];
        // $guru = $guru[0];
        // dd($guru);

        $data = [
            'title' => 'Data Guru',
            'active' => 'data-guru',
            'guru' => $guru
        ];
        return view('fitur/data-guru', $data);
    }
}
