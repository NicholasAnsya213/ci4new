<?php

namespace App\Controllers;

use App\Models\ModelSubmission;

class Submission extends BaseController
{

	public function index()
    {
        $data['activeMenu'] = 'Submission';

		$results = new \App\Models\ModelSubmission();
		$data['tpoheader'] = $results
			->where('MONTH(PoDate)', date('n'))
			->where('YEAR(PoDate)', date('Y'))
			->orderBy('PoNo', 'Desc')
			->findAll();

		echo view('partial/header', $data);
		echo view('submission_view', $data);
		echo view('partial/footer');

    }


	public function add() {
		echo view('add');
	}

	public function save() {
		$PoNumber	= $this->request->getPost('PoNumber');
		$PoDate 	= $this->request->getPost('PoDate');
		$VendorNo	= $this->request->getPost('VendorNo');
        $MataUang	= $this->request->getPost('MataUang');
        $NilaiDalamRp	= $this->request->getPost('NilaiDalamRp');
        
		$data = [
			'PoDate'		=> $PoDate,
			'VendorNo'      => $VendorNo,
            'MataUang'      => $NilaiDalamRp,
 		];

		$result = $this->ModelSubmission->add($data);
		if($result) {
			echo "Data Inserted.";
		} else {
			echo "Something went wrong";
		}
	}


}

