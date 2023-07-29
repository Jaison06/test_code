<?php

class DbConnection
{
    private $dbname = "php_test_db";
    private $db_user = "root";
    private $db_password = "";
    private $hostname = "localhost";
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->dbConnection();
    }
    public function dbConnection()
    {
        try {
            $connection_string = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->dbname . "", $this->db_user, $this->db_password);
            if ($connection_string) {
                return $connection_string;
            } else {
                throw new Exception("Unable to connect");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function getDb()
    {
        if ($this->pdo instanceof PDO) {
            return $this->pdo;
        }
    }
}
