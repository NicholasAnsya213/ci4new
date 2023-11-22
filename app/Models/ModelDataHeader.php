<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataHeader extends Model {
    protected $tableHeader = 'tpoheader'; // Replace with your actual table name

    protected $primaryKeyHeader = 'PK_tpoheader';

    protected $tableDetail = 'tpodetail'; // Replace with your actual table name
    protected $primaryKeyDetail = 'PK_tpodetail';

    
    public function viewHeader() {
        $currentMonth = date('m');
        $currentYear = date('Y');

        $query = $this->db->table($this->tableHeader)
            ->where("MONTH(PoDate)", $currentMonth)
            ->where("YEAR(PoDate)", $currentYear)
            ->get()
            ->getResult();
        return $query;
    }

    public function viewDetail() {
        $query = $this->db->table($this->tableDetail)
            ->select('distinct(PoNo)')
            ->orderBy('PoNo', 'DESC')
            ->get()
            ->getResult();

        return $query;
    }

    public function generateUniquePoNo($KodeDept) {
        // Get the current year and month
        $currentYear = date('y');
        $currentMonth = date('m');
        $currentYearMonth = $currentYear . $currentMonth; // Combining year and month

        // Query the database for the latest PoNo for the specific department in the same year and month
        $latestPoNo = $this->where('KodeDept', $KodeDept)
                           ->where('PoNo LIKE', $currentYearMonth . '%')
                           ->orderBy('PoNo', 'DESC')
                           ->first();

        // If there are previous PoNos for the department in the same year and month
        if ($latestPoNo) {
            $latestNumber = intval(substr($latestPoNo['PoNo'], -4)); // Extract the last 4 digits
            $uniqueIdentifier = $currentYearMonth . sprintf('%04d', $latestNumber + 1);
        } else {
            // If no previous PoNo exists for this department in the same year and month, start with '0001'
            $uniqueIdentifier = $currentYearMonth . '0001';
        }

        return $uniqueIdentifier;
    }

    public function generateUniquePoNumber($KodeDept)
    {
        // Get the current year and month
        $currentYear = date('y');
        $currentMonth = date('m');

        // Build the base string (P.KodeDept/YY/MM/)
        $uniqueIdentifier = "P.$KodeDept/$currentYear/$currentMonth/";

        // Get the count of entries for the department on the same date
        $PoNumber = $this->where('KodeDept', $KodeDept)
            ->where('YEAR(PoDate)', date('Y'))
            ->where('MONTH(PoDate)', date('m'))
            ->countAllResults();

        // Generate the four-digit identifier, left-padded with zeroes
        $uniqueIdentifier .= str_pad($PoNumber + 1, 4, '0', STR_PAD_LEFT);

        return $uniqueIdentifier;
    }

    public function insertHeader($KodeDept, $data)
    {
        $uniquePoNo = $this->generateUniquePoNo($KodeDept);
        $uniquePoNumber = $this->generateUniquePoNumber($KodeDept);
        $data['PoDate'] = date('Y-m-d');
        $data['PoNo'] = $uniquePoNo;
        $data['PoNumber'] = $uniquePoNumber;

        $this->db->table($this->tableHeader)->insert($data);
        $insertedId = $this->db->insertID();

        $uniquePoNumber =  $data['DkmNo'];
        unset($data['PoDate']);


        $this->db->table($this->tableDetail)->insert($data);
        $insertedId = $this->db->insertID();

        // Return the unique values along with the insert ID
        return ['insertedId' => $insertedId, 'PoNo' => $uniquePoNo, 'PoNumber' => $uniquePoNumber];

        
    }


}

