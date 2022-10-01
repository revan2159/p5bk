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
                'nama' => $data_rencana,
                'deskripsi' => $deskripsi[$index], // Ambil dan set data nama sesuai index array dari $index
                'kelas_id' => $kelas_id[$index], // Ambil dan set data telepon sesuai index array dari $index
            ));

            $index++;
        }
        $isert = $this->db->table('rencana_budaya_kerja')->insertBatch($data);

        if ($isert) {
            echo "<script>alert('Data berhasil ditambahkan');window.location.href='admin/perencanaan';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan');window.location.href='admin/perencanaan';</script>";
        }
    }

    public function capaian()
    {

        $id = $this->request->uri->getSegment(3);
        $db  = $this->db;
        $builder = $db->table('elemen');
        $builder->select('elemen.id_elemen, elemen.nama_elemen, sub_elemen.id, sub_elemen.nama_sub_elemen, sub_elemen.capaian');
        $builder->join('sub_elemen', 'elemen.id_elemen = sub_elemen.elemen_id');
        $builder->where('elemen.dimensi_id', $id);
        $query = $builder->get()->getResult();


        $dimensi = $this->DimensiModel->getDimensi();

        $data = [
            'title' => 'Data Capaian',
            'active' => 'capaian',
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

        $index = 0;
        $data = array();


        // if (is_array($dimensi_id) || is_object($dimensi_id)) {
        //     if (is_array($project_id) || is_object($project_id)) {
        //         //loop 1 dimensi
        //         foreach ($dimensi_id as $dim) {
        //             //loop 2 project
        //             foreach ($project_id as $pro) {
        //                 $data[$index]['project_id'] = $pro;
        //                 $data[$index]['dimensi_id'] = $dim;
        //                 $index++;
        //             }
        //         }
        //     }
        // }

        for ($i = 0; $i < count($project_id); $i++) {
            for ($j = 0; $j < count($dimensi_id); $j++) {
                $data[$index]['rencana_id'] = $project_id[$i];
                $data[$index]['dimensi_id'] = $dimensi_id[$j];
                $index++;
            }
        }

        // //insert data
        $builder = $db->table('aspek_penilaian');
        $builder->insertBatch($data);
        if ($builder) {
            //auto redirect
            echo "<script>alert('Data berhasil ditambahkan');window.location.href='perencanaan';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan');window.location.href='perencanaan';</script>";
        }
    }
}
