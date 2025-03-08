<?php 



class CreateSliderTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS sliders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            product_id INT NOT NULL,
            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
            Title TEXT NOT NULL,
            Another_Title TEXT NOT NULL,
            offer int NOT NULL,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
    
        
        )";

        $conn->exec($sql);
    }
}