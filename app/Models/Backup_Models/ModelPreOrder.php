<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelPreOrder extends Model
{
    protected $table = "vspk_test";

    public function getData(){

        return $this->findAll();

    }

}