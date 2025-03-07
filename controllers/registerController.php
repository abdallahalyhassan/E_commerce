<?php 
use App\Validator;
use App\User;
$errors = [];
if($_SERVER['REQUEST_METHOD']=="POST"){
$validate = new Validator();
$name = isset($_POST['name'])?$_POST['name']:"";
$email = isset($_POST['email'])?$_POST['email']:"";
$password = isset($_POST['password'])?$_POST['password']:"";

//validate name of user 
$validate->validateString('name',$name);

//Validate email of user

$validate->validateEmail('email',$email);

//validate password

$validate->validatePassword('password',$password);

// validate required to all fields 
$validate->validateRequired('name',$name);

$validate->validateRequired('email',$email);

$validate->validateRequired('password',$password);

$errors = $validate->getErrors();

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("location:". $_SERVER['HTTP_REFERER']);
    exit;
}else{
    $newUser = new User();
    $newUser->add_User($name,$email,$password);
    $_SESSION['username'] = $name;
    header("location: ../public/index.php");

}



}