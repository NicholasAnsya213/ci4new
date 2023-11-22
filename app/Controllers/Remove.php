<?php

namespace App\Controllers;

class Remove extends BaseController
{
    public function index()
    {   
        $data['activeMenu'] = 'remove';

        echo view('partial/header', $data);
        echo view('remove_view', $data);
        echo view('partial/footer');
    }
}