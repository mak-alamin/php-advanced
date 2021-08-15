<?php

namespace APP\Core;

class Database
{

    public $conn;
    public $stmt;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            // echo "Connected successfully";

        } catch (\PDOException $e) {
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

    public function fetchColumn($sql)
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();

        return $this->stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function applyMigrations($rootDir)
    {
        $this->createMigrationTable();

        $files = scandir($rootDir . '/Migrations');

        $appliedMigrations = $this->appliedMigrations();

        $files = array_diff($files, $appliedMigrations);

        $newMigrations = [];

        foreach ($files as $migration) {
            if ($migration == '.' || $migration == '..') {
                continue;
            }

            require_once $rootDir . "/Migrations/" . $migration;

            $className = rtrim($migration, '.php');
            $obj = new $className();
            $obj->up();

            $this->query("INSERT INTO migrations (migration) VALUES('$migration')");

            $newMigrations[] = $migration;
        }

        if (empty($newMigrations)) {
            echo "Nothing to migrate. All migrations applied.";
        }
    }

    public function createMigrationTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(50),
            created_at TIMESTAMP   
        );";

        $created = $this->query($sql);
    }

    public function appliedMigrations()
    {
        $sql = "SELECT `migration` FROM migrations";
        return $this->fetchColumn($sql);
    }
}
