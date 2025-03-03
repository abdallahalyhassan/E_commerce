
<?php


class CreateCommentsTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS comments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            blog_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (blog_id) REFERENCES blogs(id) ON DELETE CASCADE,
            content TEXT NOT NULL,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
    
        
        )";

        $conn->exec($sql);
    }
}