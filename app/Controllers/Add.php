<?php

namespace App\Controllers;

use App\Models\ModelViewData;
use App\Models\ModelDataHeader;
use App\Models\ModelDataDetail;
use App\Models\ModelGoods;


class Add extends BaseController
{
    public function index()
{
    $vpoData = $this->VPO();
    $tpoheaderData = $this->tpoheader();
    $tpodetailData = $this->tpodetail();
    $tbarangData = $this->tbarang();

    $data = [
        'vpo' => $vpoData,
        'tpoheader' => $tpoheaderData,
        'tpodetail' => $tpodetailData,
        'tbarang' => $tbarangData,
        'activeMenu' => 'Add'

];

    echo view('partial/header', $data);
    echo view('add_view', $data);
    echo view('partial/footer', $data);
}


// Controller function to retrieve data for DataTable
    public function VPO()
    {
        $model = new ModelViewData();
        return $model->viewVPO();
    }

    public function tpodetail()
    {
        $model = new ModelDataDetail();
        return $model->viewDetail();
    }

    public function tpoheader()
    {
        $model = new ModelDataHeader();
        return $model->viewHeader();
    }

    public function tbarang()
    {
        $model = new ModelGoods();
        return $model->viewItems();
    }

    public function showInsertForm()
    {
        echo view('insert_form');
    }

    public function insertData($PoNo, $PoNumber, $kodedept, $data)
    {
        $ModelDataHeader = new ModelDataHeader();
        $modelDetail = new ModelDataDetail();

        $KodeDept = $this->request->getPost('KodeDept');
        $kodedept = $KodeDept;

        $headerData = [
            'KodeDept' => $kodedept,
            'PoDate' => $this->request->getPost('PoDate'),
            'VendorNo' => $this->request->getPost('VendorNo'),
            'ShipmentTerms' => $this->request->getPost('ShipmentTerms'),
            'ShipmentLoc' => $this->request->getPost('ShipmentLoc'),
            'PersonInCharge' => $this->request->getPost('PersonInCharge'),
            'TermsOfPayment' => $this->request->getPost('TermsOfPayment'),
            'MataUang' => $this->request->getPost('MataUang'),
            'Delivery' => $this->request->getPost('Delivery'),
            'OrderedBy' => $this->request->getPost('OrderedBy'),
            'CheckedBy' => $this->request->getPost('CheckedBy'),
            'FinanceBy' => $this->request->getPost('FinanceBy'),
            'ApprovedBy' => $this->request->getPost('ApprovedBy'),
            'KodeProd' => $this->request->getPost('KodeProd'),
        ];

        $detailData = [
            'PoNo' => $this->request->getPost('PoNo'),
            'DkmNo' => $this->request->getPost('DkmNo'),
            'Item_Code' => $this->request->getPost('Item_Code'),
            'Remarks' => $this->request->getPost('Remarks'),
            'PoQty' => $this->request->getPost('PoQty'),
            'PoUnit' => $this->request->getPost('PoUnit'),
            'PoUnitPrice' => $this->request->getPost('PoUnitPrice'),
            'Price' => $this->request->getPost('Price'),
            'SubTot' => $this->request->getPost('SubTot'),
            'UnitPriceADisc' => $this->request->getPost('UnitPriceADisc'),
            'Weight' => $this->request->getPost('Weight'),
            'kode_budget' => $this->request->getPost('kode_budget'),
            'FaktorPO' => $this->request->getPost('FaktorPO'),
            'kodedept' => $this->request->getPost('kodedept'),
            'Kategori' => $this->request->getPost('Kategori'),
            'standarharga' => $this->request->getPost('standarharga'),
            'hargamaster' => $this->request->getPost('hargamaster'),
            'Cek_berat' => $this->request->getPost('Cek_berat'),
            'B_update' => $this->request->getPost('B_update'),
            'L_update' => $this->request->getPost('L_update'),
        ];

        try {
            // Insert into header table
            $insertedHeaderId = $ModelDataHeader->insertHeader($KodeDept, $headerData);

            // Insert into detail table
            $insertedDetailId = $modelDetail->insertDetail($KodeDept, $detailData, $ModelDataHeader);


            // Additional logic can go here if needed

            echo "Data inserted with Header ID: " . $insertedHeaderId . " and Detail ID: " . $insertedDetailId;
        } catch (\Exception $e) {
            echo "Failed to insert data! Error: " . $e->getMessage();
        }

        $KodeDept = $this->request->getPost('KodeDept');
        $data = [
            'Item_Code' => $this->request->getPost('Item_Code'),
            ''
        ];
    
        $insertedData = $modelDetail->insertDetail($KodeDept, $data, $ModelDataHeader);
        
        if ($insertedData) {
            $data['activeMenu'] = 'Add';
            echo view('partial/header', $data);
            echo view('add_view', $data);
            echo view('partial/footer', $data);
            echo "Data inserted with ID: " . $insertedData['insertedId'];
        } else {
            echo "Failed to insert data!";
        }

    }


    
}