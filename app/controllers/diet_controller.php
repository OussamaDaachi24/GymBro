<?php
require_once __DIR__ . "/../models/diet_model.php";
require_once __DIR__ . "/../models/user_model.php";

//1- functions to validate the input

function valid_height($height){
    return (isset($age) && $height>0 && $height<300);
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

function valid_data($height,$weight,$weight2,$age,$meal_num){
    $error;
    if(!valid_height($height)){
        array_push($error,"the height is not valid");
    }
    if(!valid_weight($weight)){
        array_push($error,"The height is not valid");
    }
    if(!valid_height($height2)){
        array_push($error,"the ideal array is nt valid");
    }
    if(!valid_age($age)){
        array_push($error,"the age is not valid");
    }
    if(!valid_meals_num($meal_num)){
        array_push($error,"the number of meals is not vvalid");
    }
    return error;
}

function create_diet(){
    //the user is logged
    if(!isset($_SESSION['logged_in'])){
        header('Location:/GymBro/login');
    }
    //2- validate the input data
    if($_SERVER['REQUEST-METHOD']!='POST'){
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
}

//functions to prepare the program
function calculate_calories($height, $curr_weight, $idealWeight, $GOAL, $age) {
    // Calculate BMR (Basal Metabolic Rate)
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


function obtain_macros($calories,$goal,$weight){ //split the calorie intake into the 3 main nutrients
    $macros=new stdClass();
    // 1- determine based on the fitness goal
    if(strtolower($goal)=='bulk'){
        $macros->protein=2.45*$weight*4;
        $macros->fat=$calories*25/100;
        $macros->carbs=$calories-$$macros->protein-$macros->fat;
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

