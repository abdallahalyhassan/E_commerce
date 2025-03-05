<?php


namespace App;
use PDO;
use Database\DatabaseManager;

class Replies{
    private $db;
    public function __construct(){
        $this->db=DatabaseManager::getConnection();
     }
     public function CreateReplay($comment_id,$user_id, $content){
        $sql = "INSERT INTO `replies`( `user_id`, `comment_id`, `content`) VALUES(:user_id,:comment_id,:content)";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            
           ':user_id' => $user_id,
           ':comment_id'=> $comment_id, 
           ':content'=> $content]);
    }
    public function GetRepliesByComment($comment_id){
        $sql="SELECT * FROM `replies`where comment_id=:comment_id ORDER BY created_at DESC";
        $stmt=$this->db->prepare($sql);
        $stmt->execute(['comment_id'=>$comment_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     public function DeleteReplay($replay_id){
        $sql = "DELETE FROM replies WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$replay_id]);
    }

    public function UpdateComment($content,$replay_id){
        $sql = "UPDATE replies SET content = :content WHERE id =:id";
        $stmt=$this->db->prepare($sql);
       return $stmt->execute(
        ['content'=>$content,
       'id'=>$replay_id]);
    }
}