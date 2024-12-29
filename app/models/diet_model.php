<?php

// this model handles meal and diet tables

//1- function to insert the diet components
function insert_diet($conn, $total_cals, $meal_num, $snack_num, $user_id): bool {
    try {        
        $sql = "INSERT INTO diet (calories, num_meals, num_snacks) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) { // the preparation failed --> exception
            throw new Exception("Failed to prepare statement: " . mysqli_error($conn));
        }
        //bind the parametrs to the query
        if (!mysqli_stmt_bind_param($stmt, 'iii', $total_cals, $meal_num, $snack_num)) {
            throw new Exception("Parameter binding failed: " . mysqli_error($conn));
        }
        //execute the query
        if (!mysqli_execute($stmt)) {
            throw new Exception("Execute failed: " . mysqli_error($conn));
        }
        
        mysqli_stmt_close($stmt);
        return true; //succesful insertion
        
    } catch (Exception $e) {
        error_log("Error in insert_diet: " . $e->getMessage());
        throw new Exception("Failed to insert diet: " . $e->getMessage());
    }
}


//2- function to insert the meal component (meal/snack)
function insert_meal($conn, $cals, $protein, $carbs, $fat, $type, $diet_id) {
    try {
        
        $sql = "INSERT INTO meal (meal_calories, protein_calorie, carb_calorie, fat_calorie, type, diet_id) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . mysqli_error($conn));
        }
        
        if (!mysqli_stmt_bind_param($stmt, 'iiiisi', $cals, $protein, $carbs, $fat, $type, $diet_id)) {
            throw new Exception("Parameter binding failed: " . mysqli_error($conn));
        }
        
        if (!mysqli_execute($stmt)) {
            throw new Exception("Execute failed: " . mysqli_error($conn));
        }
        
        mysqli_stmt_close($stmt);
        return true;
        
    } catch (Exception $e) {
        error_log("Error in insert_meal: " . $e->getMessage());
        throw new Exception("Failed to insert meal: " . $e->getMessage());
    }
}

//3- function to fetch diet based on the user
function fetchUserDiet($conn, $user_id): ?array {
    try {
        // Diet query
        $diet_sql = "SELECT d.diet_id, d.calories, d.num_meals, d.num_snacks 
                    FROM diet d 
                    INNER JOIN user ud ON d.diet_id = ud.diet_id 
                    WHERE ud.user_id = ?";
        
        $diet_stmt = mysqli_prepare($conn, $diet_sql);
        if (!$diet_stmt) {
            throw new Exception("Failed to prepare diet statement: " . mysqli_error($conn));
        }

        if (!mysqli_stmt_bind_param($diet_stmt, 'i', $user_id)) {
            throw new Exception("Failed to bind diet parameters: " . mysqli_error($conn));
        }

        if (!mysqli_stmt_execute($diet_stmt)) {
            throw new Exception("Failed to execute diet query: " . mysqli_error($conn));
        }

        $diet_result = mysqli_stmt_get_result($diet_stmt);
        $diet_data = mysqli_fetch_assoc($diet_result);
        
        if (!$diet_data) {
            return null;
        }

        // Meals query
        $meal_sql = "SELECT meal_calories, protein_calorie, carb_calorie, fat_calorie 
                    FROM meal 
                    WHERE diet_id = ? AND type = 'meal'
                    ORDER BY meal_id";
        
        $meal_stmt = mysqli_prepare($conn, $meal_sql);
        if (!mysqli_stmt_bind_param($meal_stmt, 'i', $diet_data['diet_id'])) {
            throw new Exception("Failed to bind meal parameters");
        }
        if (!mysqli_stmt_execute($meal_stmt)) {
            throw new Exception("Failed to execute meal query");
        }
        
        $meal_result = mysqli_stmt_get_result($meal_stmt);
        $meals = [];
        while ($row = mysqli_fetch_assoc($meal_result)) {
            $meals[] = [
                'calories' => (int)$row['meal_calories'],
                'protein' => (int)$row['protein_calorie'],
                'carbs' => (int)$row['carb_calorie'],
                'fat' => (int)$row['fat_calorie']
            ];
        }

        // Snacks query
        $snack_sql = "SELECT meal_calories, protein_calorie, carb_calorie, fat_calorie 
                     FROM meal 
                     WHERE diet_id = ? AND type = 'snack'
                     ORDER BY meal_id";
        
        $snack_stmt = mysqli_prepare($conn, $snack_sql);
        if (!mysqli_stmt_bind_param($snack_stmt, 'i', $diet_data['diet_id'])) {
            throw new Exception("Failed to bind snack parameters");
        }
        if (!mysqli_stmt_execute($snack_stmt)) {
            throw new Exception("Failed to execute snack query");
        }
        
        $snack_result = mysqli_stmt_get_result($snack_stmt);
        $snacks = [];
        while ($row = mysqli_fetch_assoc($snack_result)) {
            $snacks[] = [
                'calories' => (int)$row['meal_calories'],
                'protein' => (int)$row['protein_calorie'],
                'carbs' => (int)$row['carb_calorie'],
                'fat' => (int)$row['fat_calorie']
            ];
        }

        mysqli_stmt_close($diet_stmt);
        mysqli_stmt_close($meal_stmt);
        mysqli_stmt_close($snack_stmt);

        return [
            'diet' => [
                'total_calories' => (int)$diet_data['calories'],
                'num_meals' => (int)$diet_data['num_meals'],
                'num_snacks' => (int)$diet_data['num_snacks']
            ],
            'meal' => $meals,
            'snack' => $snacks  
        ];

    } catch (Exception $e) {
        error_log("Error in fetchUserDiet: " . $e->getMessage());
        throw new Exception("Failed to fetch user diet: " . $e->getMessage());
    }
}





