<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GymBro</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/profile.css" />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
  </head>
  <!-- Link for chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!--  Body section-->
  <body>
    <header class="head_Bar" id="#head">
      <div class="menu_bar"><img src="http://localhost/GymBro/public/assets/images/menu.png" /></div>
      <div class="logo">
        <a href="home.html">
          <img src="http://localhost/GymBro/public/assets/icons/logo.png" class="logo_img"
        /></a>
      </div>
      <ul class="navSections">
        <li><a href="home">Home</a></li>
        <li><a href="about">About</a></li>
        <li><a href="./static_workout">myWorkouts</a></li>
        <li><a href="./static_meals">myMeals</a></li>
      </ul>
      <div class="profile">
        <a href="./profile.html">
          <img src="http://localhost/GymBro/public/assets/icons/profile_blue.png" class="prof_img" />
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
    <section class="rest">
      <div class="prof_container">
        <div class="second-layer">
          <div class="personal_data">
            <h1>My Profile</h1>
            <div class="user_identifier">
              <div class="text_data">
                <p>Name: Oussama</p>
                <p>Age: 19 yo</p>
                <p>Email: oussama1932@gmail.com</p>
              </div>
              <div class="img_data">
                <img src="http://localhost/GymBro/public/assets/images/pancake.webp" />
              </div>
            </div>
            <div class="visit_page">
              <a href="./MyMeals.html">
                <button class="diet_btn">My Diet</button></a
              >
              <a href="./see_workout.html">
                <button class="gym_btn">My Workout</button></a
              >
            </div>
          </div>

          <div class="streak_chart">
            <div class="line-chart">
              <p>Dashboard</p>
              <canvas id="progressChart"></canvas>
              <form class="input_weigth">
                <input
                  type="number"
                  placeholder="Submit your weekly weight"
                  min="25"
                  max="200"
                />
                <button>Enter</button>
              </form>
            </div>
            <div class="streak">
              <div class="flame">
                <h2>Daily Streak</h2>
                <img src="http://localhost/GymBro/public/assets/images/flame 1.png" />
              </div>
              <div class="streak_days">
                <div>
                  <img src="http://localhost/GymBro/public/assets/images/Group 102.png" />
                  <p>Tue</p>
                </div>
                <div>
                  <img src="http://localhost/GymBro/public/assets/images/Group 102.png" />
                  <p>Wed</p>
                </div>
                <div>
                  <img src="http://localhost/GymBro/public/assets/images/Group 102.png" />
                  <p>Thu</p>
                </div>
                <div>
                  <img src="http://localhost/GymBro/public/assets/images/DaysProgress.png" />
                  <p>Fri</p>
                </div>
                <div>
                  <img src="http://localhost/GymBro/public/assets/images/DaysProgress.png" />
                  <p>Sat</p>
                </div>
                <div>
                  <img src="http://localhost/GymBro/public/assets/images/DaysProgress.png" />
                  <p>Sun</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
  <script src="http://localhost/GymBro/public/javaScript/profile.js"></script>
  <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
</html>
