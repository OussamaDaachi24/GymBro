/*
include_once __DIR__ . '..//models//workout_model.php'; // Include the workout model file

function get_workout(){
    // Check if the user is logged in
    if(!isset($_SESSION['logged_in'])){
        // If not logged in, redirect to the login page
        header('Location:C:\xampp\htdocs\GymBro\app\views\auth\login.php'); // Add the correct login path
    }

    // Check if the user ID is set in the session
    if(!isset($_SESSION['id'])){
        // If no user ID, handle accordingly (no action here yet)
    }

    // Get the user ID from the session
    $id = $_SESSION['id'];

    /*$w_obj = Workout(); // Create a new Workout object
    $w_obj.getWorkoutById($id); // Fetch workout by user ID
    $workout_pc = $w_obj . $workout_image; // Combine workout object with image
    $workout_phone = $w_obj . $workout_img_phone; // Combine workout object with phone image*/

    // Include the 'see_workout' view to display the workout details
    include_once __DIR__ . '/..//views//workout//see_workout.php';
}
*/










<?php
// Include necessary files
include_once __DIR__ . '..//models//workout_model.php';
include_once __DIR__ . '/..//views//workout//see_workout.php';
include_once __DIR__ . '/config/db_connect.php'; 
include 'Workout.php'.  

session_start(); // Start the session to check login status

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: app/views/auth/login.php'); // Redirect to the login page
    exit(); // Stop further script execution
}

class WorkoutController {
    private $workoutModel;

    // Constructor to initialize Workout model
    public function __construct($db) {
        $this->workoutModel = new Workout($db);
    }

    /**
     * Create a new workout based on user goal
     * @param array $userInput
     * @return bool
     */
    public function createWorkout($userInput) {
        // Decision Tree Logic for workout image selection
        if ($userInput['goal'] == 'weight_loss') {
            $this->workoutModel->workout_image = 'weight_loss_plan.jpg';
            $this->workoutModel->workout_img_phone = 'weight_loss_plan_mobile.jpg';
        } elseif ($userInput['goal'] == 'muscle_gain') {
            $this->workoutModel->workout_image = 'muscle_gain_plan.jpg';
            $this->workoutModel->workout_img_phone = 'muscle_gain_plan_mobile.jpg';
        } elseif ($userInput['goal'] == 'endurance') {
            $this->workoutModel->workout_image = 'endurance_plan.jpg';
            $this->workoutModel->workout_img_phone = 'endurance_plan_mobile.jpg';
        } else {
            $this->workoutModel->workout_image = 'general_plan.jpg';
            $this->workoutModel->workout_img_phone = 'general_plan_mobile.jpg';
        }

        // Insert workout into the database
        $result = $this->workoutModel->insertWorkout();
        return $result;
    }

    /**
     * Fetch a single workout by ID
     * @param int $workout_id
     * @return array|bool
     */
    public function getWorkout($workout_id) {
        if (!is_numeric($workout_id) || $workout_id <= 0) {
            error_log("Invalid Workout ID provided: $workout_id");
            return false;
        }

        $result = $this->workoutModel->getWorkoutById($workout_id);

        if ($result) {
            return [
                'workout_id' => $this->workoutModel->workout_id,
                'workout_image' => $this->workoutModel->workout_image,
                'workout_img_phone' => $this->workoutModel->workout_img_phone
            ];
        }

        return false;
    }

    /**
     * Fetch all workouts from the database
     * @return array
     */
    public function getAllWorkouts() {
        $result = $this->workoutModel->getAllWorkouts();
        return $result;
    }
}

// Controller logic
$controller = new WorkoutController($conn);

// Fetch workout data (Example with static workout_id for demonstration)
$workout_id = $_GET['id'] ?? null;

if ($workout_id) {
    $workoutData = $controller->getWorkout($workout_id);

    if ($workoutData) {
        // Pass data to the view
        $workout_image = $workoutData['workout_image'];
        $workout_img_phone = $workoutData['workout_img_phone'];
        include 'app/views/workout/see_workout.php';
    } else {
        echo "Invalid Workout ID or Workout not found.";
    }
} else {
    echo "No Workout ID provided.";
}


?>