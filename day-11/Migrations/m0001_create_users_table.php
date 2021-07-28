<?php

class m0001_create_users_table{
    public function up(){
        echo "Applying migration..." . PHP_EOL;

        $db = App\Core\Application::$app->db;

        $sql = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                phone VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL   
            );";

        $created = $db->query($sql);

        if ($created){
            echo "Users Table Created."  . PHP_EOL;
        } else {
            echo "Something went wrong!"  . PHP_EOL;
        }
    }

    public function down(){

    }
}