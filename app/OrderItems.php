<?php
class OrderItem {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // add itme to any order
    public function addOrderItem($order_id, $product_id, $quantity, $price) {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$order_id, $product_id, $quantity, $price]);
    }
    // retrieve all items in one order
    public function getItemsByOrderId($order_id) {
        $sql = "SELECT oi.*, p.name AS product_name FROM order_items oi 
                JOIN products p ON oi.product_id = p.id 
                WHERE oi.order_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // update item quantity by order item with id
    public function updateQuantity($order_item_id, $quantity) {
        $sql = "UPDATE order_items SET quantity = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$quantity, $order_item_id]);
    }

    // delete an item 
    public function deleteOrderItem($order_item_id) {
        $sql = "DELETE FROM order_items WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$order_item_id]);
    }
}
?>
