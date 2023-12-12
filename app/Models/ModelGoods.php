<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGoods extends Model
{
    protected $table = "tbarang";
    protected $primaryKey = 'PK_tbarang';
    protected $allowedFields = ['item_code', 'item_name', 'category', 'subcategory', 'price', 'unit'];
    public function viewItems()
    {
        $query = $this->db->table($this->table)
                        ->limit(100)
                        ->get()
                        ->getResult();

        return $query;
    }


}