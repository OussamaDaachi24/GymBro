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
function fetch_user_diet($conn,$user_id){
    RETURN null;
}




