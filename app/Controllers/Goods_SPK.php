<?php

namespace App\Controllers;

use App\Models\ModelGoods;
use App\Models\ModelAdd;

class Goods_SPK extends BaseController
{
    public function index()
    {   
        $data['activeMenu'] = 'Goods';

        $results = new \App\Models\ModelGoods();
        $data['results'] = $results
        ->WHERE('category =', 'JASA')
        ->findAll();
        echo view('partial/header', $data);
        echo view('goods_viewSPK', $data);
        echo view('partial/footer');
    }
    public function performSearch()
    {

        helper('form');

        // Retrieve the search input from the form
        $searchInput = $this->request->getPost('search_input');

        // Load the model and query the database with the search input
        $model = new ModelGoods(); // Replace with your actual model
        $result = $model->search($searchInput); // Implement the search method in your model

        // Pass the search results to the view
        $data['result'] = $result;

        // Load the view with the search results
        return view('add_view', $data);
    }
}