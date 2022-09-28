<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class DimensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dimensi';
    protected $primaryKey       = 'id_dimensi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
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

    public function getDimensi()
    {
        $db = Database::connect();
        $kueri = $db->query("SELECT * FROM dimensi");
        return $kueri->getResult();
    }

    //find elemen and sub elemen by dimensi id
    // public function getElemen($id = 0)
    // {
    //     $db = Database::connect();
    //     $builder = $db->table('elemen');
    //     $builder->select('elemen.id_elemen, elemen.nama_elemen, sub_elemen.id, sub_elemen.nama_sub_elemen, sub_elemen.capaian');
    //     $builder->join('sub_elemen', 'elemen.id_elemen = sub_elemen.elemen_id');
    //     $builder->where('elemen.dimensi_id', $id);
    //     $query = $builder->get()->getResultArray();
    //     return $query;
    // }
}
