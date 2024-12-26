<?php
// 1- the router script
require_once 'router.php';

//2- start the session
//session_start(); 
//3- obtain the url
$url=$_SERVER['REQUEST_URI'];
//4- routing the request
route($url);

