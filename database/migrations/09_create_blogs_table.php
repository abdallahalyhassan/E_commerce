
<?php


class CreateBlogsTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS blogs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            product_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
            title varchar(50) NOT NULL,
            description TEXT NOT NULL,
            img TEXT NOT NULL,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
    
        
        )";

        $conn->exec($sql);
    }
}