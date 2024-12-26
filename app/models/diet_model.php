<?php

require_once '..\GymBro\config\db_connect.php';



class DietModel {
    
    private $conn;

    // database connection
    public function __construct($connection) {
        $this->conn = $connection;
    }

    // Insert a new diet into the database
    public function insertDiet($calories, $num_meals, $num_snacks) {
        $query = "INSERT INTO diet (calories, num_meals, num_snacks) VALUES (?, ?, ?)";
        $stmt = $this->connect_db()->prepare($query);
        $stmt->bind_param("iii", $calories, $num_meals, $num_snacks);
        
        if ($stmt->execute()) {
            return $this->connect_db()->insert_id; 
        } else {
            throw new Exception("Error inserting diet: " . $stmt->error);
        }
    }

    // Insert a meal into the database
    public function insertMeal($diet_id, $meal_calories, $protein_calorie, $carb_calorie, $fat_calorie, $type) {
        $query = "INSERT INTO meal (diet_id, meal_calories, protein_calorie, carb_calorie, fat_calorie, type) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect_db()->prepare($query);
        $stmt->bind_param("iiiiis", $diet_id, $meal_calories, $protein_calorie, $carb_calorie, $fat_calorie, $type);

        if (!$stmt->execute()) {
            throw new Exception("Error inserting meal: " . $stmt->error);
        }
    }

    // Fetch a diet by ID
    public function getDietById($diet_id) {
        $query = "SELECT * FROM diet WHERE diet_id = ?";
        $stmt = $this->connect_db()->prepare($query);
        $stmt->bind_param("i", $diet_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); //associative array
    }

    // Fetch meals with a diet
    public function getMealsByDietId($diet_id) {
        $query = "SELECT * FROM meal WHERE diet_id = ?";
        $stmt = $this->connect_db()->prepare($query);
        $stmt->bind_param("i", $diet_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); //  associative array
    }
}




