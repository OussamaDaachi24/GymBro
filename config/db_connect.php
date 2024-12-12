<?php
function connect_db(){
    //1- define the parameters
    $user_name="gymbro_user";
    $user_password="gym123";
    $db_name="gymbro_db";
    $host="localhost";

    //2- set the connection
    $conn=new mysqli($host,$user_name,$user_password,$db_name);

    //3-check connection failure
    if(!$conn){
        die("Connection failed: " . $conn->connect_error);
    }

    //return the connection object
    return $conn;

}