
<?php


class CreateShippingsTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS shippings (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            order_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
            address varchar(50) NOT NULL,
            city varchar(50) NOT NULL,
            country varchar(50) NOT NULL,
            status varchar(50) DEFAULT 'pending',
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
    
        
        )";

        $conn->exec($sql);
    }
}