<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelViewData extends Model {
    protected $tableTpoHeader = 'tpoheader';
    protected $tableTpoDetail = 'tpodetail';
    // Add other table names as needed

    public function viewVPO() {
        $db = db_connect();
        $sql = "SELECT *,
        STUFF((SELECT CHAR(13) + CHAR(10) + item_name + ' ' + ' ('+ Item_Code +') '
            FROM vpodetail p2
            WHERE p1.DkmNo = p2.DkmNo
            FOR XML PATH('')), 1, 2, '') AS ITEM,
        STUFF((SELECT CHAR(13) + CHAR(10) + category + ' ' + JenisItem
            FROM vpodetail p2
            WHERE p1.DkmNo = p2.DkmNo
            FOR XML PATH('')), 1, 2, '') AS ITEM2,
        STUFF((SELECT CHAR(13) + CHAR(10) + vendorname + ' ' + ' ('+ vendorcode +') '
            FROM vpodetail p2
            WHERE p1.DkmNo = p2.DkmNo
            FOR XML PATH('')), 1, 2, '') AS ITEM3,
        STUFF((SELECT CHAR(13) + CHAR(10) + CAST(PoQty AS VARCHAR) + ' ' + CAST(PoUnit AS VARCHAR) + ' ' + '*' + ' ' + CAST(PoUnitPrice AS VARCHAR)
            FROM vpodetail p2
            WHERE p1.DkmNo = p2.DkmNo
            FOR XML PATH('')), 1, 2, '') AS ITEM4,
        STUFF((SELECT CHAR(13) + CHAR(10) + MataUang + ' ' + CAST(SubTot AS VARCHAR)
            FROM vpodetail p2
            WHERE p1.DkmNo = p2.DkmNo
            FOR XML PATH('')), 1, 2, '') AS ITEM5
        FROM vpodetail p1
        WHERE PoDate >= DATEADD(MONTH, -4, getdate())
        ORDER BY PoDate DESC;";

        $qry = $db->query($sql);
        $result = $qry->getResult();

        // Manipulate the concatenated strings
        foreach ($result as $row) {
            $row->ITEM = str_replace('&#x0D;', '', $row->ITEM);
            $row->ITEM = str_replace('x0D;', '', $row->ITEM);
            $row->ITEM = nl2br($row->ITEM);

            $row->ITEM2 = str_replace('&#x0D;', '', $row->ITEM2);
            $row->ITEM2 = str_replace('x0D;', '', $row->ITEM2);
            $row->ITEM2 = nl2br($row->ITEM2);

            $row->ITEM3 = str_replace('&#x0D;', '', $row->ITEM3);
            $row->ITEM3 = str_replace('x0D;', '', $row->ITEM3);
            $row->ITEM3 = nl2br($row->ITEM3);

            $row->ITEM4 = str_replace('&#x0D;', '', $row->ITEM4);
            $row->ITEM4 = str_replace('x0D;', '', $row->ITEM4);
            $row->ITEM4 = nl2br($row->ITEM4);

            $row->ITEM5 = str_replace('&#x0D;', '', $row->ITEM5);
            $row->ITEM5 = str_replace('x0D;', '', $row->ITEM5);
            $row->ITEM5 = nl2br($row->ITEM5);
        }

        return $result;
    }

    public function viewDetail() {
        $query = $this->db->table($this->tableTpoDetail)
            ->where('PoNo >=', '23010000')
            ->where('PoNo <=', '23109999')
            ->get()
            ->getResult();
        return $query;
    }

    public function viewHeader() {
        $currentMonth = date('m');
        $currentYear = date('Y');

        $query = $this->db->table($this->tableTpoHeader)
            ->where("MONTH(PoDate)", $currentMonth)
            ->where("YEAR(PoDate)", $currentYear)
            ->get()
            ->getResult();
        return $query;
    }

    public function generateUniquePoNo($KodeDept) {
        $currentYearMonth = date('ym');

        $latestPoNo = $this->where('KodeDept', $KodeDept)
            ->where('PoNo LIKE', $currentYearMonth . '%')
            ->orderBy('PoNo', 'DESC')
            ->first();

        if ($latestPoNo) {
            $latestNumber = intval(substr($latestPoNo['PoNo'], -4));
            $uniqueIdentifier = $currentYearMonth . sprintf('%04d', $latestNumber + 1);
        } else {
            $uniqueIdentifier = $currentYearMonth . '0001';
        }
        return $uniqueIdentifier;
    }

    public function insertHeader($KodeDept, $data)
    {
        $uniquePoNo = $this->generateUniquePoNo($KodeDept);
        $data['PoDate'] = date('Y-m-d');
        $data['PoNo'] = $uniquePoNo;

        $this->db->table($this->tableTpoHeader)->insert($data);
        return $this->db->insertID();
    }
}

