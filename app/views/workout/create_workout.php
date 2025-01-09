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
<style>
    .header {
    background-color: var(--clr-secondary-bg-light);
    width: 100%;
    height: 8vh;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100%;
    padding: 0 5rem;
}

/* Logo Styles */
.logo-container {
    display: flex;
    align-items: center;
}

.logo {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.logo-img {
    width: 50px;
    height: auto;
}

.logo-text {
    color: var(--clr-light-white);
    font-size: 1.5rem;
    font-weight: var(--fw-bold);
}

/* Navigation Menu */
.nav-menu {
    width: 50%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-menu a {
    color: var(--clr-light-white);
    font-size: 1.3rem;
    font-weight: var(--fw-medium);
    transition: color 0.3s ease;
}

.nav-menu a:hover {
    color: var(--clr-button-midtext);
}

/* Profile Section */
.profile-link {
    display: flex;
    align-items: center;
}

.profile-img {
    width: 35px;
    height: auto;
}

/* Mobile Menu Toggle */
.menu-toggle {
    display: none;
}

/* Mobile Menu */
.mobile_options {
    display: none;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .nav-menu {
        display: none;
    }

    .menu-toggle {
        display: block;
        background: none;
        border: none;
        cursor: pointer;
    }

    .mobile_options {
        display: block;
        width: 100%;
    }

    .options {
        background-color: var(--clr-secondary-bg-light);
        display: flex;
        justify-content: space-around;
        padding: 1rem;
        margin-top: 1rem;
    }
}

</style>
<body>
<header class="header">
        <nav class="navbar">
            <div class="logo-container">
                <a href="/GymBro/app/views/home/home.php" class="logo">
                    <img src="/GymBro/public/assets/icons/logo.png" alt="GymBro Logo" class="logo-img">
                    <span class="logo-text"></span>
                </a>
            </div>
            
            <button class="menu-toggle" aria-label="Toggle navigation">
                <span class="menu-icon"></span>
            </button>
            
            <ul class="nav-menu">
                <li><a href="/GymBro/app/views/home/home.php">Home</a></li>
                <li><a href="/GymBro/app/views/static/about.php">About</a></li>
                <li><a href="/GymBro/app/views/workout/see_workout.php">My Workouts</a></li>
                <li><a href="/GymBro/app/views/diet/myMeals.php">My Meals</a></li>
                <li><a href="/GymBro/logout">Logout</a></li>

            </ul>
            <div>
                <a href="/GymBro/app/views/profile/profile.php" class="profile-link">
                    <img src="/GymBro/public/assets/icons/profile-circle.png" alt="Profile" class="profile-img">
                </a>
            </div>
        </nav>
        <section class="mobile_options">
            <div class="options">
                <a href="/GymBro/app/views/home/home.php">Home</a>
                <a href="/GymBro/app/views/static/about.php">About</a>
                <a href="/GymBro/app/views/diet/myMeals.php">My Meals</a>
                <a href="/GymBro/app/views/workout/see_workout.php">My Workout</a>
            </div>
        </section>
    </header>

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
                        <button type="button" class="objective-btn" data-objective="weight">
                            <input type="radio" name="workout_objective" value="weight" style="display:none;">
                            Lose Weight
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