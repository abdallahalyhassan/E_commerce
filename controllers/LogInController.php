<?php
require_once "../vendor/autoload.php";
use App\Validator;
use App\User;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_SESSION['username'])) {
        header("Location: ../routes/web.php");
        // print_r(headers_list());
        exit;
    }
$validat=new Validator();
$validat->validateEmail('email',$_POST['email']);
$validat->validateRequired("email",$_POST['email']);
$validat->validateRequired("password",$_POST['password']);


if (empty($validat->getErrors())){
    $user=new User();
   if( $user->log_in($_POST['email'],$_POST['password']))
   {
    header("location: ../routes/web.php" );
    }else{
         $_SESSION['errors'][] = "Invalid Email or Password";
        header("location: ../routes/web.php?page=login" );
    }
}else{
    $_SESSION['errors'] = $validat->getErrors();
    header("location: ../routes/web.php?page=login" ); 
}




}