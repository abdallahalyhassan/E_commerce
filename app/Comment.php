<?php


namespace App;
use PDO;
use Database\DatabaseManager;

class Comment{
    private $db;
    public function __construct(){
        $this->db=DatabaseManager::getConnection();
     }
     public function CreateComment($blog_id,$user_id, $content){
        $sql = "INSERT INTO `comments`( `user_id`, `blog_id`, `content`) VALUES(:user_id,:blog_id,:content)";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            
           ':user_id' => $user_id,
           ':blog_id'=> $blog_id, 
           ':content'=> $content]);
    }
    public function GetCommentsByBlog($blog_id){
        $sql="SELECT * FROM `comments`where blog_id=:blog_id ORDER BY created_at DESC";
        $stmt=$this->db->prepare($sql);
        $stmt->execute(['blog_id'=>$blog_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     public function DeleteComment($comment_id){
        $sql = "DELETE FROM comments WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$comment_id]);
    }

    public function UpdateComment($content,$comment_id){
        $sql = "UPDATE comments SET content = :content WHERE id =:id";
        $stmt=$this->db->prepare($sql);
       return $stmt->execute(
        ['content'=>$content,
       'id'=>$comment_id]);
    }
}