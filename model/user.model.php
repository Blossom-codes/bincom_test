<?php

class User_model extends Install_model
{
    protected function getData($table, $where, $param, $extra_cmd = "")
    {
        $sql = "SELECT * FROM $table WHERE $where = '$param' $extra_cmd";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }
    protected function getAllData($table, $extra_cmd = "")
    {
        $sql = "SELECT * FROM $table $extra_cmd";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }
    protected function getDataWithTwoParam($table, $where, $param, $where2, $param2)
    {
        $sql = "SELECT * FROM $table WHERE $where = '$param' AND $where2 = '$param2'";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }
    protected function newPollingUnit($name, $desc, $lga_id, $ward_id, $uniquewardid)
    {
        // $result = false;
        $polling_unit_id = rand(1, 25);
        $uniqueid = rand(1, 50);

        $polling_unit_number = "DT" . $lga_id . $ward_id . $polling_unit_id;
        $date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO `polling_unit`(`polling_unit_id`, `ward_id`, `lga_id`, `uniquewardid`, `polling_unit_number`, `polling_unit_name`, `polling_unit_description`, `lat`, `long`, `entered_by_user`, `date_entered`, `user_ip_address`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute(["$polling_unit_id", "$ward_id", "$lga_id", "$uniquewardid", "$polling_unit_number", "$name", "$desc", "", "", "", $date, ""])) {
            if ($stmt->rowCount() > 0) {
                $stmt = true;
            } else {
                $stmt = false;
            }
        } else {
            $stmt = null;
        }
        return $stmt;
    }

    protected function newPartyScore($uniqueid, $party_name, $party_score, $entered_by,$user_ip_address)
    {
        // $result = false;
        
        $date = date("Y-m-d");

        $sql = "INSERT INTO `announced_pu_results`(`polling_unit_uniqueid`, `party_abbreviation`, `party_score`, `entered_by_user`, `date_entered`, `user_ip_address`) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute(["$uniqueid","$party_name", "$party_score", "$entered_by", "$date", "$user_ip_address"])) {
            if ($stmt->rowCount() > 0) {
                $stmt = true;
            } else {
                $stmt = false;
            }
        } else {
            $stmt = null;
        }
        return $stmt;
    }

    #ORDER BY CLAUSE WITH DESC AND LIMIT 1
}
