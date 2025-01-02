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
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/home.css" />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
  </head>
  <!-- Link for chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!--  Body section-->
  <body>
    <header class="head_Bar" id="#head">
      <div class="menu_bar"><img src="http://localhost/GymBro/public/assets/images/menu.png"></div>
      <div class="logo">
        <a href="/GymBro/home">
          <img src="http://localhost/GymBro/public/assets/icons/logo.png" class="logo_img"
        /></a>
      </div>
      <ul class="navSections" style='width=50%;'>
        <li><a href="/GymBro/home" class="current">Home</a></li>
        <li><a href="/GymBro/about">About</a></li>
        <li><a href="/GymBro/static_workout">myWorkouts</a></li>
        <li><a href="/GymBro/static_meals">myMeals</a></li>
        <li><a href="/GymBro/login">login</a></li>
      </ul>
      <div class="profile">
        <a href="/GymBro/profile/view">
          <img src="http://localhost/GymBro/public/assets/icons/profile-circle.png" class="prof_img" />
        </a>
      </div>
    </header>
    <section class="mobile_options">
      <div class="options"><a href="./home.html" id="currMobile">Home</a>
        <a href="./about.html">About</a>
        <a href="./static_exercise.html">Workouts</a>
        <a href="./static_food.html"> Meals </a>
      </div>
      
     

    </section>
    <div class="main_page">
      <div class="quotes">
        <div class="get_program">
          Get your ultimate training <span>program</span> from +100 workouts
        </div>
        <div class="additional_txt">
          <div class="for_you">
            beginner and you don't know how to get you dream physic? You're on
            the rigth place!!
          </div>
          <a href="/GymBro/profile/view"><button class="explore_workout">Explore</button></a>
          <div class="check_board">Check your dashboard down here !</div>
          <div class="arrow">
            <a href="#dashboard">&#x2193</a>
          </div>
        </div>
      </div>
    </div>

    <section class="dashboard_cls" id="dashboard">
      <div class="container">
        <div class="start_profile_container">
          <h1>Reach your Weight goals and keep consistent </h1>
          <div class="checkpoint"><img src="http://localhost/GymBro/public/assets/images/iconoir_check-circle-solid.png"><p>Reach your Weight goal with weekly graph </p></div>
          <div class="checkpoint"><img src="http://localhost/GymBro/public/assets/images/iconoir_check-circle-solid.png"><p>Achieve your consistensy</p></div>
          <div class="checkpoint"><img src="http://localhost/GymBro/public/assets/images/iconoir_check-circle-solid.png"><p>Find the perfect exercises for every piece of equipment</p></div>
          <a href="/GymBro/login"><button class="start_profile">Get Started</button></a>
        </div>
        <div class="img_side">
          <img src="http://localhost/GymBro/public/assets/images/streak (2).png" class="chart_static">
          <img src="http://localhost/GymBro/public/assets/images/streak (1).png" class="streak_static">
        </div>
      </div>
    </section>

    <section class="sport_banner">
      <div class="banner_picture">
        <img
          src="http://localhost/GymBro/public/assets/images/Workout-Wallpaper-01-1600-x-843 1.png"
          class="cable_fly"
        />
        <img src="http://localhost/GymBro/public/assets/images/pxfuel (3) 1.png" class="empty_gym" />
        <img src="http://localhost/GymBro/public/assets/images/pxfuel (1) 1.png" class="pull_up" />
      </div>
      <div class="banner_txt">
        <p>Gear-Up for the perfect Workout</p>
        <ul>
          <li>
            <img src="http://localhost/GymBro/public/assets/images/iconoir_check-circle-solid.png" />Reach
            your fitness potential with the right methods
          </li>
          <li>
            <img src="http://localhost/GymBro/public/assets/images/iconoir_check-circle-solid.png" />Achieve
            your nutritional goals
          </li>
          <li>
            <img src="http://localhost/GymBro/public/assets/images/iconoir_check-circle-solid.png" />Find
            the perfect exercises for every piece of equipment
          </li>
        </ul>
      </div>
    </section>
    <section class="seeExercise">
      <div class="discover">
        <h2>Discover Exercises</h2>
        <div class="slide_arrow">
          <div class="back_arrow">
            <img src="http://localhost/GymBro/public/assets/images/blue-left-arrow-ellipse-updated.svg" class="left">
          </div>
          <div class="next_arrow">
            <img src="http://localhost/GymBro/public/assets/images/right_arr.svg" class="right">
          </div>
        </div>
      </div>
      <div class="exercise-groups" id="abdo">
        <!-- card 1  -->
        <div class="muscle_groups curr_class">
          <div class="muscle_img"><img class="img_muscle" src="http://localhost/GymBro/public/assets/images/abdominals.png"></div>
          <div class="check-exo">
            <a href="./static_exercise.html#abdo">
            <div class="content">
              <p>Exercises for</p>
              <h2>Abdominals</h2>
            </div>
            <div class="see-next"><img src="http://localhost/GymBro/public/assets/images/right_icon_blue.png"></div></a>
          </div>

        </div>
        <!-- card 2  -->
        <div class="muscle_groups" id="chest">
          <div class="muscle_img"><img src="http://localhost/GymBro/public/assets/images/abdominals.png"></div>
          <div class="check-exo"><a href="./static_exercise.html#chest">
            <div class="content">
              <p>Exercises for</p>
              <h2>Chest</h2>
            </div>
            <div class="see-next"><img src="http://localhost/GymBro/public/assets/images/right_icon_blue.png"></div></a>
          </div>

        </div>

        <!-- card 3  -->
        <div class="muscle_groups mob_hidden" id="back" >
          <div class="muscle_img"><img src="http://localhost/GymBro/public/assets/images/abdominals.png"></div>
          <div class="check-exo"><a href="./static_exercise.html#back">
            <div class="content">
              <p>Exercises for</p>
              <h2>Back</h2>
            </div>
            <div class="see-next"><img src="http://localhost/GymBro/public/assets/images/right_icon_blue.png"></div></a>
          </div>

        </div>

        <!-- card 4  -->
        <div class="muscle_groups mob_hidden" id="leg">
          <div class="muscle_img"><img src="http://localhost/GymBro/public/assets/images/abdominals.png"></div>
          <div class="check-exo"><a href="./static_exercise.html#leg">
            <div class="content">
              <p>Exercises for</p>
              <h2>Legs</h2>
            </div>
            <div class="see-next"><img src="http://localhost/GymBro/public/assets/images/right_icon_blue.png"></div></a>
          </div>

        </div> 
      </div>
      
      <div class="recipes">
        <div class="food_intro">
          <div>Every recipe with detailed calorie intake amount </div>
          <a href="./static_food.html"><button>See More</button></a>
        </div>
        <div class="recipe_section">
         <div class="recipe">
            <a href="./static_bulk.html"><div class="recipe_img" id="bghrir"></div></a>
            <div class="recipe_content">
              <div class="recipe_name">Baghrir</div>
              <div class="recipe_type">Bulk</div>
            </div>

          </div>

          <div class="recipe">
            <a href="./static_cut.html"><div class="recipe_img" id="gtaif"></div></a>
            <div class="recipe_content" >
              <div class="recipe_name">Rezzat El Kadi</div>
              <div class="recipe_type">Bulk</div>
            </div>

          </div>

          <div class="recipe">
            <a href="./static_healthy.html"><div class="recipe_img" id="pancakes"></div></a>
            <div class="recipe_content">
              <div class="recipe_name">Pancakes</div>
              <div class="recipe_type">Cut</div>
            </div>

          </div>

        </div>

        <!--Ai chat bot-->
        <script> window.chtlConfig = { chatbotId: "9142794298" } </script>
<script async data-id="9142794298" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>

      </div>
    </section>
    <script src="http://localhost/GymBro/public/javaScript/home.js"></script>
    <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
  </body>
</html>
