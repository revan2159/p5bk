<?php

namespace App\Models;


use CodeIgniter\Model;


class PenilaianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'nilai_p5bk';
    protected $primaryKey       = 'nilai_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'siswa_id',
        'rencana_id',
        'aspek_id',
        'elemen_id',
        'opsi_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getKelas()
    {
        $kelas =  new KelasModel();
        $kelas = $kelas->getAllkelas();
        $kelas = array_map(function ($kelas) {
            return [
                'kelas_id' => $kelas['kelas_id'],
                'kelas_nama' => $kelas['kelas_nama'],
            ];
        }, $kelas);
        return $kelas;
    }

    public function getPilihan($projek)
    {
        $db = \Config\Database::connect();
        $p1 = $db->table('tb_kelas');
        $p1->select('tb_kelas.kelas_id,tb_kelas.kelas_nama,rencana_budaya_kerja.nama,rencana_budaya_kerja.rencana_id ,aspek_penilaian.aspek_id');
        $p1->join('rencana_budaya_kerja', 'rencana_budaya_kerja.kelas_id = tb_kelas.kelas_id');
        $p1->join('aspek_penilaian', 'aspek_penilaian.rencana_id = rencana_budaya_kerja.rencana_id');
        $p1->where('rencana_budaya_kerja.rencana_id', $projek);
        $p1 = $p1->get()->getResultArray();
        $p1 = array_map(function ($p1) {
            return [
                'kelas_id' => $p1['kelas_id'],
                'nama_kelas' => $p1['kelas_nama'],
                'nama_projek' => $p1['nama'],
                'projek_id' => $p1['rencana_id'],
                'aspek_id' => $p1['aspek_id'],
            ];
        }, $p1);
        //if array is empty, find kelas_nama where $projek
        if (empty($p1)) {
            $p1 = $db->table('tb_kelas');
            $p1->select('tb_kelas.kelas_id,tb_kelas.kelas_nama,rencana_budaya_kerja.nama,rencana_budaya_kerja.rencana_id');
            $p1->join('rencana_budaya_kerja', 'rencana_budaya_kerja.kelas_id = tb_kelas.kelas_id');
            $p1->where('rencana_budaya_kerja.rencana_id', $projek);
            $p1 = $p1->get()->getResultArray();
            $p1 = array_map(function ($p1) {
                return [
                    'kelas_id' => $p1['kelas_id'],
                    'nama_kelas' => $p1['kelas_nama'],
                    'nama_projek' => $p1['nama'],
                    'projek_id' => $p1['rencana_id'],
                    'aspek_id' => null,
                ];
            }, $p1);
        }
        if (empty($p1)) {
            return false;
        } else {
            return $p1[0];
        }
    }

    public function getProjek($kelas)
    {
        $db = \Config\Database::connect();
        $p1 = $db->table('rencana_budaya_kerja');
        $p1->select('rencana_budaya_kerja.rencana_id,rencana_budaya_kerja.nama,tb_kelas.kelas_nama');
        $p1->join('tb_kelas', 'tb_kelas.kelas_id = rencana_budaya_kerja.kelas_id');
        $p1->where('rencana_budaya_kerja.kelas_id', $kelas);
        $p1 = $p1->get()->getResultArray();
        $p1 = array_map(function ($p1) {
            return [
                'rencana_id' => $p1['rencana_id'],
                'nama' => $p1['nama'],
                'kelas_nama' => $p1['kelas_nama'],
            ];
        }, $p1);
        return $p1;
    }

    public function getAspek($projek)
    {
        $db = \Config\Database::connect();
        $p1 = $db->table('aspek_penilaian');
        $p1->select('aspek_penilaian.dimensi_id,aspek_penilaian.aspek_id,aspek_penilaian.rencana_id,dimensi.nama_dimensi');
        $p1->join('dimensi', 'dimensi.id_dimensi = aspek_penilaian.dimensi_id');
        $p1->where('rencana_id', $projek);
        $p1 = $p1->get()->getResultArray();
        $p1 = array_map(function ($p1) {
            return [
                'dimensi_id' => $p1['dimensi_id'],
                'aspek_id' => $p1['aspek_id'],
                'nama_dimensi' => $p1['nama_dimensi'],
            ];
        }, $p1);
        return $p1;
    }

    public function getSiswa($projek)
    {
        $db = \Config\Database::connect();
        $p4 = $db->table('tb_siswa');
        //get siswa by siswa_kelas from rencana_budaya_kerja where rencana_id = $projek
        $p4->select('tb_siswa.siswa_id,tb_siswa.siswa_nama');
        $p4->join('rencana_budaya_kerja', 'rencana_budaya_kerja.kelas_id = tb_siswa.siswa_kelas');
        //kelas nama 

        $p4->where('rencana_id', $projek);
        //data siswa 
        $siswa = $p4->get()->getResultArray();
        $siswa = array_map(function ($siswa) {
            return [
                'siswa_id' => $siswa['siswa_id'],
                'siswa_nama' => $siswa['siswa_nama'],
            ];
        }, $siswa);
        return $siswa;
    }

    public function getElemen($projek)
    {
        $db = \Config\Database::connect();
        $p2 = $db->table('elemen');
        $p2->select('elemen.id_elemen,elemen.nama_elemen,elemen.dimensi_id,dimensi.nama_dimensi');
        $p2->join('aspek_penilaian', 'aspek_penilaian.dimensi_id = elemen.dimensi_id');
        $p2->join('dimensi', 'dimensi.id_dimensi = elemen.dimensi_id');
        $p2->where('aspek_penilaian.rencana_id', $projek);
        $p2->where('rencana_id', $projek);
        //data elemen
        $ka2 = $p2->get()->getResultArray();
        $ka2 = array_map(function ($ka2) {
            return [
                'id_elemen' => $ka2['id_elemen'],
                'nama_elemen' => $ka2['nama_elemen'],
                'dimensi_id' => $ka2['dimensi_id'],
                'nama_dimensi' => $ka2['nama_dimensi'],
            ];
        }, $ka2);
        return $ka2;
    }
}
