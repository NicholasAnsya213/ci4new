<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelVpoDetail extends Model
{
    protected $table = 'vpo_test'; // Replace with your actual table name
    protected $allowedFields = ['PoNo', 'DkmNo', 'KodeDept', 'Item_Code', 'category', 'subcategory', 'PoQty', 'PoUnit', 'Price', 'SubTot', 'UnitPriceADisc', 'Item_Code'];

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
    }

    public function getData(){

        return $this->findAll();

    }

}