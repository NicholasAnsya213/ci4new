<?php

namespace App\Controllers;

use App\Models\ModelAddDetail;

class searchData extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'Add';
        $ModelAddDetail = new ModelAddDetail();
        $data['tpodetail'] = $ModelAddDetail
            ->where('PoNo >=', '23080000')
            ->where('PoNo <=', '23089999')
            ->orderBy('PoNo', 'Desc')
            ->findall();
        echo view('partial/header', $data);
        echo view('add_view', $data);
        echo view('partial/footer');
    }
        
    public function getDatalist()
    {   
        $data['activeMenu'] = 'Add';
        $ModelAddDetail = new ModelAddDetail();
        $data['tpodetail'] = $ModelAddDetail->getData();
        return view('add_view', $data); // Load the view for DataTables
    }
    
}
    