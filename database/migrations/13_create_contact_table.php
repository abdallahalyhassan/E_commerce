<?php 

class CreateContactTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS contact (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(255)  NOT NULL,
            message TEXT NOT NULL,
            user_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,          
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
        
        )";

        $conn->exec($sql);
    }
}