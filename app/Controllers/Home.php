<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (in_groups('guru')) {
            return redirect()->to('/guru/dashboard');
        } else if (in_groups('admin')) {
            return redirect()->to('/admin/dashboard');
        } else {
            return view('auth/login');
        }
    }

}
