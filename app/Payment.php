<?php
namespace App;
use PDO;
use PDOException;
use Database\DatabaseManager;

class Payment{


    private $db;


    public function __construct(){
       $this->db=DatabaseManager::getConnection();
    }
    public function DefultPayment($order_id,$user_id, $payment_method="cash"){
        $sql = "INSERT INTO payments (user_id, order_id, payment_method) VALUES (:user_id, :order_id, :payment_method)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            
           ':user_id' => $user_id,
           ':order_id'=> $order_id, 
           ':payment_method'   => $payment_method]);
    }
    public function MakePayment($order_id, $user_id, $status = 'paid')
    {
        try {
            $sql = "UPDATE payments SET `status` = :status WHERE user_id = :user_id AND id = :order_id";
            $stmt = $this->db->prepare($sql);
            
            $result = $stmt->execute([
                ':status' => $status,          // Use a string like 'paid' or 'unpaid'
                ':user_id' => $user_id,
                ':order_id' => $order_id
            ]);

            return $result;
            
        } catch (PDOException $e) {
            // Log error or handle it
            die("Error updating payment status: " . $e->getMessage());
        }
    }
    
}