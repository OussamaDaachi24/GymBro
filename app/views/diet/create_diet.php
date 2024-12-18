<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymBro - Customize Diet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/create_diet.css">
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css">
</head>
<body>
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
      <div class="options"><a href="./home.html" id="currMobile">Home</a>
        <a href="./about.html">About</a>
        <a href="./static_exercise.html">Workouts</a>
        <a href="./static_food.html"> Meals </a>
      </div>
    </section>
    <div class="container">
        <div class="form-wrapper">
            <div class="step-indicator">
                <div class="step active">1</div>
                <div class="line"></div>
                <div class="step">2</div>
                <div class="line"></div>
                <div class="step">3</div>
            </div>

            <form  action="/GymBro/diet/create" method="POST">
                <!-- Step 1: Basic Details -->
                <div id="step1" class="form-section active">
                    <h2 class="form-title">Basic Details</h2>
                    <div class="input-group">
                        <label for="height">Height (cm)</label>
                        <input name="height" type="number" id="height" name="height" class="input-control" placeholder="Enter your height" required min="50" max="250">
                    </div>
                    <div class="input-group">
                        <label for="current-weight">Current Weight (kg)</label>
                        <input name="curr_weight" type="number" id="current-weight" name="current_weight" class="input-control" placeholder="Enter current weight" required min="20" max="300">
                    </div>
                    <div class="input-group">
                        <label for="ideal-weight">Ideal Weight (kg)</label>
                        <input name="ideal_weight" type="number" id="ideal-weight" name="ideal_weight" class="input-control" placeholder="Enter ideal weight" required min="20" max="300">
                    </div>
                    <div class="input-group">
                        <label for="age">Age</label>
                        <input name="age" type="number" id="age" name="age" class="input-control" placeholder="Enter your age" required min="12" max="120">
                    </div>
                    <button type="button" class="btn-next" onclick="nextStep()">Next</button>
                </div>

                <!-- Step 2: Nutrition -->
                <div id="step2" class="form-section">
                    <h2 class="form-title">Nutrition</h2>
                    <div class="input-group">
                        <label>Meals per Day</label>
                        <div class="meal-counter">
                            <button type="button" class="counter-btn" onclick="changeMealCount(-1)">-</button>
                            <input name="meal_num" type="number" id="meal-count" name="meals_per_day" value="2" min="2" max="6" readonly>
                            <button type="button" class="counter-btn" onclick="changeMealCount(1)">+</button>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Willing to Take Supplements</label>
                        <div class="button-group">
                            <input name="supplements" type="radio" id="supplements-yes" name="supplements" value="yes" required class="radio-hidden">
                            <label for="supplements-yes" class="btn">Yes</label>
                            
                            <input type="radio" id="supplements-no" name="supplements" value="no" required class="radio-hidden">
                            <label for="supplements-no" class="btn">No</label>
                        </div>
                    </div>
                    <button type="button" class="btn-next" onclick="nextStep()">Next</button>
                </div>

                <!-- Step 3: Fitness Goal -->
                <div id="step3" class="form-section">
                    <h2 class="form-title">Fitness Goal</h2>
                    <div class="input-group">
                        <label>Choose Your Goal</label>
                        <div class="button-group">
                            <input name="goal" type="radio" id="goal-bulk" name="fitness_goal" value="bulk" required class="radio-hidden">
                            <label  for="goal-bulk" class="btn">Bulk</label>
                            
                            <input name="goal" type="radio" id="goal-cut" name="fitness_goal" value="cut" required class="radio-hidden">
                            <label  for="goal-cut" class="btn">Cut</label>
                            
                            <input name="goal" type="radio" id="goal-healthy" name="fitness_goal" value="healthy" required class="radio-hidden">
                            <label for="goal-healthy" class="btn">Stay Healthy</label>
                        </div>
                    </div>
                    <button type="submit" class="btn-next">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="http://localhost/GymBro/public/javaScript/create_diet.js"></script>
    <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
</body>
</html>