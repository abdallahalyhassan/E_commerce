<?php

namespace App;
\session_start();  

use PDO;
use PDOException;
use Database\DatabaseManager;

class User{
    public $db;
    public string $f_name;
    private string $l_name;
    private string $email;
    private string $role;
    private string $password;
    			



    public function __construct()
    {
        $this->db = DatabaseManager::getConnection();
    }

    public function add_User($f_name,$l_name,$email,$password,$role='user'){
        $this->f_name=$f_name;
        $this->l_name=$l_name;
        $this->email=$email;
        $this->password= password_hash($password, PASSWORD_DEFAULT);;
        $this->role=$role;
        $this->save();

    }

    private function save(){

        try{
        $sql = "INSERT INTO `users`( `F_name`, `L_name`, `email`, `role`, `password`) VALUES (:fname,:lname,:email,:role,:password)";
        $p = $this->db->prepare($sql);
        $p->execute([
            ':fname'=>$this->f_name,
            ':lname'=>$this->l_name,
            ':email'=>$this->email,
            ':role'=>$this->role,
            ':password'=>$this->password
        ]);} catch (PDOException $e) {
            die("error: " . $e->getMessage());
        }
    }


    public function log_in($email,$password){

        try{
            $sql="SELECT * FROM `users` WHERE `email`=:email";
            $p=$this->db->prepare($sql);
            $p->execute([':email'=>$email]);
            $res = $p->fetch(PDO::FETCH_ASSOC);  
            if ($res&password_verify($password,$res["password"])){
                 $_SESSION['username']=$res['F_name'];
                 $_SESSION['role']=$res['role'];
                 $_SESSION['id']=$res['id'];
                return true;
            }
            return false;
        
        } catch (PDOException $e) {
           return false;
        }

    }
    public function getall(){

        try{
            $sql="SELECT * FROM `users` ";
            $p=$this->db->prepare($sql);
            $p->execute();
            $res = $p->fetch(PDO::FETCH_ASSOC);  
            if ($res){
                
                return $res;
            }
            return false;
        
        } catch (PDOException $e) {
           return false;
        }

    }
     public function log_out()
    {
        session_unset();    
        session_destroy();  
    }



}