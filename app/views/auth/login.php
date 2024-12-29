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
       <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
        
       <link rel="stylesheet" href="http://localhost/GymBro/public/css/login.css" />
       <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
       
    </head>
    
       <body>
        <!--Header section-->
      
        <header class="head_Bar" id="#head">
              <div class="menu_bar"><img src="http://localhost/GymBro/public/assets/images/menu.png"></div>
              <div class="logo">
                <a href="/GymBro/home">
                  <img src="http://localhost/GymBro/public/assets/icons/logo.png" class="logo_img"
                /></a>
              </div>
              <ul class="navSections">
                <li><a href="/GymBro/home" class="current">Home</a></li>
                <li><a href="/GymBro/about">About</a></li>
                <li><a href="/GymBro/static_workout">myWorkouts</a></li>
                <li><a href="/GymBro/static_meals">myMeals</a></li>
              </ul>
              <div class="profile">
                <a href="profile/view">
                  <img src="http://localhost/GymBro/public/assets/icons/profile-circle.png" class="prof_img" />
                </a>
              </div>
        </header>

          <section class="mobile_options">
            <div class="options">
              <a href="./home.html">Home</a>
              <a href="./about.html">About</a>
              <a href="./static_food.html*">My Meals</a>
              <a href="./static_exercise.html">My Workout </a>
            </div>
          </section>

            

                    <!--the blue box container-->
                    <form id="login-form" onsubmit="return false;">
                      <div class="login-text-container">
                      <div class="Title-text-container">
                      <div class="Welcome-back-container">
                                <h1>Welcome Back <span>GymBro</span>!</h1>
                            </div>
                        </div>

                        <div class="login-container-khalil">
                            <div class="inputs-container-khalil">
                        <div class="email-container-khalil">
                            <input id="email" name="email" class="email-input-khalil" type="email" placeholder="Enter email" required>
                        </div>

                        <div class="password-container-khalil">
                            <input id="password" name="password" class="password-input-khalil" type="password" placeholder="Enter password" required>
                        </div>
                    </div>
                    
                    <div class="login-button-container-khalil">
                        <button type="submit" id="login-button" class="login-button-khalil">Login</button>
                    </div>
                    
                    <div class="register-now-container">
                        <p>Don't have an account? 
                            <a href="create" class="register-link">Register now</a>
                        </p>
                    </div>

                    <!-- Add error message container -->
                    <div id="error-message" class="error-message" style="display: none; color: red; margin-top: 10px;"></div>
                </div>
            </div>
</form>
                      

            </div>
        </div>
        <?php if (isset($_SESSION['error'])): ?>
          <div class="error-message">
            <?php echo htmlspecialchars($_SESSION['error']); ?>
            <?php unset($_SESSION['error']); ?>
          </div>
        <?php endif; ?>
       </body>
        <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
        <script src="http://localhost/GymBro/public/javaScript/login.js"></script>
</html>