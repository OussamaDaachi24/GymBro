<?php

// function to fetch user information for the profile
function select_user_info($id){
    global $conn;
    //1- sql query : obtain user data (name,email,age,picture)
    $sql="SELECT name , email , age , profile_picture FROM user 
            WHERE user_id=? ;";
    //2- prerate the query
    $stmt=mysqli_prepare($conn,$sql);
    if(!$stmt){
        die("the statement is not prepared" . mysqli_error($conn));
    }
    //3- bind the parameters
    mysqli_bind_param($stmt,'i',$id);
    //4- execute the query
    if(!mysqli_stmt_execute($stmt)){
        die("error when executing the query: " . mysqli_error($conn));
    }
    //5- obtain the result
    $result=mysqli_stmt_get_result($stmt);
    //6- store the result in associative array
    $row=mysqli_fetch_assoc($result); // -> $row contains name,age,email,...
    return $row;
}


// function to fetch user weights
function select_user_weights($id){
    global $conn;
    //1- sql query
    $sql="SELECT weight_val , taking_date FROM user
    INNER JOIN weight
    ON user.user_id = weight.user_id
    WHERE user.user_id=? ;";

    //2- prepare the query
    $stmt=mysqli_prepare($conn,$sql);
    if(!$stmt){
        die("error when preparing the statement : " . mysqli_error($conn));
    }
    //3- bind the parameters
    mysqli_stmt_bind_param($stmt,'i',$id);
    //4- execute the query
    if(!mysqli_stmt_execute($stmt)){
        die("error when executing the query : " . mysqli_error($conn));
    }
    //5- get the result set
    $result=mysqli_stmt_get_result($stmt);
    //6- fetch the result
    $user_weights=mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $user_weights;
}


// function to fetch user streak
function select_user_streak($id){
    global $conn;
    //1- sql query string
    $sql="SELECT start_date , state FROM streak
    INNER JOIN user 
    ON user.user_id = streak.user_id
    WHERE user.user_id = ? ;";
    //2- prepare the statement
    $stmt=mysqli_prepare($conn,$sql);
    if(!$stmt){
        die("error when preparing the statement : " . mysqli_error($conn));
    }
    //3-bind the id parameter
    mysqli_stmt_bind_param($stmt,'i',$id);
    //4-execute the query
    if(!mysqli_stmt_execute($stmt)){
        die("error when executing the query : " . mysqli_error($conn));
    }
    //5-obtain the result data
    $result=mysqli_stmt_get_result($stmt);
    //fetch all the data
    $streak=mysqli_fetch_assoc($result);
    //find the number of days
    $start_date = new DateTime($streak['start_date']);
    $today = new DateTime();
    $days = $start_date->diff($today)->days;

    return $days;
} 


// main function : select all user data to display in the profile
function select_user_data($id){
    $info=select_user_info($id); //1- the user info
    $weights=select_user_weights($id); //2- the user weights
    $streak=select_user_streak($id);
    return array(
        'information' => $info,
        'weights' => $weights,
        'streak' => $streak
    );

    
}


//function to update the user weight
function update_weight($id,$weight,$date){
    global $conn;
    //1-sql query
    $sql="INSERT INTO weight (user_id, weight_val , taking_weight)
    VALUES (? , ? , ? ) ;";
    //2- prepare the statements
    $stmt=mysqli_prepare($conn,$sql);
    if(!$stmt){
        die("error when preparing the statement : " . mysqli_error($conn));
    }
    //3- bind the parameters
    mysqli_stmt_bind_param($stmt,'iis',$id,$weight,$date);
    //4-execute the query
    $result=mysqli_stmt_execute($stmt);
    return $result;
}

