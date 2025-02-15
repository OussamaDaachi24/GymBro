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
  <script>
    const weightData = <?php echo json_encode($user_data['weights']); ?>;
  </script>
  <!--  Body section-->
  <body>
    

<header class="head_Bar" id="#head">
      <div class="menu_bar"><img src="http://localhost/GymBro/public/assets/images/menu.png"></div>
      <div class="logo">
        <a href="/GymBro/home">
          <img src="http://localhost/GymBro/public/assets/icons/logo.png" class="logo_img"
        /></a>
      </div>
      <?php 
      $state=isset($_SESSION['is_logged']) ? 'login' : 'logout';
      ?>
      <ul class="navSections" style='width=50%;'>
        <li><a href="/GymBro/home" class="current">Home</a></li>
        <li><a href="/GymBro/about">About</a></li>
        <li><a href="/GymBro/static_workout">myWorkouts</a></li>
        <li><a href="/GymBro/static_meals">myMeals</a></li>
        <li><a href="/GymBro/<?php echo $state; ?>"><?php echo $state; ?></a></li>
      </ul>
      <div class="profile">
        <a href="profile/view">
          <img src="http://localhost/GymBro/public/assets/icons/profile-circle.png" class="prof_img" />
        </a>
      </div>
    </header>

    <section class="mobile_options">
      <div class="options">
        <a href="/GymBro/home">Home</a>
        <a href="/GymBro/about">About</a>
        <a href="/GymBro/static_meals">My Meals</a>
        <a href="/GymBro/static_workout">My Workout </a>
      </div>
    </section>
    <section class="rest">
      <div class="prof_container">
        <div class="second-layer">
          <div class="personal_data">
            <h1>My Profile</h1>
            <div class="user_identifier">
              <div class="text_data">
                <?php if (isset($user_data['information'])): ?> <!--check that the user is logged -->
                <p>Name: <?php echo htmlspecialchars($user_data['information']['name']) ?></p>
                <p>Age: <?php echo htmlspecialchars($user_data['information']['age']) ?></p>
                <p>Email: <?php echo htmlspecialchars($user_data['information']['email']) ?></p>
              </div>
              <?php endif; ?>
              <div class="img_data">
              <?php
                  $profile_pic = isset($user_data['information']['profile_picture'])
                  ? strstr(htmlspecialchars($user_data['information']['profile_picture']), '\GymBro')  // Removed the leading slash
                   : '/GymBro/public/assets/images/default.jpg';  // Added leading slash for consistency
                ?>
                <?php $newPath = strstr($profile_pic, 'GymBro') ; ?>
                <img src="<?php echo $profile_pic; ?>" /> <!-- put the path variable in img -->
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
              <form class="input_weigth" method="POST" action="/GymBro/profile/update">
                <input
                  type="number"
                  placeholder="Submit your weekly weight"
                  min="25"
                  max="200"
                  name="weight"
                  required
                />
                <button type="submit">Enter</button>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>//passing the weight data (array of arrays) to the js file
    const full_weights = <?php echo json_encode($user_data['weights'] ?? [], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
    </script> 
    <script src="http://localhost/GymBro/public/javaScript/profile.js"></script>  <!--  Body section-->
    <script src="http://localhost/GymBro/public/javaScript/common.js"></script>

  </body>
  <script src="http://localhost/GymBro/public/javaScript/profile.js"></script>
  <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
</html>
