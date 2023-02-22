<?php

namespace rudhro;

use PDO;
use PDOException;

class Helper
{

    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $conn;

    public function dbconnection()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=books", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function prearesql($sql){
        return $this->conn->prepare($sql);
    }
}
