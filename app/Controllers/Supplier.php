<?php

namespace App\Controllers;

class Supplier extends BaseController
{
    public function index()
    {   
        $data['activeMenu'] = 'Supplier';

        $dataSupplier = new \App\Models\ModelSupplier();
        $data['dataSupplier'] = $dataSupplier->orderby('item_name')->findAll();
        echo view('partial/header', $data);
        echo view('goods_view', $data);
        echo view('partial/footer');
    }
}