<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataDetail extends Model {
    protected $table = 'tpodetail'; // Replace with your actual table name
    protected $primaryKey = 'PK_tpodetail';

    public function viewDetail() {
        $query = $this->db->table($this->table)
            ->select('distinct(PoNo)')
            ->orderBy('PoNo', 'DESC')
            ->get()
            ->getResult();

        return $query;
    }


}