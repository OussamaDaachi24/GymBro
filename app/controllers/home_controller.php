<?php
include_once __DIR__ . "/../models/user_model.php"; //including the user model

function display_home($conn) {
    //check if the Session exist
    if(!isset($_SESSION['logged_in']) || !isset($_SESSION['user_id'])) {
        if(isset($_COOKIE['logged_in'])&&isset($_COOKIE['user_id'])){ 
            // if cookies exist --> assign to the session
            $_SESSION['logged_in'] = $_COOKIE['logged_in'];
            $_SESSION['user_id'] = $_COOKIE['user_id'];
        }     
    }
    if(isset($_SESSION['logged_in'])) {
        try {
            if(!isset($_SESSION['user_id'])) {
                throw new Exception("Error: user_id is not found");
            }

            $user_id = $_SESSION['user_id'];
            $streak = get_streak($conn, $user_id);
            
            // Add null check for streak
            if (!$streak) {
                throw new Exception("Error: streak not found");
            }

            $start_date = $streak['start_date'];
            $latest_day = $streak['end_date'];

            // Check streak dates
            if (!$start_date || !$latest_day) {
                throw new Exception("Error: invalid streak dates");
            }

            end_streak($conn, $user_id, $start_date, $latest_day);
            increment_streak($conn, $user_id, $start_date);

            include_once __DIR__ . "/../views/home/home_logged.php";
            
        } catch (Exception $e) {
            error_log("Home page error: " . $e->getMessage());
            // Instead of showing not found, show home page with error message
            $_SESSION['error'] = $e->getMessage();
            include_once __DIR__ . "/../views/home/home_logged.php";
        }
    } else {
        include_once __DIR__ . "/../views/home/home.php";
    }
}
?>


