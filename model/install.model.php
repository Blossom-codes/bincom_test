<?php

class Install_model
{
    protected function connect()
    {
        try {
            $username = "root";
            $password = "";
            $db = new PDO("mysql:host=localhost;dbname=bincomphptest", $username, $password);
            return $db;
        } catch (\Exception $e) {
            echo "Error connecting to database" . $e->getMessage() . "<br/>";
            die();
        }
    }
   
}

$install = new Install_model;
// $install->connect();
