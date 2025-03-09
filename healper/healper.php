<?php
if(session_status()== PHP_SESSION_NONE){
session_start();
}
function successMessage()
{
    if (!empty($_SESSION['success'])) {
        echo "<div class='alert alert-success text-center' role='alert'>{$_SESSION['success']}</div>";
        unset($_SESSION['success']);
    }
}

function errorMessage()
{
    // echo $_SESSION;;
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo "<div class='alert alert-danger text-center' role='alert'>{$error}</div>";
        }
        unset($_SESSION['errors']);  
    }
}