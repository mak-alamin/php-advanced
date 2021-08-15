<?php

class m0002_create_posts_table
{
    public function up()
    {
        echo "Applying Migration Posts Table..." . PHP_EOL;

        $db = App\Core\Application::$app->db;

        $sql = "CREATE TABLE IF NOT EXISTS posts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(50) NOT NULL,
                description VARCHAR(255) NOT NULL,
                slug VARCHAR(50) NOT NULL,
                image VARCHAR(50) NOT NULL,
                status TINYINT(50) NOT NULL
            );";

        $created = $db->query($sql);
        if ($created) {
            echo "Applied Migration Posts Table..." . PHP_EOL;
        }
    }

    public function down()
    {
        $sql = "DROP TABLE posts";
    }
}
