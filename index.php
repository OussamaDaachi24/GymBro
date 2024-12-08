<?php
session_start(); 

// Get the requested path
$path = $_SERVER['REQUEST_URI']; //the url after "localhost" starting with '/'
echo $path;

// Basic routing logic
switch ($path) {
    case '/GymBro/app/views/profile/':
        // Redirect to the profile page
        header('Location: /GymBro/app/views/profile/profile.php');
        exit;
    default:
        // Handle other routes or display a default message
        echo "";
        break;
}
?>