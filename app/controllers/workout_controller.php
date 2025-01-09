<?php
// include_once __DIR__ . '..//models//workout_model.php'; // Include the workout model file. This file contains the logic for interacting with the database to manage workout data.

// /**
//  * Function to fetch workout details based on the session user.
//  * This function checks if the user is logged in and fetches their workout data.
//  */
// function get_workout(){
//     // Check if the user is logged in by checking the session variable 'logged_in'
//     if(!isset($_SESSION['logged_in'])){
//         // If the user is not logged in, redirect them to the login page
//         header('Location:C:\xampp\htdocs\GymBro\app\views\auth\login.php'); // Correct the path to the login page
//     }

//     // Check if the user ID is set in the session, which is required to fetch the user's workout
//     if(!isset($_SESSION['id'])){
//         // If no user ID is set, handle the case (no action taken here yet)
//     }

//     // Get the user ID from the session
//     $id = $_SESSION['id'];

//     /* 
//     Uncomment and implement logic for fetching the workout details:
//     $w_obj = new Workout(); // Create a new Workout object
//     $w_obj->getWorkoutById($id); // Fetch workout by user ID
//     $workout_pc = $w_obj . $workout_image; // Combine workout object with image
//     $workout_phone = $w_obj . $workout_img_phone; // Combine workout object with phone image
//     */

//     // Include the 'see_workout' view to display the workout details to the user
//     include_once __DIR__ . '/..//views//workout//see_workout.php'; // Corrected path to the view file
// }


// /*
// Include necessary files for functionality and views.
// Each included file serves a specific purpose:
// 1. workout_model.php: Provides methods for interacting with workout data in the database.
// 2. see_workout.php: The view to display the workout details to the user.
// 3. db_connect.php: Establishes the database connection.
// */
// include_once __DIR__ . '..//models//workout_model.php';  // Include the workout model to interact with the database
// include_once __DIR__ . '/..//views//workout//see_workout.php';  // Include the view to display the workout details
// include_once __DIR__ . '/config/db_connect.php';  // Include the database connection file
// include_once __DIR__ . '/../views/auth/login.php';  // Include the login view for authentication
// include 'Workout.php';  // Include the Workout class file

// // Start the session to manage user login status
// session_start(); 

// // Check if the user is logged in by verifying the session
// if (!isset($_SESSION['user_id'])) {
//     // If the user is not logged in, redirect them to the login page
//     header('Location: app/views/auth/login.php'); 
//     exit(); // Stop further script execution after the redirection
// }

// /*
// WorkoutController class to manage workout-related actions like creating workouts, fetching workouts, etc.
// This class interacts with the workout model and provides methods for workout-related functionality.
// */
// class WorkoutController {
//     private $workoutModel;

//     // Constructor to initialize the Workout model with the database connection
//     public function __construct($db) {
//         $this->workoutModel = new Workout($db); // Initialize the workout model
//     }

//     /**
//      * Method to create a new workout based on the user's goal (weight loss, muscle gain, etc.).
//      * It sets the appropriate images for each goal.
//      * @param array $userInput - The user's input containing workout goals.
//      * @return bool - Returns true if the workout was created successfully, false otherwise.
//      */
//     public function createWorkout($userInput) {
//         // Decision tree logic for selecting the workout image based on the user's goal
//         if ($userInput['goal'] == 'weight_loss') {
//             $this->workoutModel->workout_image = 'weight_loss_plan.jpg'; // Image for weight loss plan
//             $this->workoutModel->workout_img_phone = 'weight_loss_plan_mobile.jpg'; // Mobile version of the image
//         } elseif ($userInput['goal'] == 'muscle_gain') {
//             $this->workoutModel->workout_image = 'muscle_gain_plan.jpg'; // Image for muscle gain plan
//             $this->workoutModel->workout_img_phone = 'muscle_gain_plan_mobile.jpg'; // Mobile version of the image
//         } elseif ($userInput['goal'] == 'endurance') {
//             $this->workoutModel->workout_image = 'endurance_plan.jpg'; // Image for endurance plan
//             $this->workoutModel->workout_img_phone = 'endurance_plan_mobile.jpg'; // Mobile version of the image
//         } else {
//             $this->workoutModel->workout_image = 'general_plan.jpg'; // Default image for general plans
//             $this->workoutModel->workout_img_phone = 'general_plan_mobile.jpg'; // Mobile version of the default image
//         }

//         // Insert the workout into the database and return the result
//         $result = $this->workoutModel->insertWorkout(); 
//         return $result; // Return the result of the insertion (true or false)
//     }

//     /**
//      * Method to fetch a single workout by its ID.
//      * @param int $workout_id - The ID of the workout to fetch.
//      * @return array|bool - Returns an array of workout details if found, false if not found.
//      */
//     public function getWorkout($workout_id) {
//         // Validate that the workout ID is numeric and greater than 0
//         if (!is_numeric($workout_id) || $workout_id <= 0) {
//             error_log("Invalid Workout ID provided: $workout_id"); // Log an error if the ID is invalid
//             return false; // Return false if the ID is invalid
//         }

//         // Fetch the workout by ID from the workout model
//         $result = $this->workoutModel->getWorkoutById($workout_id);

//         if ($result) {
//             // Return the workout data (ID, images) if found
//             return [
//                 'workout_id' => $this->workoutModel->workout_id,
//                 'workout_image' => $this->workoutModel->workout_image,
//                 'workout_img_phone' => $this->workoutModel->workout_img_phone
//             ];
//         }

//         return false; // Return false if the workout is not found
//     }

//     /**
//      * Method to fetch all workouts from the database.
//      * @return array - Returns an array of all workouts.
//      */
//     public function getAllWorkouts() {
//         // Fetch all workouts from the workout model
//         $result = $this->workoutModel->getAllWorkouts();
//         return $result; // Return the list of all workouts
//     }
// }
/*
 // Controller logic to interact with the workout data
 $controller = new WorkoutController($conn);

 // Fetch workout data (Example with static workout_id for demonstration)
 $workout_id = $_GET['id'] ?? null;

 if ($workout_id) {
     // Fetch workout details based on the workout ID
     $workoutData = $controller->getWorkout($workout_id);

     if ($workoutData) {
         // Pass the fetched data to the view
         $workout_image = $workoutData['workout_image'];
         $workout_img_phone = $workoutData['workout_img_phone'];
         include 'app/views/workout/see_workout.php'; // Include the view to display the workout details
     } else {
         echo "Invalid Workout ID or Workout not found."; // Display an error message if the workout is not found
     }
 } else {
     echo "No Workout ID provided."; // Display an error message if no workout ID is provided
 }
*/


require_once __DIR__ . '/../models/workout_model.php';

class WorkoutController {
    private $workoutModel;
    // it's the model who holds the connection object
    public function __construct($conn) {
        $this->workoutModel = new Workout($conn);
    }

    public function getWorkout() {
        
        try{
            if (!isset($_SESSION['logged_in'])) {
                header('Location: /Gymbro/login');
                exit();
            }
    
            if (!isset($_SESSION['user_id'])) {
                throw new Exception("user_id is not found");
            }
            $userId = $_SESSION['user_id'];
            $workout = $this->workoutModel->get_user_workout($userId);
            if(!$workout){ //workout was not found --> create one
                header('Location: /Gymbro/workout/form');
            }
            include_once __DIR__ . '/../views/workout/see_workout.php';
        }catch(Exception $e){
            throw new Exception("Error in getting user workout : " . $e->getMessage());
        }
       
    }

    //function to determine the number of days --> returns string
    public function determine_days($num_days){
        try{
            if(isset($num_days) && ($num_days <2 || $num_days >6)){
                throw new Exception("Number of training days is not valid");
            }
            switch ($num_days):
                case 1 :
                    return '1';
                case 2 :
                    return '2';
                case 3 :
                    return '3';
                case 4 : 
                    return '4';
                case 5 : 
                    return '5';
                case 6 : 
                    return '6';
            endswitch;
        }catch(Exception $e){
            throw $e;
        }
    }

    //function to determine the intensity --> returns string
    public function determine_intensity($intensity){
        //convert to lowercase
        $intensity=strtolower($intensity);
        if($intensity==='low'){
            return 'L';
        }
        elseif($intensity==='medium'){
            return 'M';
        }
        elseif($intensity==='high'){
            return 'H';
        }
        else{
            throw new Exception('invalid intensity value');
        }
    }

    //function to determine the goal --> returns string
    public function determine_goal($goal){
        //convert to lowercase
        $goal = strtolower($goal);
        if($goal==='power'){
            return 'P';
        }
        elseif($goal==='muscle'){
            return 'M';
        }
        elseif($goal==='weight'){
            return 'L';
        }
        else{
            throw new Exception("The goal is not vald");
        }
    }

    public function select_appropriate_workout(){
        try{
        if($_SERVER['REQUEST_METHOD']!=='POST'){
            throw new Exception("No post request was recieved");
        }
        if(!isset($_SESSION['logged_in'])){
            throw new Exception('User is not logged in');
        }
        if(!isset($_SESSION['user_id'])){
            throw new Exception("user_id not found");
        }
        //1- extract data from the POST 
        $user_id = $_SESSION['user_id'];
        $num_days = isset($_POST['workout_days'])? $_POST['workout_days'] : null; 
        $intensity = isset($_POST['workout_intensity'])? $_POST['workout_intensity'] : null; 
        $goal = isset($_POST['workout_objective'])? $_POST['workout_objective'] : null; 

        //2- sanitize the values
        try{
            $days = $this->determine_days($num_days);
        }catch(Exception $e){
            throw $e;
        }
        try{
            $intense = $this->determine_intensity($intensity);
        }catch(Exception $e){
            throw $e;
        }
        try{
            $objective = $this->determine_goal($goal);
        }catch(Exception $e){
            throw $e;
        }
        // select the workout
        $workout_name = 'D' . $days . '_' . $intense . '_' . $objective . '.png';
        $workout = $this->workoutModel->getWorkoutByName($workout_name);
        if(!$workout){
            throw new Exception("Workout name not found in the database");
        }
        // add it to the user :  --> stored in the user table
        $this->workoutModel->add_workout_to_user($user_id,$workout['workout_id']);

        //if successful --> display it to the user
        header('Location: /GymBro/workout/view');

        }catch(Exception $e){
            throw new Exception("Error in selecting appropriate workout : " . $e->getMessage());
        }
    }

    public function getWorkoutById($workoutId) {
        if (!is_numeric($workoutId) || $workoutId <= 0) {
            error_log("Invalid Workout ID provided: $workoutId");
            return false;
        }

        $workout = $this->workoutModel->getWorkoutById($workoutId);
        
        if (!$workout) {
            return false;
        }

        return [
            'workout_id' => $this->workoutModel->workout_id,
            'workout_image' => $this->workoutModel->workout_image,
            'workout_img_phone' => $this->workoutModel->workout_img_phone
        ];
    }

    public function getAllWorkouts() {
        return $this->workoutModel->getAllWorkouts();
    }
}


