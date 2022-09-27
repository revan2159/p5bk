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
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'sekolah_created_at';
    protected $updatedField  = 'sekolah_updated_at';
    //protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'sekolah_npsn' => 'required|is_unique[tb_sekolah.sekolah_npsn]',
        'sekolah_nama' => 'required|is_unique[tb_sekolah.sekolah_nama]',
        'sekolah_alamat' => 'required',
        'sekolah_kodepos' => 'required',
        'sekolah_telepon' => 'required',
        'sekolah_email' => 'required|valid_email',
        'sekolah_website' => 'required',
    ];
    protected $validationMessages   = [
        'sekolah_npsn' => [
            'required' => 'NPSN tidak boleh kosong',
            'is_unique' => 'NPSN sudah terdaftar',
        ],
        'sekolah_nama' => [
            'required' => 'Nama Sekolah tidak boleh kosong',
            'is_unique' => 'Nama Sekolah sudah terdaftar',
        ],
        'sekolah_alamat' => [
            'required' => 'Alamat tidak boleh kosong',
        ],
        'sekolah_kodepos' => [
            'required' => 'Kode Pos tidak boleh kosong',
        ],
        'sekolah_telepon' => [
            'required' => 'Telepon tidak boleh kosong',
        ],
        'sekolah_email' => [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Email tidak valid',
        ],
        'sekolah_website' => [
            'required' => 'Website tidak boleh kosong',
        ],
    ];
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
}
