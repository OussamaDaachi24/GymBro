<?php
// Check if diet data is available
if (!isset($diet_data) || empty($diet_data)) {
  include_once __DIR__ . "/../static/not_found.php";
  exit;
}

// Extract meal and snack numbers
$meal_num = $diet_data['diet']['num_meals'];
$snack_num = $diet_data['diet']['num_snacks'];
?>

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
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/MyMeals.css" />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
  </head>
  <!-- Link for chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <body>
    <header class="head_Bar" id="#head">
      <div class="menu_bar"><img src="http://localhost/GymBro/public/assets/images/menu.png" /></div>
      <div class="logo">
        <a href="home.html">
          <img src="http://localhost/GymBro/public/assets/icons/logo.png" class="logo_img"
        /></a>
      </div>
      <ul class="navSections">
        <li><a href="home.html" class="current">Home</a></li>
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
        <a href="./home.html" id="currMobile">Home</a>
        <a href="./about.html">About</a>
        <a href="./static_food.html">My Meals</a>
        <a href="./static_exercise.html">My Workout </a>
      </div>
    </section>

    <!-- 
    Array ( [diet] => Array ( [total_calories] => 2866 [num_meals] => 5 [num_snacks] => 2 ) 
    [meal] => Array ( [0] => Array ( [calories] => 425 [protein] => 129 [carbs] => 300 [fat] => 143 ) ) 
    [snack] => Array ( [0] => Array ( [calories] => 370 [protein] => 129 [carbs] => 300 [fat] => 143 ) ) )
-->
    <div class="Title">
      <h1>Explore Your Custom <span>Meals</span>!</h1>
    </div>
    <?php for ($i = 1; $i <= $meal_num; $i++): ?>
    <div class="main-card-text-container">
      <div class="text-container">
        <h1>meal <?= htmlspecialchars($i) ?></h1>
      </div>
      <div class="main-card-container">
        <div class="carbs-container cpf">
          <div class="title-container">
            <h1>Carbs</h1>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="40"
              height="40"
              viewBox="0 0 40 40"
              fill="none"
            >
              <path
                d="M11.668 33.3333V15C11.668 15 5.00129 6.66666 15.8347 6.66666H28.3346C40.0016 6.66666 33.3347 15 33.3347 15V31.3333C33.3347 32.4379 32.4393 33.3333 31.3347 33.3333H11.668Z"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M11.668 33.3333H8.66804C7.56347 33.3333 6.66804 32.4379 6.66804 31.3333V15C6.66804 15 0.00128757 6.66666 10.8347 6.66666H16.668"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <div class="description">
            <h1>This meal contains <?= htmlspecialchars($diet_data['meal'][0]['carbs']) ?> calories of carbs</h1>
          </div>
          <div class="source">
            <div class="you-gif">
              <h1>You get it from:</h1>
            </div>
            <div class="sources">
              <div class="source-1 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['carbs']/350*100),0) ?> g of White rice (raw)</h1>
              </div>
              <div class="source-2 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['carbs']/370*100),0) ?> g of Oatmeal</h1>
              </div>
              <div class="source-3 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['carbs']/86*100),0) ?> g of Sweet Potato</h1>
              </div>
              <div class="source-4 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['carbs']/370*100),0) ?> g of Pasta (Spaguetti) </h1>
              </div>
            </div>
          </div>
        </div>
        <div class="protein-container cpf">
          <div class="title-container">
            <h1>Protein</h1>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="40"
              height="40"
              viewBox="0 0 40 40"
              fill="none"
            >
              <path
                d="M17.4993 15C17.4993 15 17.4993 11.6667 15.8327 8.33334C22.4993 8.33334 26.666 12.5 26.666 12.5C26.666 12.5 32.4993 11.6667 36.666 20C34.9993 29.1667 26.666 30 26.666 30L19.9993 34.1667C19.9993 34.1667 19.9993 32.5 19.9993 29.1667C15.8327 27.5 11.666 23.3333 11.666 20.8333C11.666 18.3333 17.4993 15 17.4993 15ZM17.4993 15C17.4993 15 19.166 14.1667 20.8327 14.1667"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M3.33268 15.8333L4.99935 20.8333L3.33268 25.8333C3.33268 25.8333 11.666 25.8333 11.666 20.8333C11.666 15.8333 3.33268 15.8333 3.33268 15.8333Z"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M28.334 20.0167L28.3507 19.9981"
                stroke="white"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <div class="description">
            <h1>This meal contains <?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']),0) ?>g of protein</h1>
          </div>
          <div class="source">
            <div class="you-gif">
              <h1>You get it from:</h1>
            </div>
            <div class="sources">
              <div class="source-1 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']/112*100),0) ?> g of Chicken Breasts</h1>
              </div>
              <div class="source-2 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']/112*100),0) ?> g of Steak</h1>
              </div>
              <div class="source-3 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']/80),0) ?> Eggs</h1>
              </div>
              <div class="source-4 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']/100*100),0) ?>g of Fish</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="fats-container cpf">
          <div class="title-container">
            <h1>Fats</h1>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="40"
              height="40"
              viewBox="0 0 40 40"
              fill="none"
            >
              <path
                d="M11.668 33.3333V15C11.668 15 5.00129 6.66666 15.8347 6.66666H28.3346C40.0016 6.66666 33.3347 15 33.3347 15V31.3333C33.3347 32.4379 32.4393 33.3333 31.3347 33.3333H11.668Z"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M11.668 33.3333H8.66804C7.56347 33.3333 6.66804 32.4379 6.66804 31.3333V15C6.66804 15 0.00128757 6.66666 10.8347 6.66666H16.668"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <div class="description">
            <h1>This meal contains <?= htmlspecialchars($diet_data['meal'][0]['fat']) ?> of fats</h1>
          </div>
          <div class="source">
            <div class="you-gif">
              <h1>You get it from:</h1>
            </div>
            <div class="sources">
              <div class="source-1 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['fat']/580*100),0) ?> g of Penaut Butter</h1>
              </div>
              <div class="source-2 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['fat']/880*100),0) ?> g of Olive oil</h1>
              </div>
              <div class="source-3 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['fat']/710*100),0) ?> g of Butter</h1>
              </div>
              <div class="source-4 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>Nuts</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endfor; ?>





    
  <?php for ($i = 1; $i <= $snack_num; $i++): ?>
    <div class="main-card-text-container">
      <div class="text-container">
        <h1>Snack</h1>
      </div>
      <div class="main-card-container">
        <div class="carbs-container cpf">
          <div class="title-container">
            <h1>Carbs</h1>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="40"
              height="40"
              viewBox="0 0 40 40"
              fill="none"
            >
              <path
                d="M11.668 33.3333V15C11.668 15 5.00129 6.66666 15.8347 6.66666H28.3346C40.0016 6.66666 33.3347 15 33.3347 15V31.3333C33.3347 32.4379 32.4393 33.3333 31.3347 33.3333H11.668Z"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M11.668 33.3333H8.66804C7.56347 33.3333 6.66804 32.4379 6.66804 31.3333V15C6.66804 15 0.00128757 6.66666 10.8347 6.66666H16.668"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <div class="description">
            <h1>For your *PLAN* you will need *999* calories</h1>
          </div>
          <div class="source">
            <div class="you-gif">
              <h1>You get it from:</h1>
            </div>
            <div class="sources">
              <div class="source-1 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>ffzfzf</h1>
              </div>
              <div class="source-2 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>zdadad</h1>
              </div>
              <div class="source-3 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>zdada</h1>
              </div>
              <div class="source-4 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>dzddd</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="protein-container cpf">
          <div class="title-container">
            <h1>Protein</h1>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="40"
              height="40"
              viewBox="0 0 40 40"
              fill="none"
            >
              <path
                d="M17.4993 15C17.4993 15 17.4993 11.6667 15.8327 8.33334C22.4993 8.33334 26.666 12.5 26.666 12.5C26.666 12.5 32.4993 11.6667 36.666 20C34.9993 29.1667 26.666 30 26.666 30L19.9993 34.1667C19.9993 34.1667 19.9993 32.5 19.9993 29.1667C15.8327 27.5 11.666 23.3333 11.666 20.8333C11.666 18.3333 17.4993 15 17.4993 15ZM17.4993 15C17.4993 15 19.166 14.1667 20.8327 14.1667"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M3.33268 15.8333L4.99935 20.8333L3.33268 25.8333C3.33268 25.8333 11.666 25.8333 11.666 20.8333C11.666 15.8333 3.33268 15.8333 3.33268 15.8333Z"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M28.334 20.0167L28.3507 19.9981"
                stroke="white"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <div class="description">
            <h1>For your *PLAN* you will need *999* calories</h1>
          </div>
          <div class="source">
            <div class="you-gif">
              <h1>You get it from:</h1>
            </div>
            <div class="sources">
              <div class="source-1 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>ffzfzf</h1>
              </div>
              <div class="source-2 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>zdadad</h1>
              </div>
              <div class="source-3 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>zdada</h1>
              </div>
              <div class="source-4 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>dzddd</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="fats-container cpf">
          <div class="title-container">
            <h1>Fats</h1>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="40"
              height="40"
              viewBox="0 0 40 40"
              fill="none"
            >
              <path
                d="M11.668 33.3333V15C11.668 15 5.00129 6.66666 15.8347 6.66666H28.3346C40.0016 6.66666 33.3347 15 33.3347 15V31.3333C33.3347 32.4379 32.4393 33.3333 31.3347 33.3333H11.668Z"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M11.668 33.3333H8.66804C7.56347 33.3333 6.66804 32.4379 6.66804 31.3333V15C6.66804 15 0.00128757 6.66666 10.8347 6.66666H16.668"
                stroke="white"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
          <div class="description">
            <h1>For your *PLAN* you will need *999* calories</h1>
          </div>
          <div class="source">
            <div class="you-gif">
              <h1>You get it from:</h1>
            </div>
            <div class="sources">
              <div class="source-1 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>ffzfzf</h1>
              </div>
              <div class="source-2 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>zdadad</h1>
              </div>
              <div class="source-3 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>zdada</h1>
              </div>
              <div class="source-4 Asource">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="12"
                  height="13"
                  viewBox="0 0 12 13"
                  fill="none"
                >
                  <circle cx="6" cy="6.5" r="6" fill="#1677FF" />
                </svg>
                <h1>dzddd</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endfor; ?>

  </body>
  <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
</html>
