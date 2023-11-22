<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = "dashboard";

        echo view('partial/header', $data);
        echo view('dashboard_view', $data);
        echo view('partial/footer');
    }
}
