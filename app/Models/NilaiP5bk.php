<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiP5bk extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'nilai_p5bk';
    protected $primaryKey       = 'nilai_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function get_nilai_budaya_kerja()
    {
        $db = \Config\Database::connect();
        $nilai = $db->table('nilai_p5bk');
        $nilai = $nilai->get()->getResultArray();
        return $nilai;
    }

    public function getAllNilai()
    {
        $db = \Config\Database::connect();
        $nilai = $db->table('tb_siswa');
        $nilai->select('tb_siswa.siswa_nama,tb_siswa.siswa_id');
        $nilai->join('nilai_p5bk', 'nilai_p5bk.siswa_id = tb_siswa.siswa_id');
        $nilai->groupBy('tb_siswa.siswa_id');

        return $nilai->get()->getResultArray();
    }
}
