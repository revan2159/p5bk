<?php

namespace App\Controllers;



class User extends BaseController
{
    public function index()
    {
        $pdf = $this->mpdf;
        $pdf->WriteHTML('<h1>Hello world!</h1>');
        return $pdf->Output();
    }
}
