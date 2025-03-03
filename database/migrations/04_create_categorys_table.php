<?php



class CreateCategorysTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS categorys (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name varchar(255) NOT NULL   ,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
        
        )";

        $conn->exec($sql);
    }

}