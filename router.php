<?php

//1-including the controllers
require_once __DIR__ . "/app/controllers/auth_controller.php"; //authentication (login / register)
require_once __DIR__ . "/app/controllers/diet_controller.php"; //diet
require_once __DIR__ . "/app/controllers/home_controller.php"; // home-page
require_once __DIR__ . "/app/controllers/profile_controller.php"; //profile
require_once __DIR__ . "/app/controllers/workout_controller.php"; //workout
require_once __DIR__ . '/config/db_connect.php';//db connection
$conn = connect_db();
$authController = new AuthController($conn);
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
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Get email and password from the POST request
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';

                // Attempt to log in
                if ($authController->login($email, $password)) {
                    // Redirect to home or another page on success
                    header("Location: /GymBro/home");
                    exit;
                } else {
                    // Show error message
                    echo $authController->getError();
                }
            } else {
                // Show the login page
                include_once __DIR__ . "/app/views/auth/login.php";
            }
            break;
        case 'register':
            // display_register() --> show register page
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Collect registration data
                $userData = [
                    'name' => $_POST['name'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'password' => $_POST['password'] ?? '',
                    'confirm_password' => $_POST['confirm_password'] ?? '',
                    'age' => $_POST['age'] ?? ''
                ];

                // Attempt to register
                if ($authController->register($userData)) {
                    // Redirect to login or home page on success
                    header("Location: /GymBro/home");
                    exit;
                } else {
                    // Show error message
                    echo $authController->getError();
                }
            } else {
                // Show the registration page
                include_once __DIR__ . "/app/views/auth/register.php";
            }
            break;
        case 'user/create':
            include_once __DIR__ . "/app/views/auth/register.php";
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
            $conn = connect_db();
            get_profile_data($conn);
            break;
        case 'profile/update':
            //update_weight() --> update user weight input
            $conn = connect_db();
            update_user_weight($conn);
            break;
        default:
            //include_once __DIR__ . "/app/views/static/not_found.php";
        endswitch;
    
}