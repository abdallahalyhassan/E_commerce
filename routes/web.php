<?php
require_once "../vendor/autoload.php";
$page = isset($_GET['page']) ? $_GET['page'] : "home";

switch ($page) {
    case "home":
        require_once "../views/index.php";
        break;
    case "product":
        require_once "../views/product-details.php";
        break;
    case "404":
        require_once "../views/404.php";
        break;
    case "about":
        require_once "../views/about.php";
        break;
    case "blog-details":
        require_once "../views/blog-details.php";
        break;
    case "blog":
        require_once "../views/blog.php";
        break;
    case "cart":
        require_once "../views/cart.php";
        break;
    case "checkout":
        require_once "../views/checkout.php";
        break;
    case "contact":
        require_once "../views/contact.php";
        break;
    case "faq":
        require_once "../views/faq.php";
        break;
    case "forget-password":
        require_once "../views/forget-password.php";
        break;
    case "index-2":
        require_once "../views/index.php";
        break;
    case "login":
        require_once "../views/login.php";
        break;
    case "my-account":
        require_once "../views/my-account.php";
        break;
    case "privacy-policy":
        require_once "../views/privacy-policy.php";
        break;
    case "register":
        require_once "../views/register.php";
        break;
    case "services":
        require_once "../views/services.php";
        break;
    case "tracking":
        require_once "../views/tracking.php";
        break;
    case "wishlist":
        require_once "../views/wishlist.php";
        break;
    case "LogInController":
        require_once "../controllers/LogInController.php";
        break;

    case "registerController":
        require_once "../controllers/registerController.php";
        break;

    case "resetPasswordController":
        require_once "../controllers/resetPasswordController.php";
        break;
    case "add-category":
        require_once "../controllers/admin/addCategoryController.php";
        break;
    case "add-product":
        require_once "../controllers/admin/addProductController.php";
        break;

        case "deleteCategoryController":
            require_once "../controllers/admin/deleteCategoryController.php";
            break;


      
}
