<?php

namespace App\Controllers;

use App\Models\ModelViewData;
use App\Models\ModelDataHeader;
use App\Models\ModelDataDetail;
use App\Models\ModelDataInsert;
use App\Models\ModelGoods;
use App\Models\ModelInsertSpk;

class Add_Spk extends BaseController
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
    echo view('/add_viewspk', $data);
    echo view('partial/footer', $data);
}

    public function NewWorkOrder()
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
        echo view('/work_orders/manage_spk', $data);
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

    public function insert_Data()
    {
        $model = new ModelInsertSpk();
        
        $detailResult = null;
    
        try {
            $KodeDept = $this->request->getPost('KodeDept');
    
            // Header data
            $headerData = [
                'KodeDept' => $KodeDept,
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
                'Y1' => $this->request->getPost('Y1'),
                'Y2' => $this->request->getPost('Y2'),
                'Y3' => $this->request->getPost('Y3'),
                'Y4' => $this->request->getPost('Y4'),
                'Y5' => $this->request->getPost('Y5'),
                'Y6' => $this->request->getPost('Y6'),
                'Y7' => $this->request->getPost('Y7'),
            ];

            $PoNo = $this->request->getPost('PoNo');
    
            $detailData = [
                'PoNo' => $PoNo,
                'DkmNo' => $this->request->getPost('PoNumber'),
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
                'KodeDept' => $KodeDept,
                'Kategori' => $this->request->getPost('Kategori'),
                'standarharga' => $this->request->getPost('standarharga'),
                'hargamaster' => $this->request->getPost('hargamaster'),
                'Cek_berat' => $this->request->getPost('Cek_berat'),
                'B_update' => $this->request->getPost('B_update'),
                'L_update' => $this->request->getPost('L_update'),
            ];
    
        // Insert into header table
        $headerResult = $model->insertDataHeader($KodeDept, $headerData);

       // If the header insertion is successful, proceed with the detail insertion
       if ($headerResult['insertedId']) {
        // Update the PoNo in detailData using the generated PoNo from the header
        $detailData['PoNo'] = $headerResult['PoNo'];
        $detailData['PoNumber'] = $headerResult['PoNumber'];

        // Insert into detail table
        $detailResult = $model->insertDataDetail($PoNo, $KodeDept, $detailData);

        // Additional logic can go here if needed

                echo "Data inserted with Header ID: " . $headerResult['insertedId'] . " and Detail ID: " . $detailResult['insertedId'];
            } else {
                echo "Failed to insert data!";
                // Check if $detailResult is set before trying to access its properties
                if (isset($detailResult)) {
                    echo " and Detail ID: " . $detailResult['insertedId']->getMessage();
                }
            }
        } catch (\Exception $e) {
            echo "Failed to insert data! Error: " . $e->getMessage();
        }
}

    public function insert_detail(){
        $model = new ModelInsertSpk();

        $KodeDept = $this->request->getPost('kodedept');
        $detailData = [
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
            'kodedept' => $KodeDept,
            'Kategori' => $this->request->getPost('Kategori'),
            'standarharga' => $this->request->getPost('standarharga'),
            'hargamaster' => $this->request->getPost('hargamaster'),
            'Cek_berat' => $this->request->getPost('Cek_berat'),
            'B_update' => $this->request->getPost('B_update'),
            'L_update' => $this->request->getPost('L_update'),
        ];

        $detailData = $model->insertDataDetail($KodeDept, $detailData);

    }

/*        public function Add()
        {
            $modelHeader = new ModelDataInsert();
            $modelDetail = new ModelDataInsert();
            
            $this->form_validation->set_rules('PoDate', $this->lang->line("PoDate"), 'required');

            
            if ($this->form_validation->run()==true){
            $pono ="";
            $ponumber = "";
                ///
                $i = sizeof($_POST[selectedItems]);
                
                    for ($r=0, $r<$i; $r++){
                            $itemcode = $_POST['selectedItems'][$r];


                    $detailData[] = array(
                            'Item_Code' => $itemcode,
                            'pono' => $pono,
                            'ponumber' => $ponumber
                                
                        
                            )                 
                        }
            }
            
            if ($this->form_validation->run()==true){
            $headerData = [
                    'pono' => $pono,
                    'ponumber' => $ponumber,
                    'KodeDept' => $KodeDept,
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
            }

            if ($this->form_validation->run() == true && $this->SPK_MODEL->add_data($headerData, $detailData)) {
                // menampilkan sukses
                // $this->session->set_userdata('remove_pols', 1);
                // $this->session->set_flashdata('message', $this->lang->line("spk add"));
                // redirect('');
                } else {
                    //menampilkan posisi inputan

                // redirect('krinputan semula kasih alert');
            }

        }
*/


    
}
