<?php
require_once 'C:\xampp\htdocs\GymBro\config\db_connect.php';
class DietModel {
    private $conn;

    public function __construct($connection) {
        $this->conn = $this->connect_db();
    }

    /*
      Insert diet components into the diet table
  */
    public function insertDiet($total_cals, $meal_num, $snack_num): bool {
        try {
            $sql = "INSERT INTO diet (calories, num_meals, num_snacks) VALUES (?, ?, ?)";
            
            $stmt = mysqli_prepare($this->conn, $sql);
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . mysqli_error($this->conn));
            }

            if (!mysqli_stmt_bind_param($stmt, 'iii', $total_cals, $meal_num, $snack_num)) {
                throw new Exception("Parameter binding failed: " . mysqli_error($this->conn));
            }

            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Execute failed: " . mysqli_error($this->conn));
            }

            mysqli_stmt_close($stmt);
            return true;

        } catch (Exception $e) {
            error_log("Error in insertDiet: " . $e->getMessage());
            throw new Exception("Failed to insert diet: " . $e->getMessage());
        }
    }

    /*
      Insert meal/snack components into the meal table
    */
    public function insertMeal($cals, $protein, $carbs, $fat, $type, $diet_id): bool {
        try {
            $sql = "INSERT INTO meal (meal_calories, protein_calorie, carb_calorie, fat_calorie, type, diet_id) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = mysqli_prepare($this->conn, $sql);
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . mysqli_error($this->conn));
            }

            if (!mysqli_stmt_bind_param($stmt, 'iiiisi', $cals, $protein, $carbs, $fat, $type, $diet_id)) {
                throw new Exception("Parameter binding failed: " . mysqli_error($this->conn));
            }

            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Execute failed: " . mysqli_error($this->conn));
            }

            mysqli_stmt_close($stmt);
            return true;

        } catch (Exception $e) {
            error_log("Error in insertMeal: " . $e->getMessage());
            throw new Exception("Failed to insert meal: " . $e->getMessage());
        }
    }

    /**
     * Fetch diet and associated meal/snack data for a user
    */

    /* Fetch diet/meal/snack data for a user*/
    public function fetchUserDiet($user_id): ?array {
        try {
            //  diet 
            $diet_sql = "SELECT d.diet_id, d.calories, d.num_meals, d.num_snacks 
                        FROM diet d 
                        JOIN user_diet ud ON d.diet_id = ud.diet_id 
                        WHERE ud.user_id = ?";
            
            $diet_stmt = mysqli_prepare($this->conn, $diet_sql);
            if (!$diet_stmt) {
                throw new Exception("Failed to prepare diet statement: " . mysqli_error($this->conn));
            }

            mysqli_stmt_bind_param($diet_stmt, 'i', $user_id);
            mysqli_stmt_execute($diet_stmt);
            $diet_result = mysqli_stmt_get_result($diet_stmt);
            $diet_data = mysqli_fetch_assoc($diet_result);
            
            if (!$diet_data) {
                return null;
            }

            //  meals
            $meal_sql = "SELECT meal_calories, protein_calorie, carb_calorie, fat_calorie 
                        FROM meal 
                        WHERE diet_id = ? AND type = 'meal'
                        ORDER BY meal_id";
            
            $meal_stmt = mysqli_prepare($this->conn, $meal_sql);
            mysqli_stmt_bind_param($meal_stmt, 'i', $diet_data['diet_id']);
            mysqli_stmt_execute($meal_stmt);
            $meal_result = mysqli_stmt_get_result($meal_stmt);

            $meals = [];
            while ($row = mysqli_fetch_assoc($meal_result)) {
                $meals[] = [
                    'calories' => $row['meal_calories'],
                    'protein' => $row['protein_calorie'],
                    'carbs' => $row['carb_calorie'],
                    'fat' => $row['fat_calorie']
                ];
            }

            //  snacks
            $snack_sql = "SELECT meal_calories, protein_calorie, carb_calorie, fat_calorie 
                         FROM meal 
                         WHERE diet_id = ? AND type = 'snack'
                         ORDER BY meal_id";
            
            $snack_stmt = mysqli_prepare($this->conn, $snack_sql);
            mysqli_stmt_bind_param($snack_stmt, 'i', $diet_data['diet_id']);
            mysqli_stmt_execute($snack_stmt);
            $snack_result = mysqli_stmt_get_result($snack_stmt);

            $snacks = [];
            while ($row = mysqli_fetch_assoc($snack_result)) {
                $snacks[] = [
                    'calories' => $row['meal_calories'],
                    'protein' => $row['protein_calorie'],
                    'carbs' => $row['carb_calorie'],
                    'fat' => $row['fat_calorie']
                ];
            }

            mysqli_stmt_close($diet_stmt);
            mysqli_stmt_close($meal_stmt);
            mysqli_stmt_close($snack_stmt);

            // Return diet data
            return [
                'diet' => [
                    'total_calories' => $diet_data['calories'],
                    'num_meals' => $diet_data['num_meals'],
                    'num_snacks' => $diet_data['num_snacks']
                ],
                'meal' => $meals,
                'snack' => $snacks  
            ];

        } catch (Exception $e) {
            error_log("Error in fetchUserDiet: " . $e->getMessage());
            throw new Exception("Failed to fetch user diet: " . $e->getMessage());
        }
    }
}
