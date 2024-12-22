<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . "/../models/user_model.php"; //including the user model

function display_home(){
    if(isset($_SESSION['logged_in'])){
        require_once __DIR__ . "../views/home/logged_home.php";
    }
    else{
        include_once __DIR__ . "/../views/home/home.php";
    }

}
?>