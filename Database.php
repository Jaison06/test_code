<?php

class Database
{
    private $database = "php_test_db";
    private $db_user = "root";
    private $db_password = "";
    private $hostname = "localhost";
    private $conn;

    public function __construct()
    {
        $this->conn = $this->DbConnection();
    }

    public function DbConnection()
    {
        try {
            $this->conn = new PDO("mysql:dbname=" . $this->database . ";hostname=" . $this->hostname . "", $this->db_user, $this->db_password);
            if ($this->conn) {
                return $this->conn;
            } else {
                throw new Exception("Unable to connect");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getDb()
    {
        if ($this->conn instanceof PDO) {
            return $this->conn;
        }
    }

}
