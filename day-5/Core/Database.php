<?php 

namespace APP\Core;

class Database{

    public $conn;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
            // echo "Connected successfully";
        
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($sql)
    {
        // use exec() because no results are returned
        return $this->conn->exec($sql);
    }
}