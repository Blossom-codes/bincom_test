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
        $result = false;
        $polling_unit_id = rand(1, 25);

        $polling_unit_number = "DT" . $lga_id . $ward_id . $polling_unit_id;


        $sql = "INSERT INTO polling_units (`polling_unit_id`, `ward_id`, `lga_id`, `uniquewardid`, `polling_unit_number`, `polling_unit_name`, `polling_unit_description`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$polling_unit_id, $ward_id, $lga_id, $uniquewardid, $polling_unit_number, $name, $desc,])) {
            if ($stmt->rowCount() > 0) {
                $result = true;
            } else {
                $result = false;
            }
        } else {
            $stmt = null;
        }
        return $result;
    }
}
