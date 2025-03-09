<?php 
use App\Category;
$category = new Category();
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $category->DeleteCategory($id);
    $_SESSION['success'] = "category deleted successfully";
    header("location:" . $_SERVER['HTTP_REFERER']);
    exit;
}