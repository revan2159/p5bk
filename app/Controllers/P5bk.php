<?php

namespace App\Controllers;

use Config\Database;
use App\Models\KelasModel;
use App\Models\DimensiModel;
use App\Controllers\BaseController;

class P5bk extends BaseController
{
    // protected $DimensiModel;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->DimensiModel = new DimensiModel();
        $this->KelasModel = new KelasModel();
    }
    public function index()
    {

        $db  = $this->db;
        $builder = $db->table('rencana_budaya_kerja');
        $builder->join('tb_kelas', 'tb_kelas.kelas_id = rencana_budaya_kerja.kelas_id');
        $builder->join('aspek_penilaian', 'aspek_penilaian.rencana_id = rencana_budaya_kerja.rencana_id');
        $builder->select('rencana_budaya_kerja.rencana_id,rencana_budaya_kerja.nama, rencana_budaya_kerja.deskripsi,');
        $builder->select('tb_kelas.kelas_id,tb_kelas.kelas_nama');
        $builder->select('COUNT(aspek_penilaian.dimensi_id) as dimensi');
        $builder = $builder->groupBy('rencana_budaya_kerja.rencana_id');
        $query = $builder->get()->getResultarray();

        $get_kelas = $this->KelasModel->findAll();

        $project = $db->table('rencana_budaya_kerja');
        $project = $project->get()->getResultArray();

        $dimensi = $this->DimensiModel->getDimensi();

        $data = [
            'title' => 'Data Peroyek',
            'active' => 'perencanaan',
            'proyek' => $query,
            'kelas' => $get_kelas,
            'project' => $project,
            'dimensi' => $dimensi,

        ];
        return view('fitur/perencanaan', $data);
    }


    public function tambah_rencana()
    {
        $rencana_nama = $this->request->getVar('rencana_nama');
        $deskripsi = $this->request->getVar('deskripsi');
        $kelas_id = $this->request->getVar('kelas_id');

        $data = array();
        $index = 0; // Set index array awal dengan 0
        foreach ($rencana_nama as $data_rencana) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'kelas_id' => $kelas_id[$index], // Ambil dan set data telepon sesuai index array dari $index
                'nama' => $data_rencana,
                'deskripsi' => $deskripsi[$index], // Ambil dan set data nama sesuai index array dari $index
            ));
            $index++;
        }
        //if data array 'kelas_id', 'nama', 'deskripsi' is empty unsert data
        $filter = array_filter($data, function ($value) {
            return $value['kelas_id'] != '' && $value['nama'] != '' && $value['deskripsi'] != '';
        });


        // $filter = array_filter($data);
        $isert = $this->db->table('rencana_budaya_kerja')->insertBatch($filter);
        if ($isert) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(url_to('admin-perencanaan'));
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->to('/p5bk');
        }
    }

    public function hapus_rencana($id)
    {
        $hapus = $this->db->table('rencana_budaya_kerja')->delete(['rencana_id' => $id]);
        if ($hapus) {
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to(url_to('admin-perencanaan'));
        } else {
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->to(url_to('admin-perencanaan'));
        }
    }

    public function capaian()
    {

        $id = $this->request->uri->getSegment(2);
        $db  = $this->db;
        $builder = $db->table('elemen');
        $builder->select('elemen.id_elemen, elemen.nama_elemen, sub_elemen.id, sub_elemen.nama_sub_elemen, sub_elemen.capaian');
        $builder->join('sub_elemen', 'elemen.id_elemen = sub_elemen.elemen_id');
        $builder->where('elemen.dimensi_id', $id);
        $query = $builder->get()->getResult();


        $dimensi = $this->DimensiModel->getDimensi();

        $data = [
            'title' => 'Data Capaian',
            'active' => 'data_p5bk',
            'p5bk' => $query,
            'dimensi' => $dimensi,
        ];
        return view('fitur/capaian', $data);
    }

    public function simpan_aspek()
    {
        $db  = $this->db;
        $project_id = $this->request->getVar('project_id');
        $dimensi_id = $this->request->getVar('dimensi_id');


        //if $dimensi_id is null
        if ($dimensi_id == null) {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->to(url_to('admin-perencanaan'));
        }


        $index = 0;
        $data = array();

        for ($i = 0; $i < count($project_id); $i++) {
            if ($dimensi_id == null) {
                session()->setFlashdata('error', 'Data gagal ditambahkan');
                return redirect()->to(url_to('admin-perencanaan'));
            } else {
                for ($j = 0; $j < count($dimensi_id); $j++) {
                    $data[$index]['rencana_id'] = $project_id[$i];
                    $data[$index]['dimensi_id'] = $dimensi_id[$j];
                    $index++;
                }
            }
        }

        // //insert data
        $builder = $db->table('aspek_penilaian');
        $builder->insertBatch($data);
        if ($builder) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(url_to('admin-perencanaan'));
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan');
            return redirect()->to(url_to('admin-perencanaan'));
        }
    }
}
