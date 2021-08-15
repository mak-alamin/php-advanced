<?php

class m0002_create_category_table
{
    public function up()
    {
        echo "Applying Migration Category Table..." . PHP_EOL;

        $db = App\Core\Application::$app->db;

        $sql = "CREATE TABLE IF NOT EXISTS categories (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(50) NOT NULL,
                description VARCHAR(255) NOT NULL,
                slug VARCHAR(50) NOT NULL,
                status TINYINT(50) NOT NULL
            );";

        $created = $db->query($sql);
        if ($created) {
            echo "Applied Migration Category Table..." . PHP_EOL;
        }
    }

    public function down()
    {
    }
}
