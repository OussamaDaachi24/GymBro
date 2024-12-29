<!DOCTYPE html>
<html>
<title>login</title>

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/png" href="">
  <meta name="viewport" content="width=device-width">
  <title> GymBro</title>
  <!--fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="http://localhost/GymBro/public/css/register.css" />
  <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
</head>

<body>

  <!--Header section-->
  <header class="head_Bar" id="#head">
    <div class="menu_bar"><img src="http://localhost/GymBro/public/assets/images/menu.png" /></div>
    <div class="logo">
      <a href="home.html">
        <img src="http://localhost/GymBro/public/assets/icons/logo.png" class="logo_img" /></a>
    </div>
    <ul class="navSections">
      <li><a href="home.html">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="static_exercise.html">myWorkouts</a></li>
      <li><a href="static_food.html">myMeals</a></li>
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
  <div class="Welcome-text-container">
    <h1 class="Welcome-text">Welcome <span>GymBro</span>!</h1>
  </div>

  <div class="login-text-container">
    <!--The container of everythiung except the button-->
    <div class="Basic-details-inputs-image-contaier">
      <!--Left side container-->
      <form id="registration-form" class="Basic-details-inputs-container" action="/GymBro/register" method="POST" enctype="multipart/form-data">
        <div class="Basic-details-text-container">
          <h1>Basic Details</h1>
        </div>
        <div class="input-container">
          <input class="inp-name" placeholder="Enter name" name="name" required>
        </div>
        <div class="input-container">
          <input class="inp-email" placeholder="Enter email" type="email" name="email" required>
        </div>
        <div class="input-container">
          <input type="password" class="pswd" placeholder="Enter Password" name="password" required>
        </div>
        <div class="input-container">
          <input type="password" class="confirm-pswd" placeholder="Confirm Password" name="confirm_password" required>
        </div>
      </form>
      <!--Right side container-->
      <div class="Image-container">
        <div class="Image-text-container">
          <h1>Image</h1>
        </div>
        <div class="Image-input-container">
          <label class="Image-input">
            <input form="registration-form" type="file" accept="image/*" name="file" style="display: none;" >
            <img src="http://localhost/GymBro/public/assets/images/PlusImage.png" alt="Upload Image" class="img_input">
          </label>

        </div>
      </div>
    </div>

    <div class="Submit-button-container">
    <button class="Submit-button" type="submit" form="registration-form">Submit</button>    </div>
    
  </div>
  <div class="log-in-container">  
                        <p>Already have an account? 
                            <a href="valid" class="log-in-link">log in!</a>
                        </p>
    </div>
  </div>
  
</body>
<script src="http://localhost/GymBro/public/javaScript/common.js"></script>
<script src="http://localhost/GymBro/public/javaScript/register.js"></script>

</html>