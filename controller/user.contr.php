<?php

class User_contr extends User_model
{

    public function viewData($table, $where, $param, $extra_cmd = "")
    {
        return $this->getData("$table", "$where", $param, $extra_cmd);
    }
    public function viewAllData($table, $extra_cmd = "")
    {
        return $this->getAllData($table, $extra_cmd);
    }
    public function viewDataWithTwoParam($table, $where, $param, $where2, $param2)
    {
        return $this->getDataWithTwoParam("$table", "$where", $param, $where2, $param2);
    }
    public function viewTotalLgaResult($lga_id)
    {
        $ward = $this->viewData("ward", "lga_id", $lga_id);
        if ($ward) {
            $wardRow = $ward->fetch();
            $ward_id = $wardRow['ward_id'];
            $pollingUnit = $this->viewDataWithTwoParam("polling_unit", "ward", $ward_id, "lga_id", $lga_id);
            if ($pollingUnit) {
                while ($pollingUnitRow = $pollingUnit->fetch()) {

                    $pollingUnitUniqueId = $pollingUnitRow['uniqueid'];
                    $pollingUnitName = $pollingUnitRow['polling_unit_name'];
                    $pollingUnitDesc = $pollingUnitRow['polling_unit_desc'];

                    $result = [
                        "polling_unit_unique_id" => $pollingUnitUniqueId,
                        "polling_unit_name" => $pollingUnitName,
                        "polling_unit_desc" => $pollingUnitDesc

                    ];
                };
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
