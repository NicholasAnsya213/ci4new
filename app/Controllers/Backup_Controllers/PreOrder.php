<?php

namespace App\Controllers;

class PreOrder extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'PreOrder';

        $results = new \App\Models\ModelPreOrder();
        $data['results'] = $results
        ->WHERE('YEAR(PoDate)', 2023)
        ->WHERE('MataUang IS NOT NULL')
        ->findAll();
        echo view('partial/header', $data);
        echo view('preorder_view', $data);
        echo view('partial/footer');
    }
}