
<?php


class CreateRepliesTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS replies (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            comment_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE,
            content TEXT NOT NULL,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
    
        
        )";

        $conn->exec($sql);
    }
}