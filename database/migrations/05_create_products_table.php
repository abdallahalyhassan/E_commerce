<?php


class CreateProductsTable{

    //here we need one more column to product image
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name varchar(50) not null,
            category_id INT NOT NULL,
            FOREIGN KEY (category_id) REFERENCES categorys(id) ON DELETE CASCADE,
            description TEXT    ,
            price INT NOT NULL,
            image TEXT    ,
            stock INT NOT NULL,
            created_at  TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
        
        )";

        $conn->exec($sql);
    }
}