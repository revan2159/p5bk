<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_sekolah';
    protected $primaryKey       = 'sekolah_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sekolah_nama',
        'sekolah_npsn',
        'sekolah_alamat',
        'sekolah_kodepos',
        'sekolah_telepon',
        'sekolah_email',
        'sekolah_website',
        'sekolah_logo',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'sekolah_created_at';
    protected $updatedField  = 'sekolah_updated_at';
    //protected $deletedField  = 'deleted_at';


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

    public function getsekolah()
    {
        $sekolah = $this->db->table('tb_sekolah');
        $sekolah = $sekolah->select('tb_sekolah.*');
        $sekolah = $sekolah->get()->getRowArray();
        return $sekolah;
    }
}
