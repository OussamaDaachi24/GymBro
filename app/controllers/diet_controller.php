<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../models/diet_model.php";
require_once __DIR__ . "/../models/user_model.php";

//1- functions to validate the input

function valid_height($height){
    return (isset($height) && is_numeric($height) && $height>0 && $height<300);
}
function valid_weight($weight){
    return (isset($weight) && is_numeric($weight) && $weight>25 && $weight<200);
}
function valid_age($age){
    return (isset($age)&&$age>5 && $age<100);
}
function valid_meals_num($meal_num){
    return (isset($meal_num)&&$meal_num>=2 && $meal_num<7 );
}
//function to valid all the input data
function valid_data($height,$weight,$weight2,$age,$meal_num){
    $error = [];
    if(!valid_height($height)){
        array_push($error,"the height is not valid");
    }
    if(!valid_weight($weight)){
        array_push($error,"The height is not valid");
    }
    if(!valid_weight($weight2)){
        array_push($error,"the ideal weight is not valid");
    }
    if(!valid_age($age)){
        array_push($error,"the age is not valid");
    }
    if(!valid_meals_num($meal_num)){
        array_push($error,"the number of meals is not vvalid");
    }
    return $error;
}

//1- calculate the calorie intake for the user
function calculate_calories($height, $curr_weight, $GOAL, $age):int {
    
    // Calculate BMR 
    $BMR = $curr_weight * 10 + 6.25 * $height - 5 * $age + 5;
    
    // Calculate daily calorie intake based on activity level
    $intake = 1.4 * $BMR;
    
    // Determine the calorie intake based on the goal
    $total_cal = [
        'bulk' => $intake + 500,  
        'cut' => $intake - 500,   
        'healthy' => $intake     
    ];
    
    // Convert the goal to lowercase for consistency
    $goal = strtolower($GOAL);
    
    // Check if the goal exists in the total_cal array
    if (array_key_exists($goal, $total_cal)) {
        return $total_cal[$goal];
    } 
}

//2- split the calorie intake into the 3 main nutrients (macros)
function obtain_macros($calories,$goal,$weight){ 
    $macros=new stdClass();
    // 1- determine based on the fitness goal
    if(strtolower($goal)=='bulk'){
        $macros->protein=2.45*$weight*4;
        $macros->fat=$calories*25/100;
        $macros->carbs=$calories-$macros->protein-$macros->fat;
    }
    elseif(strtolower($goal)=='cut'){
        $macros->protein=2.8*$weight*4;
        $macros->fat=$calories*15/100;
        $macros->carbs=$calories-$macros->protein-$macros->fat;
    }
    else{
        $macros->protein=1.9*$weight*4;
        $macros->fat=$calories*25/100;
        $macros->carbs=$calories-$macros->protein-$macros->fat;
    }
    return $macros;
}

//3- find the calorie size for each meal (snacks not included)
function split_meal_cals($calories,$meal_num):int{
    //1- the number of snakes
    $snack_num=snacks_number($meal_num);
    //2- the amount of calories in each meal 
    $calories_for_meals=$calories-(370*$snack_num); // remove the snack calories
    $calorie_per_meal=floor($calories_for_meals/$meal_num);
    return $calorie_per_meal; // the calories per 1 meal 

}

function snacks_number($meal_num):int{
    $snack_num;
    if($meal_num<=4 && $meal_num>2){
        $snack_num=1;
    }
    elseif($meal_num>4){
        $snack_num=2;
    }
    else{
        $snack_num=0;
    }
    return $snack_num;
}

//4- obtain the macros for each meal (snacks not included)
function macros_per_meal($macros,$meal_num):object{
    $macro_meal=new stdClass();
    $macro_meal->protein=($macro->protein)/$meal_num;
    $macro_meal->fat=($macro->fat)/$meal_num;
    $macro_meal->carbs=($macro->carbs)/$meal_num;
    return $macro_meal;

}


// THE MAIN FUNCTION : CREATE THE DIET

function create_diet($conn){
    //the user is logged
    if(!isset($_SESSION['logged_in'])){
        header('Location:/GymBro/login');
    }
    //2- validate the input data
    if($_SERVER['REQUEST_METHOD']!='POST'){
        header('Location: ....');
    }
    mysqli_begin_transaction($conn); // Start transaction

  try {
    // Retrieve form data
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $ideal_weight = $_POST['ideal_weight'];
    $age = $_POST['age'];
    $meal_num = $_POST['meal_num'];
    $have_supplement = $_POST['supplements'];
    $goal = $_POST['goal'];
    $id = $_SESSION['user_id'];

    // Validate input data
    $errors = valid_data($height, $weight, $ideal_weight, $age, $meal_num);
    if (count($errors) != 0) {
        // Store errors in session and redirect back to the form
        $_SESSION['errors'] = $errors;
        header('Location: create_diet.php'); // Redirect to the form page
        exit(); // Stop further execution
    }

    // Input is valid --> create the diet

    // 1. Define the variables
    $calories = calculate_calories($height, $weight, $goal, $meal_num); // Integer
    $macros = obtain_macros($calories, $goal, $weight); // Object
    $cal_per_meal = split_meal_cals($calories, $meal_num); // Integer
    $meal_macro = macros_per_meal($macros, $meal_num); // Object: obj->protein/fat/carbs
    $snack_num = snacks_number($meal_num); // Integer
    $snack_cals = 370; // Fixed calorie value for snacks

    // 2. Insert the diet components
    if (!insert_diet($conn, $calories, $meal_num, $snack_num)) {
        throw new Exception("Failed to insert diet data.");
    }

    // 3. Retrieve the diet_id after insertion
    $diet_id = mysqli_insert_id($conn);

    // 4. Insert meals associated with the diet
    if (!insert_meal($conn, $cal_per_meal, $meal_macro->protein, $meal_macro->carbs, $meal_macro->fat, 'meal', $diet_id)) {
        throw new Exception("Failed to insert meal data.");
    }

    // 5. Insert snacks associated with the diet
    if (!insert_meal($conn, $snack_cals, $meal_macro->protein, $meal_macro->carbs, $meal_macro->fat, 'snack', $diet_id)) {
        throw new Exception("Failed to insert snack data.");
    }

    // 6. Insert user measures and associate the diet with the user
    if (!insert_user_measures($conn, $id, $height, $weight, $ideal_weight, $age, $diet_id)) {
        throw new Exception("Failed to insert user measures.");
    }

    // Commit the transaction if all operations succeed
    mysqli_commit($conn);

    // Redirect to success page or display success message
    header('Location: success_page.php');
    exit();
  } catch (Exception $e) {
    // Rollback the transaction in case of any error
    mysqli_rollback($conn);

    // Log the error or display it to the user
    error_log("Error: " . $e->getMessage());
    $_SESSION['error'] = "An error occurred. Please try again.";
    header('Location: create_diet.php'); // Redirect back to the form
    exit();
  }

}

function show_diet_program(){
    // check the login
    if(!isset($_SESSION['logged_in'])){
        header('Location:/GymBro/login');
    }
    //1- fetch the user data -> store them in array
    if(!isset($_SESSION['user_id'])){
        //exception
    }
    $user_id=$_SESSION['user_id'];
    /*fetch the diet data
    diet_data=[
    'diet': array containg diet components,
    'meal': array containing meal components (cals,macros,..),
    'snack': array of snacks data (can be empty if snack=0)
    ]
    */

    $diet_data=fetch_diet($user_id);
    //extract the data from the array / split it
    $diet_info=$diet_data['diet'];
    $meal_info=$diet_data['meal'];
    $snack_data=$diet_data['snack'];

    //2- include the diet view
    require_once __DIR__ . "/../views/diet/myMeals.php";
}