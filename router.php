<?php

//1-including the controllers
require_once __DIR__ . "/app/controllers/auth_controller.php"; //authentication (login / register)
require_once __DIR__ . "/app/controllers/diet_controller.php"; //diet
require_once __DIR__ . "/app/controllers/home_controller.php"; // home-page
require_once __DIR__ . "/app/controllers/profile_controller.php"; //profile
require_once __DIR__ . "/app/controllers/workout_controller.php"; //workout
require_once __DIR__ . '/config/db_connect.php';//db connection

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
            $conn=connect_db();
            display_home($conn);
            break;
        case '':
            $conn=connect_db();
            display_home($conn);
            break;
        // C) Authentication
        case 'login':
            $conn = connect_db();
            $authController = new AuthController($conn);
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';
                
                // Check if it's an AJAX request
                $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
                          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
                
                if ($authController->login($email, $password)) {
                    if ($isAjax) {
                        header('Content-Type: application/json');
                        echo json_encode(['success' => true]);
                    } else {
                        header("Location: /GymBro/home");
                    }
                    exit;
                } else {
                    $error = $authController->getError();
                    if ($isAjax) {
                        header('Content-Type: application/json');
                        echo json_encode(['success' => false, 'message' => $error]);
                    } else {
                        $_SESSION['error'] = $error;
                        header("Location: /GymBro/login");
                    }
                    exit;
                }
            } else {
                // Show the login page
                include_once __DIR__ . "/app/views/auth/login.php";
            }
            break;
            case 'register':
                $conn = connect_db();
                $authController = new AuthController($conn);
            
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Collect registration data, including the uploaded file
                    $userData = [
                        'name' => $_POST['name'] ?? '',
                        'email' => $_POST['email'] ?? '',
                        'password' => $_POST['password'] ?? '',
                        'confirm_password' => $_POST['confirm_password'] ?? '',
                        'file' => $_FILES['file'] ?? null // Include the uploaded file
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
        case 'logout':
            $conn = connect_db();
            $authController = new AuthController($conn);
            try{
                $authController->logout();
            }catch(Exception $e){
                echo $e->getMessage();
            }
            
            
        case 'user/create':
            include_once __DIR__ . "/app/views/auth/register.php";
            break;
        case 'user/valid':
            include_once __DIR__ . "/app/views/auth/login.php";
            break;
        // D) Diet 
        case 'diet/form':
            include_once __DIR__ . "/app/views/diet/create_diet.php";
            break;
        case 'diet/create':
            try{
                $conn=connect_db();
                create_diet($conn);
            }catch(Exception $e){
                print( $e->getMessage());
            }
           
            break;
        case 'diet/view':
            try{
                $conn=connect_db();
                show_diet_program($conn); 
            }catch(Exception $e){
            }
          
            break;
        // E) workout
        case 'workout/form':
            include_once __DIR__ . "/app/views/workout/create_workout.php";
            break;
        case 'workout/create':
            try{
                $conn=connect_db();
                $workoutController = new WorkoutController($conn);
                $workoutController->select_appropriate_workout();
            }catch(Exception $e){
                echo $e->getMessage();
            }
            break;
        case 'workout/view':
            try{
                $conn=connect_db();
                $workoutController = new WorkoutController($conn);
                $workoutController->getWorkout();
            }catch(Exception $e){
                echo $e->getMessage();
            }
            
            break;
        // F) Profile
        case 'profile/view':
            //display_profile_data() --> fetch user from DB & render the profile view
            $conn = connect_db();
            try{
                get_profile_data($conn);
            }catch(Exception $e){
                echo "Error in getting profile data : " . $e->getMessage();
            }
            
            break;
        case 'profile/update':
            //update_weight() --> update user weight input
            $conn = connect_db();
            update_user_weight($conn);
            break;
        case 'logout':
            $conn = connect_db();
            $authController = new AuthController($conn);
            
            try {
                $authController->logout();
                } catch (Exception $e) {
                    error_log("Logout error: " . $e->getMessage());
                    // Optionally, redirect to an error page or show an error message
                    include_once __DIR__ . "/app/views/static/error.php";
                }
            break;
        default:
            include_once __DIR__ . "/app/views/static/not_found.php";

        endswitch;
    
}

?>