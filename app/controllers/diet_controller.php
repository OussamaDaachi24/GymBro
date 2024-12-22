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
    $error [];
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
    return error;
}

//1- calculate the calorie intake for the user
function calculate_calories($height, $curr_weight, $GOAL, $age) {
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
function split_meal_cals($calories,$meal_num){
    //1- the number of snakes
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
    //2- the amount of calories in each meal 
    $calories_for_meals=$calories-(370*$snack_num); // remove the snack calories
    $calorie_per_meal=floor($calories_for_meals/$meal_num);
    return $calorie_per_meal; // the calories per 1 meal 

}

//4- obtain the macros for each meal (snacks not included)
function macros_per_meal($macros,$meal_num){
    $macro_meal=new stdClass();
    if($meal_num==0){
        //throw an exception
    }
    $macro_meal->protein=($macro->protein)/$meal_num;
    $macro_meal->fat=($macro->fat)/$meal_num;
    $macro_meal->carbs=($macro->carbs)/$meal_num;
    return $macro_meal;

}


// THE MAIN FUNCTION : CREATE THE DIET

function create_diet(){
    //the user is logged
    if(!isset($_SESSION['logged_in'])){
        header('Location:/GymBro/login');
    }
    //2- validate the input data
    if($_SERVER['REQUEST_METHOD']!='POST'){
        header('Location: ....');
    }
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $ideal_weight=$_POST['ideal_weight'];
    $age=$_POST['age'];
    $meal_num=$_POST['meal_num'];
    $have_supplement=$_POST['supplements'] ;
    $goal=$_POST['goal'];
    
    //validating the errors
    $errors=valid_data($height,$weight,$ideal_weight,$age,$meal_num);
    if(count($errors)!=0){
        //store the errors
        //redirect it to the create page
        header('Location:......'); //not redirected yet
    }

    //input is valid --> create the diet

    // 1- define the variables

    //a- find the calories 
    $calories=calculate_calories($height,$weight,$goal,$meal_num);
    //b- obtain the macros
    $macros=obtain_macros($calories,$goal,$weight);
    //c- calories per meal
    $cal_per_meal=split_meal_cals($calories,$meal_num);
    //d- the macros for each meal
    $meal_macro=macros_per_meal($macros,$meal_num);

    //2- store the data into the data base
    // a) the diet table : total calories , number of meals , number of snacks
    // b) the meal table : calories per meal , type (meal/snack) , macros pe meal
    // c) the user table : height , weight , ideal_weight , age 
}