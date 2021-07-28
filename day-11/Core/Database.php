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

    public function query($sql): bool
    {
        $this->stmt = $this->conn->prepare($sql);
        return $this->stmt->execute();
    }


    public function fetchData($sql): array
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();

        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function applyMigrations($rootDir){

        $files = scandir($rootDir . '/Migrations');

        foreach ($files as $migration) {
            if ($migration == '.' || $migration == '..'){
                continue;
            }

            require_once $rootDir . "/Migrations/" . $migration;

            $className = rtrim($migration, '.php');
            $obj = new $className();
            $obj->up();
        }
    }


    public function createMigrationTable($migrations)
    {

    }
}