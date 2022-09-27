<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunAjaranModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_tahun_ajaran';
    protected $primaryKey       = 'tahun_ajaran_id';
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


    public function semester()
    {
        //one to many relationship semester_id and tahun_ajaran_id
        $builder = $this->db->table('tb_semester');
        $builder->select('tb_semester.semester_id, tb_semester.nama, tb_semester.tahun_ajaran_id, tb_tahun_ajaran.nama');
        $builder->join('tb_tahun_ajaran', 'tb_semester.tahun_ajaran_id = tb_tahun_ajaran.tahun_ajaran_id');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
