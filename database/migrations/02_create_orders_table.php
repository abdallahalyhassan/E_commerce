<?php


class CreateOrdersTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            total_price INT   not null,
            user_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            status VARCHAR(50) NOT NULL DEFAULT 'pending ' ,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
        
        )";

        $conn->exec($sql);
    }
}