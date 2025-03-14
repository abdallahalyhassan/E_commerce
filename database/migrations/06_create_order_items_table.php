
<?php


class CreateOrderItemsTable{
    public function up($conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS order_items (
            id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT NOT NULL,
            product_id INT NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
            price INT NOT NULL,
            quantity INT NOT NULL
          
        
        )";

        $conn->exec($sql);
    }
}