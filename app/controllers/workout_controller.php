<?php
include_once __DIR__ . '..//models//workout_model.php';

function get_workout(){
    //check that the user is logged
    if(!isset($_SESSION['logged_in'])){
        //redirect to login
        header('Location:C:\xampp\htdocs\GymBro\app\views\auth\login.php'); /// i will add the log in path

    }

    if(!isset($_SESSION['id'])){

    }
    $id = $_SESSION['id'];
    
    /*$w_obj=Workout();
    $w_obj.getWorkoutById($id);
    $workout_pc=$w_obj.$workout_image;
    $workout_phone=$w_obj.$workout_img_phone;*/

    include_once __DIR__ . '/..//views//workout//see_workout.php';


}