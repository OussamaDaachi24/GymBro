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
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/static_food.css" />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
  </head>
  <!-- Link for chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!--  Body section-->
  <body>
  <?php 
    include 'header.php';
    ?>
    <section class="mobile_options">
      <div class="options">
        <a href="./home.html">Home</a>
        <a href="./about.html">About</a>
        <a href="./static_food.html" id="currMobile">My Meals</a>
        <a href="./static_exercise.html">My Workout </a>
      </div>
    </section>
    <section class="meals">
      <div class="meals_title">
        <h1>Discover everyday's <span>Meals</span></h1>
      </div>
      <a href="/GymBro/static_bulk">
      <div class="meal_types">
        <div class="type" id="split1">
           Bulk
        </div></a>
        <a href="./static_cut.html"><div class="type" id="split2">Cut</div></a>
        <a href="./static_healthy.html"><div class="type" id="split3" style="color:green">Healthy</div></a>
      </div>
    </section>
  </body>
  <script> window.chtlConfig = { chatbotId: "9142794298" } </script>
<script async data-id="9142794298" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
  <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
</html>
