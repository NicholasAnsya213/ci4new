<?php

namespace App\Controllers;

class Form extends BaseController
{
    public function index()
    {   
        $data['activeMenu'] = "form";

        echo view('partial/header', $data);
        echo view('form_view', $data);
        echo view('partial/footer');
    }
}