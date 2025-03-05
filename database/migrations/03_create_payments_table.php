<?php


class CreatePaymentsTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS payments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            order_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
            status varchar(10)  DEFAULT 'false'  ,
            payment_method varchar(255) NOT NULL   ,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
        
        )";

        $conn->exec($sql);
    }
}