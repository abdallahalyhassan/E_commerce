<?php
namespace App;
use Database\DatabaseManager;

use PDO;
class Product {

    use FileManegerTrat;
    private $db;
    
    public function __construct() {
        $this->db = DatabaseManager::getConnection();
    }

    //add new product 
    public function addProduct($name, $description, $price, $stock, $category_id, $image) {
        $query = "INSERT INTO products (name, description, price, stock, category_id, image) VALUES (:name, :description, :price, :stock, :category_id, :image)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ":name" => $name,
            ":description" => $description,
            ":price" => $price,
            ":stock" => $stock,
            ":category_id" => $category_id,
            ":image" => $image
        ]);
    }

    // update product data
    public function updateProduct($id, $name, $description, $price, $stock, $category_id, $image=null) {
        $query = "UPDATE products SET name = :name, description = :description, price = :price, stock = :stock, category_id = :category_id";
        if ($image) {
            $query .= ", image = :image";
        }
        $query .= " WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $params = [
            ":id" => $id,
            ":name" => $name,
            ":description" => $description,
            ":price" => $price,
            ":stock" => $stock,
            ":category_id" => $category_id
        ];
        if ($image) {
            $params[":image"] = $image;
        }
        return $stmt->execute($params);
    }

    // delete product  
    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([":id" => $id]);
    }

    // return all product and can return all product belong to specific category
    public function getAllProducts($category_id = null) {
        $query = "SELECT * FROM products";
        if ($category_id) {
            $query .= " WHERE category_id = :category_id";
        }
        $stmt = $this->db->prepare($query);
        if ($category_id) {
            $stmt->execute([":category_id" => $category_id]);
        } else {
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // return one product with its id
    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // check if product in stock or not  
    public function isInStock($id) {
        $query = "SELECT stock FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([":id" => $id]);
        $stock = $stmt->fetchColumn();
        return $stock > 0;
    }

    // update product stock after any transaction
    public function updateStock($id, $quantity) {
        $query = "UPDATE products SET stock = stock - :quantity WHERE id = :id AND stock >= :quantity";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([":id" => $id, ":quantity" => $quantity]);
    }

    // search about any product with key word related to this product 
    public function searchProducts($keyword) {
        $query = "SELECT * FROM products WHERE name LIKE :keyword OR description LIKE :keyword";
        $stmt = $this->db->prepare($query);
        $stmt->execute([":keyword" => "%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // if we need to apply discount about any product 
    public function applyDiscount($id, $discountPercentage) {
        $query = "UPDATE products SET price = price - (price * :discount / 100) WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([":id" => $id, ":discount" => $discountPercentage]);
    }
}
?>
