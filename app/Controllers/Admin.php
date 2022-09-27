<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/index');
    }

    public function profil()
    {
        return view('admin/profil');
    }

}
