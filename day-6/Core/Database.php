<?php 

namespace APP\Core;

class Database{

    public $conn;
    public $stmt;

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
        // echo $sql;
        // die();

        // use exec() because no results are returned
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();

        $data = $this->stmt->fetch();

        return $data;
    }
}