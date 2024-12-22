<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../../config/db_connect.php"; // connect to the database
require_once __DIR__ . "/../models/user_model.php"; // user model

function check_login(){
    if(!isset($_SESSION['logged_in'])){
        include_once __DIR__ . "/../views/auth/login.php";
        exit;
    }
}

//1- display the profile
function get_profile_data(){
    //0- check log-in
    check_login();
    //1- identify the user
    $id=$_SESSION['user_id'];
    $user_data=select_user_data($id); //array that contains user data
    //2- include the profile view to insert the data
    include_once "../views/profile/profile.php";
}

function validate_weight($weight){
    return ($weight>25 && $weight<200);
}

//2- update the weight
function update_user_weight(){
    //0- check log-in
    check_login();
    //1-obtain the id of the user
    $id=$_SESSION['user_id'];
    //2-obtain the updated weight
    if(!($_SERVER['REQUEST_METHOD']=='POST')||!(isset($_POST['weight'])) ){
        // the weight is not updated
        header('location: /GymBro/profile/view');
    }
    $weight=$_POST[weight];
    if(!validate_weight($weight)){
        // redirect it to the create_diet view
        $_SESSION['valid_weight']=false; // used in the view to indicate that the weight is not valid
        header('Location : ../views/profile/profile.php');    
    }
    $date=date('Y-m-d');
    //3-update the weight
    $updated=update_weight($id,$weight,$date);
    //redirect to the profile page
    get_profile_data();
}
