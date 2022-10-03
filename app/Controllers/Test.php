<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Test extends BaseController

{


    public function index()
    {
        $db = Database::connect();



        $data = [
            'title' => 'Set Aspek',

        ];


        return view('fitur/test', $data);
    }
}
