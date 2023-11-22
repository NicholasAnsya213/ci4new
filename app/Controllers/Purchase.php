<?php

namespace App\Controllers;

class Purchase extends BaseController
{
    public function index()
    {   
        $data['activeMenu'] = 'checking';

        echo view('partial/header', $data);
        echo view('purchase_view', $data);
        echo view('partial/footer');
    }
}