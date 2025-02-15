<?php

class Workout {
    // Database connection properties
    private $conn;
    private $table_name = 'workout';

    // Workout properties
    public $workout_id;
    public $workout_image;
    public $workout_img_phone;

    // Constructor
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // function to extract the workout by its name
    public function getWorkoutByName($workout_name) {
        try{
            // Prepare SQL query
            $query = "SELECT * FROM " . $this->table_name . " WHERE workout_image = ? LIMIT 1";
            $stmt= $this->conn->prepare($query);
            if(!$stmt){
                throw new Exception("Prepare failed: " . $stmt->error);
            }
            if(!$stmt->bind_param("s", $workout_name)){
                throw new Exception("Binding parameters failed: " . $stmt->error);
            }
            if(!$stmt->execute()){
                throw new Exception("Execute failed: " . $stmt->error);
            }
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }
        }catch(Exception $e){
            throw new Exception("Error in getting user workout name : " . $e->getMessage());
        }
        
    }
    //method to add the workout split to the user
    public function add_workout_to_user($user_id,$workout_id){
        try{
            $sql="UPDATE user SET workout_id = ? WHERE user_id = ?";
            $stmt = $this->conn->prepare($sql);
            if(!$stmt){
                throw new Exception("Prepare failed: " . mysqli_error($this->conn));
            }
            if(!$stmt->bind_param("ii", $workout_id, $user_id)){
                throw new Exception("Binding parameters failed: " . $stmt->error);
            }
            if(!$stmt->execute()){
                throw new Exception("Execute failed: " . $stmt->error);
            }
        }catch(Exception $exception){
            throw new Exception("Error in adding workout to user: " . $exception->getMessage());
        }
    }

    // function to obtain the specefic workout
    public function get_user_workout($user_id){
        try{
            $sql="SELECT workout_image , workout_img_phone FROM
            user INNER JOIN workout
            ON user.workout_id = workout.workout_id 
            WHERE user_id = ?";
            $stmt = $this->conn->prepare($sql);
            if(!$stmt){
                throw new Exception("Prepare failed: " . $stmt->error);
            }
            if(!$stmt->bind_param("i", $user_id)){
                throw new Exception("Binding parameters failed: " . $stmt->error);
            }
            if(!$stmt->execute()){
                throw new Exception("Execute failed: " . $stmt->error);
            }
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }
        }catch(Exception $e){
            throw new Exception("Error in getting user workout : " . $e->getMessage());
        }
    }


    // Method to get a single workout by ID
   /* public function getWorkoutById($workout_id) {
        // Prepare SQL query
        $query = "SELECT * FROM " . $this->table_name . " WHERE workout_id = ? LIMIT 1";

        // Prepare statement
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->conn->error);
            return false;
        }

        // Sanitize input
        $workout_id = htmlspecialchars(strip_tags($workout_id));

        // Bind parameter
        $stmt->bind_param("i", $workout_id);

        try {
            // Execute query
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch the row
            if ($row = $result->fetch_assoc()) {
                // Set object properties
                $this->workout_id = $row['workout_id'];
                $this->workout_image = $row['workout_image'];
                $this->workout_img_phone = $row['workout_img_phone'];
                $stmt->close();
                return true;
            }
            $stmt->close();
            return false;
        } catch (Exception $exception) {
            // Log or handle the error
            error_log("Workout retrieval error: " . $exception->getMessage());
            return false;
        }
    }*/

    // Method to insert a new workout --> no need for a function to insert the workouts
    //inserted manually
    /*
    public function insertWorkout() {
        // Prepare SQL query
        $query = "INSERT INTO " . $this->table_name . " 
                  (workout_image, workout_img_phone) 
                  VALUES (?, ?)";

        // Prepare statement
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->conn->error);
            return false;
        }

        // Sanitize input data
        $this->workout_image = htmlspecialchars(strip_tags($this->workout_image));
        $this->workout_img_phone = htmlspecialchars(strip_tags($this->workout_img_phone));

        // Bind parameters
        $stmt->bind_param("ss", $this->workout_image, $this->workout_img_phone);

        // Execute query
        try {
            if ($stmt->execute()) {
                // Get the ID of the last inserted record
                $this->workout_id = $this->conn->insert_id;
                $stmt->close();
                return true;
            }
            $stmt->close();
            return false;
        } catch (Exception $exception) {
            // Log or handle the error
            error_log("Workout insertion error: " . $exception->getMessage());
            return false;
        }
    }*/


    // Method to get all workouts
    public function getAllWorkouts() {
        // Select all query
        $query = "SELECT * FROM " . $this->table_name;

        // Prepare statement
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            error_log("Prepare failed: " . $this->conn->error);
            return [];
        }

        try {
            // Execute query
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch all rows
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data;
        } catch (Exception $exception) {
            // Log or handle the error
            error_log("Workouts retrieval error: " . $exception->getMessage());
            return [];
        }
    }
}
?>
