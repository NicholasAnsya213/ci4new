<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAddDetail extends Model
{
    protected $table = 'tpodetail'; // Replace with your actual table name
    protected $primaryKey = 'PK_tpodetail';
    protected $foreignKey = 'FK_tpodetail_tpoheader';
    protected $allowedFields = ['PoNo', 'KodeDept','DkmNo', 'Item_Code'];

    public function __construct() {
        parent::__construct();
    }

    public function getData(){

        return $this->findAll();

    }

    public function add($data)
    {
    if($this->db->table($this->table)->insert($data)){
        return $this->insert($data);
    }
    else{
        return false;
    }
    }
    

    public function generateUniquePoNo($KodeDept)
    {
    // Get the current date and time
    $currentYearMonth = date('ym');

    // Find the latest PoNo with the same division code and year-month
    $latestPoNo = $this->where('KodeDept', $KodeDept)
                        ->where('PoNo LIKE', $currentYearMonth . '%')
                        ->orderBy('PoNo', 'DESC')
                        ->first();

    // Extract the numeric part of the latest PoNo and increment it
    if ($latestPoNo) {
        $latestNumber = intval(substr($latestPoNo['PoNo'], -4));
        $uniqueIdentifier = $currentYearMonth . sprintf('%04d', $latestNumber + 1);
    } else {
        // If no previous PoNo exists for this division and year-month, start with 0001
        $uniqueIdentifier = $currentYearMonth . '0001';
    }


    return $uniqueIdentifier;
}



    // public function generateUniquePoNumber($KodeDept)
    // {
    //     // Get the current date (Year and Month)
    //     $currentYear = date('y');
    //     $currentMonth = date('m');

    //     // Find the latest PoNumber with the same division code and year-month
    //     $latestPoNumber = $this->where('KodeDept', $KodeDept)
    //                             ->where('PoNo LIKE', 'P.' . $KodeDept . '/' . $currentYear . '/' . $currentMonth . '/%')
    //                             ->orderBy('PoNo', 'DESC')
    //                             ->first();

    //     // Extract the numeric part of the latest PoNumber and increment it
    //     if ($latestPoNumber) {
    //         $latestNumber = intval(substr($latestPoNumber['PoNo'], -4));
    //         $uniqueIdentifier = 'P.' . $KodeDept . '/' . $currentYear . '/' . $currentMonth . '/' . sprintf('%04d', $latestNumber + 1);
    //     } else {
    //         // If no previous PoNumber exists for this division and year-month, start with 0001
    //         $uniqueIdentifier = 'P.' . $KodeDept . '/' . $currentYear . '/' . $currentMonth . '/' .'0001';
    //     }

    //     // Debugging: Output the generated PoNumber to the screen
    //     echo 'Generated PoNumber: ' . $uniqueIdentifier;

    //     return $uniqueIdentifier;
    // }



}

