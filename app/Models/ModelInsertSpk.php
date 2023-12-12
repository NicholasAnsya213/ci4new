<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInsertSpk extends Model {
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

    public function searchDetail($searchDkmNo) {
        $query = $this->db->table($this->tableDetail)
            ->select('*')
            ->like('DkmNo', $searchDkmNo)
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
        $latestPoNo = $this->db->table($this->tableHeader)
            ->select('PoNo')
            ->where('KodeDept', $KodeDept)
            ->like('PoNo', $currentYearMonth, 'after')
            ->orderBy('PoNo', 'DESC')
            ->get()
            ->getRow();
        
        if ($latestPoNo) {
            $latestNumber = intval(substr($latestPoNo->PoNo, -4)); // Extract the last 4 digits
            $uniqueIdentifier = $currentYearMonth . sprintf('%04d', $latestNumber + 1);
        } else {
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
        $PoNumber = $this->db->table($this->tableHeader)
            ->where('KodeDept', $KodeDept)
            ->where('YEAR(PoDate)', date('Y'))
            ->where('MONTH(PoDate)', date('m'))
            ->countAllResults();

        // Generate the four-digit identifier, left-padded with zeroes
        $uniqueIdentifier .= str_pad($PoNumber + 1, 4, '0', STR_PAD_LEFT);

        return $uniqueIdentifier;
    }

    public function generateUniqueDkmNo($KodeDept)
    {
        // Get the current year and month
        $currentYear = date('y');
        $currentMonth = date('m');
    
        // Build the base string (R.KodeDept/YY/MM/)
        $uniqueIdentifier = "WO.$KodeDept/$currentYear/$currentMonth/";
    
        // Check for the latest DkmNo with the same prefix
        $latestDkmNo = $this->db->table('tpodetail')
            ->select('DkmNo')
            ->like('DkmNo', $uniqueIdentifier, 'after')
            ->orderBy('DkmNo', 'DESC')
            ->get()
            ->getRow();
    
        if ($latestDkmNo) {
            // Extract the last 4 digits
            $latestNumber = intval(substr($latestDkmNo->DkmNo, -4));
            // Generate the four-digit identifier, left-padded with zeroes
            $uniqueIdentifier .= sprintf('%04d', $latestNumber + 1);
        } else {
            // If no previous DkmNo exists for this prefix, start with '0001'
            $uniqueIdentifier .= '0001';
        }
    
        return $uniqueIdentifier;
    }
    
    public function insertDataHeader($KodeDept, $data)
    {
        $uniquePoNo = $this->generateUniquePoNo($KodeDept);
        $uniquePoNumber = $this->generateUniquePoNumber($KodeDept);
    
        $data['KodeDept'] = $KodeDept;
        $data['PoDate'] = date('Y-m-d');
        $data['PoNo'] = $uniquePoNo;
        $data['PoNumber'] = $uniquePoNumber;
    
        // Insert into header table
        $this->db->table($this->tableHeader)->insert($data);
        $headerInsertedId = $this->db->insertID();
    
        // Return the unique values along with the insert IDs
        return [
            'insertedId' => $headerInsertedId,  // Add this line
            'PoNo' => $uniquePoNo,
            'PoNumber' => $uniquePoNumber,
        ];
    }

    public function insertDataDetail($KodeDept, $data)
    {
        $uniquePoNo = $this->generateUniquePoNo($KodeDept);
        $uniqueDkmNo = $this->generateUniqueDkmNo($KodeDept);
    
        $data['kodedept'] = $KodeDept;
        $data['PoNo'] = $uniquePoNo;
        $data['DkmNo'] = $uniqueDkmNo;
    
        // Insert into header table
        $this->db->table($this->tableDetail)->insert($data);
        $DetailInsertedId = $this->db->insertID();

        return [
            'insertedId' => $DetailInsertedId,  // Add this line
            'PoNo' => $uniquePoNo,
            'DkmNo' => $uniqueDkmNo,
        ];
    }
/*    public function add_data($Headerdata,$detaildata){

    
   if ( $this->db->insert('poheader', $Headerdata)) {
    
    foreach ($detaildata as dataitem){
            $this->db->insert('podetail', dataitem);   
        }
     }
  }

*/
}

