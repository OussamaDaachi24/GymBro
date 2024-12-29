<?php

// function to fetch user information for the profile

function select_user_info($conn, $id) {
    try { //try block to hunt exceptions
        // 1-check if the user_id is valid
        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("Invalid user ID provided");
        }
        // 2- sql query
        $sql = "SELECT name, email, age, profile_picture FROM user WHERE user_id = ?";
        //3- prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) { // not prepared ->exception
            throw new Exception("Statement preparation failed: " . mysqli_error($conn));
        }
        //not bound statement -> exception
        if (!mysqli_stmt_bind_param($stmt, 'i', $id)) {
            throw new Exception("Parameter binding failed: " . mysqli_error($conn));
        }
        //statement not executed -> exception
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Query execution failed: " . mysqli_error($conn));
        }
        //store the result of the query in variable (name,email,age,profile_picture)
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        
        if (!$row) {
            throw new Exception("No user found with ID: " . $id);
        }
        
        mysqli_stmt_close($stmt);
        return $row;
        
    } catch (Exception $e) {
        error_log("Error in select_user_info: " . $e->getMessage());
        throw $e;
    }
}

// function to fetch user weights
function select_user_weights($conn, $id) {
    try {
        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("Invalid user ID provided");
        }
        //retrieve all the weigth records in ascending order
        $sql = "SELECT weight_val, taking_date FROM user 
                INNER JOIN weight ON user.user_id = weight.user_id 
                WHERE user.user_id = ?
                ORDER BY weight.taking_date ";
        
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            throw new Exception("Statement preparation failed: " . mysqli_error($conn));
        }
        
        if (!mysqli_stmt_bind_param($stmt, 'i', $id)) {
            throw new Exception("Parameter binding failed: " . mysqli_error($conn));
        }
        
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Query execution failed: " . mysqli_error($conn));
        }
        
        $result = mysqli_stmt_get_result($stmt);
        $user_weights = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // $user_weights is an array contains thr rows as elements :
        // $user_weights[0] = ['weight_val' => 70, 'taking_date'] => 2023-07-01
        
        mysqli_stmt_close($stmt);
        return $user_weights;
        
    } catch (Exception $e) {
        error_log("Error in select_user_weights: " . $e->getMessage());
        throw $e;
    }
}

//function to insert a new weight
function insert_new_weigth($conn,$user_id,$weight_val){
    try{
        $sql="INSERT INTO weight (weight_val , taking_date , user_id)
        VALUES ( ? , ? , ? )";
        $stmt=mysqli_prepare($conn,$sql);
        if(!$stmt){
            throw new Exception(" Error when preparing the statement : " . mysqli_error($conn));
        }
        $curr_date=date('Y-m-d');
        if(!mysqli_stmt_bind_param($stmt,'isi',$weight_val,$curr_date,$user_id)){
            throw new Exception(" Error in binding the parameters : " . mysqli_error($conn));
        }
        if(!mysqli_stmt_execute($stmt)){
            throw new Exception("Error in executing the statement : " . mysqli_error($conn));
        }
        mysqli_stmt_close($stmt);
        return true;
    }catch(Exception $e){
        throw new Exception(" Error in inserting the weight : " . $e->getMessage());
        return false;
    }
}


// function to fetch user streak
function select_user_streak($conn, $id) {
    try {
        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("Invalid user ID provided");
        }

        $sql = "SELECT start_date, state FROM streak 
                INNER JOIN user ON user.user_id = streak.user_id 
                WHERE user.user_id = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            throw new Exception("Statement preparation failed: " . mysqli_error($conn));
        }
        
        if (!mysqli_stmt_bind_param($stmt, 'i', $id)) {
            throw new Exception("Parameter binding failed: " . mysqli_error($conn));
        }
        
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Query execution failed: " . mysqli_error($conn));
        }
        
        $result = mysqli_stmt_get_result($stmt);
        $streak = mysqli_fetch_assoc($result);
        
        if (!$streak) {
            throw new Exception("No streak found for user: " . $id);
        }
        
        $start_date = new DateTime($streak['start_date']);
        $today = new DateTime();
        $days = $start_date->diff($today)->days;
        
        mysqli_stmt_close($stmt);
        return $days; //int
        
    } catch (Exception $e) {
        error_log("Error in select_user_streak: " . $e->getMessage());
        throw $e;
    }
}


// main function : select all user data to display in the profile
function select_user_data($conn, $id) {
    try {
        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("Invalid user ID provided");
        }

        $info = select_user_info($conn, $id);
        $weights = select_user_weights($conn, $id);
        $streak = select_user_streak($conn, $id);
        
        return array(
            'information' => $info,
            'weights' => $weights,
            'streak' => $streak
        );
        
    } catch (Exception $e) {
        error_log("Error in select_user_data: " . $e->getMessage());
        throw $e;
    }
}




//function to insert the streak: initialize the streak: start_date=latest_daty=Current(), duration=0
function insert_streak($conn, $user_id) {
    $currentDate = date('Y-m-d');
    $duration = 0;
    $state = 'ACTIVE';

    try {
        // SQL query
        $sql = "INSERT INTO streak (start_date, end_date, state, duration, user_id) 
                VALUES (?, ?, ?, ?, ?)";
        
        // Prepare statement
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            throw new Exception("Error when preparing the statement: " . mysqli_error($conn));
        }

        // Bind parameters - state is string (s), duration and user_id are integers (i)
        if (!mysqli_stmt_bind_param($stmt, 'sssis', $currentDate, $currentDate, $state, $duration, $user_id)) {
            throw new Exception("Error in binding the statement: " . mysqli_error($conn));
        }

        // Execute query
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error in executing the statement: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);
        return true;

    } catch (Exception $e) {
        throw new Exception("Error in insert_streak: " . $e->getMessage());
    }
}


//function to update the streak : update the duration and latest access day
function increment_streak($conn,$user_id,$start_date){
    $currentDate = new DateTime(date('Y-m-d'));
    $startDate = new DateTime($start_date); // the start date of th streak
    $duration = $currentDate->diff($startDate)->days;// the difference
    try{
        $sql="UPDATE streak SET
        duration = ? ,
        end_date = ? 
        WHERE user_id = ?"; //end_date--> last access date of the user
        //1- prepare the statement
        $stmt=mysqli_prepare($conn,$sql);
        if(!$stmt){
            throw new Exception("Error when preparing the statement :" . mysqli_error($conn));
        }
        //2- bind the parameters
        $curr_date=date('Y-m-d');
        if(!mysqli_stmt_bind_param($stmt,"isi",$duration,$curr_date,$user_id)){
            throw new Exception("Error when binding the parametrs : " . mysqli_error($conn));
        }
        //3-execute the query
        if(!mysqli_stmt_execute($stmt)){
            throw new Exception("Error in executing the statement : " . mysqli_error($conn));
        }
        mysqli_stmt_close($stmt);
    }catch(Exception $e){
        throw new Exception("Error in incrementing the streak : " . $e->getMessage());
    }
}

//function to obtain the streak (start_date / state / end_date)
function get_streak($conn,$user_id){
    try{
        $sql="SELECT start_date , state , end_date FROM streak WHERE user_id = ?";
         $stmt=mysqli_prepare($conn,$sql);
        if(!$stmt){
            throw new Exception("Error when preparing the statement : " . mysqli_error($conn));
        }
        if(!mysqli_stmt_bind_param($stmt,"i",$user_id)){
            throw new Exception("Error in binding the parameters : " . mysqli_error($conn));
        }
        if(!mysqli_stmt_execute($stmt)){
            throw new Exception("Error in executing the statement : " . mysqli_error($conn));
        }
        // Bind the result variables
        mysqli_stmt_bind_result($stmt, $start_date, $state,$end_date);

        // Fetch the result
        if (mysqli_stmt_fetch($stmt)) {
            mysqli_stmt_close($stmt);
            // Return the fetched data as an associative array
            return [
                'start_date' => $start_date,
                'state' => $state,
                'end_date' => $end_date
            ];
        } else {
            throw new Exception("Error in fetching the streak : " . mysqli_error($conn));
        }
        mysqli_stmt_close($stmt);
    }catch(Exception $e){
        throw new Exception("Error in getting the streak : " . $e->getMessage());
    }
}

//function to initialize the streak
function initialize_streak($conn,$user_id){
    $currentDate = date('Y-m-d');
    $duration = 0;
    $state='ACTIVE';
    try{
        //1-sql query
        $sql="UPDATE streak SET
        duration = ? ,
        start_date = ? ,
        end_date = ? ,
        state = ? 
        WHERE user_id = ?";
        //2- prepare the statement
        $stmt=mysqli_prepare($conn,$sql);
        if(!$stmt){
            throw new Exception("Error when preparing the statement : ". mysqli_error($conn));
        }
        //3- bind the parameters
        if(!mysqli_stmt_bind_param($stmt,'isssi',$duration,$currentDate,$currentDate,$state,$user_id)){
            throw new Exception("Error in binding the statement : " . mysqli_error($conn));
        }
        //4- execute the query
        if(!mysqli_stmt_execute($stmt)){
            throw new Exception("Error in executing the statement: " . mysqli_error($conn));
        }
        mysqli_stmt_close($stmt);
    }catch(Exception $e){
        throw new Exception("Error in initialize streak : " .$e->getMessage());
    }
}
//function to end the streak
function end_streak($conn,$user_id,$start_date,$end_date ){
    try{
        $currentDate = new DateTime(date('Y-m-d'));
        $startDate = new DateTime($start_date);
        $last_access_day=new DateTime($end_date);

        //calculate the current duration  --> expected
        $duration = $currentDate->diff($startDate)->days;

        // calculate the streak of the last access to the app --> real 
        $prv_streak = $last_access_day->diff($startDate)->days;

        // compare 
        if($duration > $prv_streak+1){
            initialize_streak($conn,$user_id);
        }
    }
    catch(Exception $e){
        throw new Exception("Error when ending the streak : " . $e->getMessage());
    }
}


//function to insert user additional features
function insert_user_measures($conn,$height , $weight , $ideal_weight , $age ,$diet_id,$user_id){
    $sql="UPDATE user
         SET height = ? ,
         weight = ? ,
         age = ? ,
         ideal_weight = ? ,
         diet_id = ?  
         WHERE user_id = ? ";
    try{
        $stmt=mysqli_prepare($conn,$sql);
        if(!$stmt){
            throw new Exception("Error in peparing the statement" . mysqli_error($conn));
        }
        if(!mysqli_stmt_bind_param($stmt,"iiiiii",$height,$weight,$age,$ideal_weight,$diet_id,$user_id)){
            throw new Exception("Error in binding the parameters : " . mysqli_error($conn));
        }
        if(!mysqli_stmt_execute($stmt)){
            throw new Exception("Error in executing the statement : " . mysqli_error($conn));
        }
        mysqli_stmt_close($stmt);
    }catch(Exception $e){
        throw new Exception($e->getMessage());
    }
}


