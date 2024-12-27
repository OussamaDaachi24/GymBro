<?php
include_once __DIR__ . "/../models/user_model.php"; //including the user model

function display_home($conn){
    if(isset($_SESSION['logged_in'])){ //user is logged
      try{
        if(!isset($_SESSION['user_id'])){
            throw new Exception("Error : user_id is not found");
        }

        $user_id=$_SESSION['user_id']; //obtain the user_id
        $streak=get_streak($conn,$user_id);
        $start_date = $streak['start_date']; //start date of the streak--> used to increment the streak
        $latest_day=$streak['end_date']; // the latest access day

        if(!$start_date){
            throw new Exception("Error in getting the streak : streak start_date not found");
        }

        //2- check if the streak ends
        end_streak($conn,$user_id,$start_date,$latest_day); //will initialize it to 0 if needed , nothing otherwise


        //3- increment the streak : duration & latest access day
        increment_streak($conn,$user_id,$start_date);

        //include the home page
        include_once __DIR__ .  "/../views/home/home_logged.php";
      }
      catch(Exception $e){
        $error=$e->getMessage();
        include_once __DIR__ . "/../views/static/not_found.php";
      }
    }
    else{
        include_once __DIR__ .  "/../views/home/home.php";
    }

}
?>


