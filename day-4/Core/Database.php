<?php 

namespace APP\Core;

class Database{

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $conn = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
            // echo "Connected successfully";
        
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}