<?php

// Start session and include necessary controllers
session_start();
require_once __DIR__ . "/app/controllers/auth_controller.php";

// Get the current request URI
$full_path = $_SERVER['REQUEST_URI'];

// Remove the base directory (/GymBro/) from the URI
$base_path = "/GymBro/";
$path = substr($full_path, strlen($base_path));

// Define route mappings (path => file)
$routes = [
    "" => __DIR__ . "/app/views/home/home.php", // Default route
    "home" => __DIR__ . "/app/views/home/home.php",
    "about" => __DIR__ . "/app/views/static/about.php",
    "static_workout" => __DIR__ . "/app/views/static/static_exercise.php",
    "static_meals" => __DIR__ . "/app/views/static/static_food.php",
    "profile/view" => __DIR__ . "/app/views/profile/profile.php",
    "login" => "login", // Special case for controller function
];

// Route the request
if (array_key_exists($path, $routes)) {
    if ($path == "login") {
        login(); // Call login function directly
    } else {
        include_once $routes[$path]; // Include the corresponding view
    }
} else {
    // Handle unmatched routes
    include_once __DIR__ . "/app/views/static/not_found.php";
}

?>
