<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSubmission extends Model
{
    protected $table = 'tpoheader'; // Replace with your actual table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['PoNo', 'PoNumber', 'PoDate', 'VendorNo', 'MataUang', 'NilaiDalamRp',];

    public function add($data)
    {
        return $this->insert($data);
    }
}
