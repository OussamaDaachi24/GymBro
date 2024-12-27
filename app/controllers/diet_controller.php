<?php
require_once __DIR__ . "/../models/diet_model.php";
require_once __DIR__ . "/../models/user_model.php";

//validation functions

function valid_height($height) {
    if (!isset($height) || !is_numeric($height) || $height <= 0 || $height >= 300) {
        throw new Exception("Height must be between 0 and 300 cm");
    }
    return true;
}

function valid_weight($weight) {
    if (!isset($weight) || !is_numeric($weight) || $weight <= 25 || $weight >= 200) {
        throw new Exception("Weight must be between 25 and 200 kg");
    }
    return true;
}

function valid_age($age) {
    if (!isset($age) || $age <= 5 || $age >= 100) {
        throw new Exception("Age must be between 5 and 100 years");
    }
    return true;
}

function valid_meals_num($meal_num) {
    if (!isset($meal_num) || $meal_num < 2 || $meal_num >= 7) {
        throw new Exception("Number of meals must be between 2 and 6");
    }
    return true;
}

function valid_data($height, $weight, $weight2, $age, $meal_num) {
    $errors = []; //array to store teh errors from the validation functions
    
    try {
        valid_height($height);
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
    
    try {
        valid_weight($weight);
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
    
    try {
        valid_weight($weight2);
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
    
    try {
        valid_age($age);
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
    
    try {
        valid_meals_num($meal_num);
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
    
    return $errors;
} // return the array of errors

function calculate_calories($height, $curr_weight, $GOAL, $age): int {
    try {
        $BMR = $curr_weight * 10 + 6.25 * $height - 5 * $age + 5; 
        $intake = 1.4 * $BMR;
        
        $total_cal = [ //calories needed based on the goal
            'bulk' => $intake + 500,
            'cut' => $intake - 500,
            'healthy' => $intake
        ];
        
        $goal = strtolower($GOAL);
        
        if (!array_key_exists($goal, $total_cal)) { //check if the goal is valid (is a key of the array)
            throw new Exception("Invalid goal type specified");
        }
        
        return $total_cal[$goal]; //the total calories (base + goal)
    } catch (Exception $e) {
        throw new Exception("Error calculating calories: " . $e->getMessage());
    }
}

function create_diet($conn) {
    //1- check login
    if (!isset($_SESSION['logged_in'])) {
        throw new Exception("User not authenticated");
    }
    //2- check the request (Data are sent or not)
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        throw new Exception("Invalid request method");
    }
    
    mysqli_begin_transaction($conn); //transaction -> to insert the diet and and get its id
    
    //3- get the data
    try {
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $ideal_weight = $_POST['ideal_weight'];
        $age = $_POST['age'];
        $meal_num = $_POST['meal_num'];
        $have_supplement = $_POST['supplements'];
        $goal = $_POST['goal'];
        $id = $_SESSION['user_id'];
        
        //validate the data
        $errors = valid_data($height, $weight, $ideal_weight, $age, $meal_num);
        if (count($errors) > 0) {
            throw new Exception(implode(", ", $errors));
        }
        
        //4- calculate the attributes to store
        $calories = calculate_calories($height, $weight, $goal, $age);
        $macros = obtain_macros($calories, $goal, $weight);
        $cal_per_meal = split_meal_cals($calories, $meal_num);
        $meal_macro = macros_per_meal($macros, $meal_num);
        $snack_num = snacks_number($meal_num);
        
        //5- insert the diet
        if (!insert_diet($conn, $calories, $meal_num, $snack_num)) {
            throw new Exception("Failed to insert diet");
        }
        //get the diet_id
        $diet_id = mysqli_insert_id($conn);
        
        //insert the meals (1 meal that will be repeated)
        if (!insert_meal($conn, $cal_per_meal, $meal_macro->protein, $meal_macro->carbs, $meal_macro->fat, 'meal', $diet_id)) {
            throw new Exception("Failed to insert meals");
        }
        //insert the snacks(if there are any)
        if ($snack_num > 0) {
            if (!insert_meal($conn, 370, $meal_macro->protein, $meal_macro->carbs, $meal_macro->fat, 'snack', $diet_id)) {
                throw new Exception("Failed to insert snacks");
            }
        }
        
        // insert the user measures (height,weigth,age,diet_id as f-key)
        if (!insert_user_measures($conn, $id, $height, $weight, $ideal_weight, $age, $diet_id)) {
            throw new Exception("Failed to insert user measures");
        }
        
        mysqli_commit($conn);
        return true; //the insertion is successful
        
    } catch (Exception $e) {
        mysqli_rollback($conn);
        throw new Exception("Diet creation failed: " . $e->getMessage());
    }
}

// function to display the diet & meals for the user

function show_diet_program() {
    try {
        if (!isset($_SESSION['logged_in'])) {
            throw new Exception("User not authenticated");
        }
        
        if (!isset($_SESSION['user_id'])) {
            throw new Exception("User ID not found");
        }
        
        $user_id = $_SESSION['user_id'];
        $diet_data = fetch_diet($user_id);
        
        if (!$diet_data) {
            throw new Exception("No diet plan found");
        }
        
        require_once __DIR__ . "/../views/diet/myMeals.php";
        
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage(); // the errors session will be displayed in the error page
        header('Location: /../views/static/not_found.php');
        exit();
    }
}
