<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Aspek extends BaseController
{
    public function index()
    {

        




        $data = [
            'title' => 'Aspek Penilaian',
            'active' => 'aspek',
        ];
        return view('fitur/set_aspek', $data);
    }
}
