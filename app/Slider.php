<?php
namespace App;
use PDO;
use Database\DatabaseManager;

class Slider{
    private $db;

    public function __construct() {
        $this->db = DatabaseManager::getConnection();
    }


    public function createSlider($product_id,$Title,$Another_Title,$offer){
        $sql="INSERT INTO `sliders`( `product_id`, `Title`, `Another_Title`, `offer`) VALUES(:product_id,:Title,:Another_Title,:offer)";
        $stml=$this->db->prepare($sql);
        return $stml->execute([
            ':product_id'=>$product_id,
            ':Title'=>$Title,
            ':Another_Title'=>$Another_Title,
            ':offer'=>$offer
        ]);

    }
    public function deleteSlider($id) {
        $query = "DELETE FROM sliders WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([":id" => $id]);
    }


    public function getAllSlider() {
        $query = "SELECT * FROM sliders ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}