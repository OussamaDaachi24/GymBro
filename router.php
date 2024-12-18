<?php

//1-including the controllers
require_once __DIR__ . "/app/controllers/auth_controller.php"; //authentication (login / register)
require_once __DIR__ . "/app/controllers/diet_controller.php"; //diet
require_once __DIR__ . "/app/controllers/home_controller.php"; // home-page
require_once __DIR__ . "/app/controllers/profile_controller.php"; //profile
require_once __DIR__ . "/app/controllers/workout_controller.php"; //workout

//routing function


function route($url_path){
    //1- the full url
    $full_url=$url_path;
    //2- parse it (remove the base url GYMBRO/)
    $url=substr($full_url,strlen('/GymBro/'));
    //3-start routing
    switch ($url):
        //A) the static pages (no dynamic logic)
        case 'about':
            include_once __DIR__ . "/app/views/static/about.php";
            break;
        case 'static_meals':
            include_once __DIR__ . "/app/views/static/static_food.php";
            break;
        case 'static_workout':
            include_once __DIR__ . "/app/views/static/static_exercise.php";
            break;
        case 'bulk':
            include_once __DIR__ . "/app/views/static/static_bulk.php";
            break;
        case 'cut':
            include_once __DIR__ . "/app/views/static/static_cut.php";
            break;
        case 'healthy':
            include_once __DIR__ . "/app/views/static/static_healthy.php";
            break;
        // B) home page
        case 'home':
            display_home();
            break;
        case '':
            display_home();
            break;
        // C) Authentication
        case 'login':
            // display_login() --> show login page
            break;
        case 'register':
            // display_register() --> show register page
            break;
        case 'user/create':
            //create_user() --> create a user
            break;
        case 'user/valid':
            //valid_login() --> validate user data for login
            break;
        // D) Diet 
        case 'diet/create':
            //create_diet() --> create & store the diet
            create_diet();
            break;
        case 'diet/view':
            // display_user_diet() --> fetch & display user diet
            break;
        // E) workout
        case 'workout/create':
            //create_workout() --> create and store the workout
            break;
        case 'workout/view':
            //display_workout() --> fetch the workout
            break;
        // F) Profile
        case 'profile/view':
            //display_profile_data() --> fetch user from DB & render the profile view
            get_profile_data();
            break;
        case 'profile/update':
            //update_weight() --> update user weight input
            update_user_weight();
            break;
        default:
            //include_once __DIR__ . "/app/views/static/not_found.php";
        endswitch;
    
}