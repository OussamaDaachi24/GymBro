<?php

// this model handles meal and diet tables

//1- function to insert the diet components
function insert_diet($conn,$total_cals,$meal_num,$snack_num,$user_id):bool{
    $sql="INSERT INTO diet (calories,num_meals,num_snacks)
    VALUES ( ?, ? , ?)";
    try{
        $stmt=mysqli_prepare($conn,$sql);
        if(!$stmt){
            error_log("Statement preparation failed: " . mysqli_error($conn));
        }
        mysqli_bind_param($stmt,'iii',$total_cals,$meal_num,$snack_num);
        $result=mysqli_execute($stmt);
        return $result;
    }
    catch (Exception $e) {
        error_log("Error in insert_diet: " . $e->getMessage());
        return false;
    }
}

//2- function to insert the meal component (meal/snack)
function insert_meal($conn,$cals,$protein,$carbs,$fat,$type,$diet_id){
    $sql="INSERT INTO meal (meal_calories ,protein_calories ,carb_calories ,fat_calories ,type ,diet_id)
    VALUES (? ,? ,? ,? ,? ,? ) ";
    try{
        //1-prepare the statement
        $stmt=mysqli_prepare($conn,$sql);
        if(!$stmt){
            error_log("Statement preparation failed: " . mysqli_error($conn));
        }
        //2- bind the parameters
        mysqli_bind_param($stmt,'iiiisi',$cals,$protein,$carbs,$fat,$type,$diet_id);
        //3- execute the query
        $result=mysqli_execute($stmt);
        return $result;
    }
    catch(Exception $e){
        error_log("Error in meal: " . $e->getMessage());
        return false;
    }
}

//3- function to fetch diet based on the user
function fetch_user_diet($conn,$user_id){
    
}




