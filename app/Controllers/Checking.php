<?php

namespace App\Controllers;

class Checking extends BaseController
{
    public function index()
    {   
        $data['activeMenu'] = 'checking';

        echo view('partial/header', $data);
        echo view('Checking_view', $data);
        echo view('partial/footer');
    }
}