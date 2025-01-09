

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
