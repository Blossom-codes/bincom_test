<?php

class User_model extends Install_model
{
    protected function getData($table, $where, $param, $extra_cmd = "")
    {
        $sql = "SELECT * FROM $table WHERE $where = '$param' $extra_cmd";
        $stmt = $this->connect()->query($sql);
        return $stmt;
    }
    protected function getAllData($table,$extra_cmd="")
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
    

}
