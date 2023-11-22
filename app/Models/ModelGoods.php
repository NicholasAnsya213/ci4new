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
                        ->limit(10) // Added limit to get only top 10 results
                        ->get()
                        ->getResult();

        return $query;
    }


}