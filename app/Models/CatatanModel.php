<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'catatan';
    protected $primaryKey       = 'id_catatan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'siswa_id',
        'catatan'
        
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

    public function getCatatanbysiswa()
    {
        $db = \Config\Database::connect();
        $catatan = $db->table('catatan');
        $catatan = $catatan->select('catatan.*, tb_siswa.siswa_id');
        $catatan = $catatan->join('tb_siswa', 'tb_siswa.siswa_id = catatan.siswa_id');

        $catatan = $catatan->get()->getResultArray();

        return $catatan;
    }
    public function getCatatanbyidsiswa($id)
    {
        $db = \Config\Database::connect();
        $catatan = $db->table('catatan');
        $catatan = $catatan->select('catatan.*, tb_siswa.siswa_id');
        $catatan = $catatan->join('tb_siswa', 'tb_siswa.siswa_id = catatan.siswa_id');
        $catatan = $catatan->where('catatan.siswa_id', $id);
        $catatan = $catatan->get()->getResultArray();
        //if data not found
        if (empty($catatan)) {
            return false;
        }
        return $catatan;
    }


}
