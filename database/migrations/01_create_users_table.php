<?php


class CreateUsersTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            F_name VARCHAR(50) NOT NULL,
            L_name VARCHAR(50) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            role VARCHAR(10)  NOT NULL,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP,
            password VARCHAR(255) NOT NULL
        )";

        $conn->exec($sql);
    }
}