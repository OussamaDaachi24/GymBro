<?php

require_once __DIR__ . "/../models/user_model.php"; // user model

function check_login(){
    if(!isset($_SESSION['logged_in'])){
        header("Location: /GymBro/user/create");
        exit;
    }
}

//1- display the profile
function get_profile_data($conn){
    //0- check log-in
    check_login();
    //1- identify the user
    try{
        $id=$_SESSION['user_id'];
        $user_data=select_user_data($conn,$id); //array that contains user data
        //2- include the profile view to insert the data
        include_once __DIR__ .  "/../views/profile/profile.php";
    }catch(Exception $e){
        throw new Exception("Error in getProfileData () : ". $e->getMessage());
    }                   
    
}

function validate_weight($weight){
    return ($weight>25 && $weight<200);
}

//2- update the weight
function update_user_weight($conn){
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
    $updated=update_weight($conn,$id,$weight,$date);
    //redirect to the profile page
    get_profile_data();
}
