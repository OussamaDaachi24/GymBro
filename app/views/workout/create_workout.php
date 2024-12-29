<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymBro - Workout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Stylesheet links -->
    <link rel="stylesheet" href="/GymBro/public/css/create_workout.css" />
    <link rel="stylesheet" href="/GymBro/public/css/common.css" />
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo-container">
                <a href="home.html" class="logo">
                    <img src="/GymBro/public/assets/icons/logo.png" alt="GymBro Logo" class="logo-img">
                </a>
            </div>
            
            <button class="menu-toggle" aria-label="Toggle navigation">
                <span class="menu-icon"></span>
            </button>
            
            <ul class="nav-menu">
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="see_workout.html">My Workouts</a></li>
                <li><a href="see_diet.html">My Meals</a></li>
                <li>
                    <a href="profile.html" class="profile-link">
                        <img src="/GymBro/public/assets/icons/profile-circle.png" alt="Profile" class="profile-img">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="mobile_options">
      <div class="options">
        <a href="./home.html">Home</a>
        <a href="./about.html">About</a>
        <a href="./static_food.html">My Meals</a>
        <a href="./static_exercise.html">My Workout </a>
      </div>
    </section>

    <main class="main-content">
        <div class="workout-creator">
            <h1 class="page-title">Customize your <span class="highlight">Workout</span>!</h1>
            
            <div class="progress-indicator">
                <div class="step" data-step="1">1</div>
                <div class="step-line"></div>
                <div class="step completed" data-step="2">2</div>
                <div class="step-line"></div>
                <div class="step completed" data-step="3">3</div>
            </div>

            <form id="workout-form" action="/GymBro/workout/create" method="POST" class="workout-form">
                <!-- Step 1: Workout Split -->
                <div class="form-step" id="step1">
                    <h2 class="step-title">Workout Split</h2>
                    <p class="step-description">How many days do you workout a week?</p>
                    
                    <div class="number-selector">
                        <button type="button" class="selector-btn decrease" aria-label="Decrease workout days">-</button>
                        <input type="hidden" name="workout_days" id="workout-days-input" value="2">
                        <span id="workout-days" class="selected-number">2</span>
                        <button type="button" class="selector-btn increase" aria-label="Increase workout days">+</button>
                    </div>
                    
                    <button type="button" class="btn-next" data-next-step="2">Next</button>
                </div>

                <!-- Step 2: Intensity -->
                <div class="form-step" id="step2">
                    <h2 class="step-title">Intensity</h2>
                    <p class="step-description">Choose your workout intensity</p>
                    
                    <div class="intensity-selector">
                        <button type="button" class="intensity-btn" data-intensity="low">
                            <input type="radio" name="workout_intensity" value="low" style="display:none;">
                            Low
                        </button>
                        <button type="button" class="intensity-btn" data-intensity="medium">
                            <input type="radio" name="workout_intensity" value="medium" style="display:none;">
                            Medium
                        </button>
                        <button type="button" class="intensity-btn" data-intensity="high">
                            <input type="radio" name="workout_intensity" value="high" style="display:none;">
                            High
                        </button>
                    </div>
                    
                    <button type="button" class="btn-next" data-next-step="3">Next</button>
                </div>

                <!-- Step 3: Fitness Objective -->
                <div class="form-step" id="step3">
                    <h2 class="step-title">Fitness Objective</h2>
                    <p class="step-description">Choose your gaining objective</p>
                    
                    <div class="objective-selector">
                        <button type="button" class="objective-btn" data-objective="power">
                            <input type="radio" name="workout_objective" value="power" style="display:none;">
                            Power
                        </button>
                        <button type="button" class="objective-btn" data-objective="muscle">
                            <input type="radio" name="workout_objective" value="muscle" style="display:none;">
                            Muscle
                        </button>
                        <button type="button" class="objective-btn" data-objective="endurance">
                            <input type="radio" name="workout_objective" value="endurance" style="display:none;">
                            Endurance
                        </button>
                    </div>
                    
                    <button type="submit" class="btn-submit">Create Workout</button>
                </div>
            </form>
        </div>
    </main>

    <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
    <script src="http://localhost/GymBro/public/javaScript/create_workout.js"></script>
</body>
</html>