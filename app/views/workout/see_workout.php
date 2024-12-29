

  





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="" />
    <meta name="viewport" content="width=device-width" />
    <title>GymBro</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/see_workout.css" />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
  </head>

  <body>
    <header class="head_Bar" id="#head">
      <div class="menu_bar"><img src="http://localhost/GymBro/public/assets/images/menu.png" /></div>
      <div class="logo">
        <a href="home.html">
          <img src="http://localhost/GymBro/public/assets/icons/logo.png" class="logo_img" />
        </a>
      </div>
      <ul class="navSections">
        <li><a href="home.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="./static_exercise.html">myWorkouts</a></li>
        <li><a href="./static_food.html">myMeals</a></li>
      </ul>
      <div class="profile">
        <a href="./profile.html">
          <img src="http://localhost/GymBro/public/assets/icons/profile-circle.png" class="prof_img" />
        </a>
      </div>
    </header>
    <section class="mobile_options">
      <div class="options">
        <a href="./home.html">Home</a>
        <a href="./about.html">About</a>
        <a href="./static_food.html">My Meals</a>
        <a href="./static_exercise.html">My Workout </a>
      </div>
    </section>

    <h1>
      This page will only display the fetched workout image from the database, it's done for the moment
    </h1>
    
    <!-- Dynamically insert image paths -->
    <img id="workout-image" src="<?php echo $workout_image; ?>" alt="Workout Plan" />
    
    <!-- Add JavaScript for responsive image switch -->
    <script>
      window.onload = function() {
        changeImageBasedOnWidth();
      };

      window.onresize = function() {
        changeImageBasedOnWidth();
      };

      function changeImageBasedOnWidth() {
        var imgElement = document.getElementById('workout-image');
        var imagePath = window.innerWidth < 600 ? '<?php echo $workout_img_phone; ?>' : '<?php echo $workout_image; ?>';
        imgElement.src = imagePath;
      }
    </script>

  </body>
  <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
</html>



