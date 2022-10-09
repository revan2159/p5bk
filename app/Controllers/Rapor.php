<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Rapor extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        $siswa_id = 1;
        //get data project 
        $k1 = $db->table('rencana_budaya_kerja');

        return view('fitur/cetak');
    }
}
