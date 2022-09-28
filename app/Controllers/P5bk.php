<?php

namespace App\Controllers;

use Config\Database;
use App\Models\DimensiModel;
use App\Controllers\BaseController;

class P5bk extends BaseController
{
    // protected $DimensiModel;
    public function __construct()
    {
        $this->DimensiModel = new DimensiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Peroyek',
            'active' => 'perencanaan',
            'content' => 'fitur/p5bk',
            'footer' => 'P5BK',
        ];
        return view('fitur/perencanaan', $data);
    }

    public function capaian()
    {


        // $builder = $db->table('dimensi');
        // $builder->select('dimensi.id_dimensi, dimensi.nama_dimensi, elemen.id_elemen, elemen.nama_elemen, sub_elemen.id, sub_elemen.nama_sub_elemen, sub_elemen.capaian');
        // $builder->join('elemen', 'dimensi.id_dimensi = elemen.dimensi_id');
        // $builder->join('sub_elemen', 'elemen.id_elemen = sub_elemen.elemen_id');
        // $query = $builder->get()->getResultArray();

        // $dimensi = $db->table('dimensi')->get('nama_dimensi')->getResultArray();

        //$p5bk = $this->DimensiModel->getElemen(1);
        //coverd $dimensi to object
        //$dimensis = json_decode(json_encode($dimensi), FALSE);
        //select dimensi
        //get input from segment 3
        $id = $this->request->uri->getSegment(3);
        $db = Database::connect();
        $builder = $db->table('elemen');
        $builder->select('elemen.id_elemen, elemen.nama_elemen, sub_elemen.id, sub_elemen.nama_sub_elemen, sub_elemen.capaian');
        $builder->join('sub_elemen', 'elemen.id_elemen = sub_elemen.elemen_id');
        $builder->where('elemen.dimensi_id', $id);
        $query = $builder->get()->getResult();


        // $p5bk = $this->DimensiModel->getElemen();

        $dimensi = $this->DimensiModel->getDimensi();

        $data = [
            'title' => 'Data Capaian',
            'active' => 'capaian',
            'p5bk' => $query,
            'dimensi' => $dimensi,
        ];
        return view('fitur/capaian', $data);
    }

    // public function detaildimensi()
    // {
    //     $id = $this->request->uri->getSegment(3);
    //     $dimensi = $this->DimensiModel->getElemen($id);
    //     $data = [
    //         'title' => 'Data Capaian',
    //         'active' => 'capaian',
    //         'p5bk' => $dimensi,
    //     ];
    //     return view('fitur/capaian', $data);
    // }
}
