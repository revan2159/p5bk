<?php

namespace App\Controllers;

class Guru extends BaseController
{
    protected $identitas;

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'nama' => user()->username,
            'active' => 'dashboard',
            'identitas' => $this->identitas[0],
        ];
        return view('fitur/dashboard', $data);
    }

    public function profil()
    {
        return view('guru/profil');
    }
}
