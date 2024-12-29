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
        if(!$id){
            throw new Exception("user id is not valid");
        }
        $user_data=select_user_data($conn,$id); //array that contains user data
        //2- include the profile view to insert the data
        include_once __DIR__ .  "/../views/profile/profile.php";
    }catch(Exception $e){
        throw new Exception("Error in getProfileData () : ". $e->getMessage());
    }                   
    
}

function validate_weight($weight){

     if($weight<25 || $weight>200){
        throw new Exception('error : weight must be between 25 and 200 kg');
     }
     return true;
}

//2- update the weight
function update_user_weight($conn){
    try{
            //0- check log-in
            check_login();
            //1-obtain the id of the user
            $user_id=$_SESSION['user_id'];
            //2-obtain the updated weight
            if(!($_SERVER['REQUEST_METHOD']=='POST')||!(isset($_POST['weight'])) ){
                throw new Exception('Error in the request method : no weight');
            }
            $weight=$_POST['weight'];
            if(!validate_weight($weight)){
                throw new Exception('Error : weight is not valid');
            }
            //current date
            $date=date('Y-m-d');
            //3-update the weight
            $updated=insert_new_weigth($conn,$user_id,$weight);
            if(!$updated){
                throw new Exception('Error in updating the weight');
            }
            //redirect to the profile page
            get_profile_data($conn);
    }catch(Exception $e){
        throw new Exception("Error in update_user_weight() : ". $e->getMessage());
    }
   
}
