<?php
include_once __DIR__ . "/../models/user_model.php"; //including the user model

function display_home(){
    if(isset($_SESSION['user_id'])){
        
        require_once __DIR__ . "../views/home/logged_home.php";
    }
    else{
        include_once __DIR__ . "/../views/home/home.php";
    }

}
?>