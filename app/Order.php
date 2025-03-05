<?php
namespace App;
use PDO;
use Database\DatabaseManager;

class Order {
    private $db;

    public function __construct() {
        $this->db = DatabaseManager::getConnection();
    }
    // create order
    public function createOrder($user_id, $total_price, $status = "pending") {
        $sql = "INSERT INTO orders (user_id, total_price, status, created_at) 
                VALUES (:user_id, :total_price, :status, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':total_price' => $total_price,
            ':status' => $status]);
    }

    //return order details using order id
    public function getOrderById($order_id) {
        $sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$order_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // update order status "pending, completed, canceled"
    public function updateOrderStatus($order_id, $status) {
        $sql = "UPDATE orders SET status = :status WHERE id =:id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':status' => $status, 
             ':id'    =>  $order_id]);
    }

    //in case of cancel any order we need to delete this order from database 
        public function deleteOrder($order_id) {
        $sql = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$order_id]);
    }

    // retrieve all orders related to one user
         public function getOrdersByUser($user_id) {
        $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOrdersByCategory($category_id) {
        $sql = "SELECT * FROM orders WHERE category_id = ? ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$category_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
