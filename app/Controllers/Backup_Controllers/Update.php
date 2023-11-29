<?php

namespace App\Controllers;

class Update extends BaseController
{
    public function index()
    {   
        $data['activeMenu'] = 'update';

        echo view('partial/header', $data);
        echo view('update_view', $data);
        echo view('partial/footer');
    }
}