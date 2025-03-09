<?php
use App\Validator;
use App\Category;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = isset($_POST['category_name']) ? $_POST['category_name'] : "";

    // var_dump($name);
    // exit;
    $validate = new Validator();


    $validate->validateRequired('category name', $name);
    $validate->validateString('category name', $name);
    $errors = $validate->getErrors();
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("location:" . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        $category = new Category();
        $oldCategories = $category->GetAllCategory();
        $categoryName = array_column($oldCategories,'name');
        if (in_array($name, $categoryName)) {
            $_SESSION['errors'][] = "this category already exist";
            header("location:" . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $category->AddCategory($name);
            $_SESSION['success'] = "category added successfully";
            header("location: ../admin/index.php");
            exit;
        }
    }
}
