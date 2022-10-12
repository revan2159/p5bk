<?php

namespace App\Controllers;



class User extends BaseController
{
    public function index()
    {
        $file = 'assets/guru_202210080740.json';
        $json = file_get_contents($file);
        $data = json_decode($json, true);
        $data = $data['guru'];

        $user = array();

        //insert data email and name
        $id = 3;
        foreach ($data as $key => $value) {
            $user[$key]['id'] = $id++;
            $user[$key]['email'] = $value['email'];
            $user[$key]['fullname'] = $value['nama'];
            $user[$key]['password_hash'] = password_hash('Kesrada123', PASSWORD_DEFAULT);
        }

        // dd($user);
        // //insert data to database
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->insertBatch($user);
    }
}
