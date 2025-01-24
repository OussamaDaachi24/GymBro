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
      <ul class="navSections" style='width=50%;'>
        <li><a href="home.html" class="current">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="static_exercise.html">myWorkouts</a></li>
        <li><a href="static_food.html">myMeals</a></li>
        <li><a href="/GymBro/logout">Logout</a></li>
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

<?php

$meals = [
    'meal 1' => [
        'carb' => [
            'source1' => [
                'name' => 'Oatmeal',
                'calories' => 389
            ],
            'source2' => [
                'name' => 'Whole Wheat Bread',
                'calories' => 247
            ],
            'source3' => [
                'name' => 'Banana',
                'calories' => 89
            ],
            'source4' => [
                'name' => 'Corn Flakes',
                'calories' => 357
            ]
        ],
        'protein' => [
            'source1' => [
                'name' => 'Whole Eggs',
                'calories' => 155
            ],
            'source2' => [
                'name' => 'Greek Yogurt',
                'calories' => 59
            ],
            'source3' => [
                'name' => 'Milk',
                'calories' => 42
            ],
            'source4' => [
                'name' => 'Turkey Ham',
                'calories' => 107
            ]
        ],
        'fat' => [
            'source1' => [
                'name' => 'Peanut Butter',
                'calories' => 588
            ],
            'source2' => [
                'name' => 'Butter',
                'calories' => 717
            ],
            'source3' => [
                'name' => 'Almonds',
                'calories' => 579
            ],
            'source4' => [
                'name' => 'Cheese',
                'calories' => 402
            ]
        ]
    ],
    'meal 2' => [
        'carb' => [
            'source1' => [
                'name' => 'White Rice',
                'calories' => 130
            ],
            'source2' => [
                'name' => 'Spaghetti',
                'calories' => 158
            ],
            'source3' => [
                'name' => 'Sweet Potato',
                'calories' => 86
            ],
            'source4' => [
                'name' => 'White Bread',
                'calories' => 265
            ]
        ],
        'protein' => [
            'source1' => [
                'name' => 'Chicken Breast',
                'calories' => 165
            ],
            'source2' => [
                'name' => 'Tuna',
                'calories' => 116
            ],
            'source3' => [
                'name' => 'Ground Beef',
                'calories' => 332
            ],
            'source4' => [
                'name' => 'Salmon',
                'calories' => 208
            ]
        ],
        'fat' => [
            'source1' => [
                'name' => 'Olive Oil',
                'calories' => 884
            ],
            'source2' => [
                'name' => 'Mixed Nuts',
                'calories' => 607
            ],
            'source3' => [
                'name' => 'Avocado',
                'calories' => 160
            ],
            'source4' => [
                'name' => 'Peanut Butter',
                'calories' => 588
            ]
        ]
    ],
    'meal 3' => [
        'carb' => [
            'source1' => [
                'name' => 'Brown Rice',
                'calories' => 111
            ],
            'source2' => [
                'name' => 'Penne Pasta',
                'calories' => 158
            ],
            'source3' => [
                'name' => 'Potato',
                'calories' => 77
            ],
            'source4' => [
                'name' => 'White Rice',
                'calories' => 130
            ]
        ],
        'protein' => [
            'source1' => [
                'name' => 'Chicken Thigh',
                'calories' => 177
            ],
            'source2' => [
                'name' => 'Beef Steak',
                'calories' => 271
            ],
            'source3' => [
                'name' => 'Sardines',
                'calories' => 208
            ],
            'source4' => [
                'name' => 'Ground Turkey',
                'calories' => 203
            ]
        ],
        'fat' => [
            'source1' => [
                'name' => 'Butter',
                'calories' => 717
            ],
            'source2' => [
                'name' => 'Walnuts',
                'calories' => 654
            ],
            'source3' => [
                'name' => 'Olive Oil',
                'calories' => 884
            ],
            'source4' => [
                'name' => 'Cashews',
                'calories' => 553
            ]
        ]
    ],
    'meal 4' => [
        'carb' => [
            'source1' => [
                'name' => 'White Rice',
                'calories' => 130
            ],
            'source2' => [
                'name' => 'Fusilli Pasta',
                'calories' => 158
            ],
            'source3' => [
                'name' => 'Sweet Potato',
                'calories' => 86
            ],
            'source4' => [
                'name' => 'Brown Rice',
                'calories' => 111
            ]
        ],
        'protein' => [
            'source1' => [
                'name' => 'Chicken Breast',
                'calories' => 165
            ],
            'source2' => [
                'name' => 'White Fish',
                'calories' => 105
            ],
            'source3' => [
                'name' => 'Ground Beef',
                'calories' => 332
            ],
            'source4' => [
                'name' => 'Canned Tuna',
                'calories' => 116
            ]
        ],
        'fat' => [
            'source1' => [
                'name' => 'Olive Oil',
                'calories' => 884
            ],
            'source2' => [
                'name' => 'Almonds',
                'calories' => 579
            ],
            'source3' => [
                'name' => 'Peanut Butter',
                'calories' => 588
            ],
            'source4' => [
                'name' => 'Butter',
                'calories' => 717
            ]
        ]
    ],
    'meal 5' => [
        'carb' => [
            'source1' => [
                'name' => 'Oatmeal',
                'calories' => 389
            ],
            'source2' => [
                'name' => 'Rice Cakes',
                'calories' => 387
            ],
            'source3' => [
                'name' => 'Whole Wheat Bread',
                'calories' => 247
            ],
            'source4' => [
                'name' => 'Sweet Potato',
                'calories' => 86
            ]
        ],
        'protein' => [
            'source1' => [
                'name' => 'Cottage Cheese',
                'calories' => 98
            ],
            'source2' => [
                'name' => 'Greek Yogurt',
                'calories' => 59
            ],
            'source3' => [
                'name' => 'Protein Shake',
                'calories' => 380
            ],
            'source4' => [
                'name' => 'Canned Tuna',
                'calories' => 116
            ]
        ],
        'fat' => [
            'source1' => [
                'name' => 'Peanut Butter',
                'calories' => 588
            ],
            'source2' => [
                'name' => 'Cashews',
                'calories' => 553
            ],
            'source3' => [
                'name' => 'Almonds',
                'calories' => 579
            ],
            'source4' => [
                'name' => 'Mixed Nuts',
                'calories' => 607
            ]
        ]
    ]
];

?>


?>

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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['carbs']/$meals['meal '.$i]['carb']['source1']['calories']*100),0) ?> g of <?= $meals['meal '.$i]['carb']['source1']['name']?></h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['carbs']/$meals['meal '.$i]['carb']['source2']['calories']*100),0) ?> g of <?= $meals['meal '.$i]['carb']['source2']['name']?></h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['carbs']/$meals['meal '.$i]['carb']['source3']['calories']*100),0) ?> g of <?= $meals['meal '.$i]['carb']['source3']['name']?></h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['carbs']/$meals['meal '.$i]['carb']['source4']['calories']*100),0) ?> g of <?= $meals['meal '.$i]['carb']['source4']['name']?> </h1>
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
            <h1>This meal contains <?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']),0) ?> calories of protein</h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']/$meals['meal '.$i]['protein']['source1']['calories']*100),0) ?> g of <?= $meals['meal '.$i]['protein']['source1']['name']?></h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']/$meals['meal '.$i]['protein']['source2']['calories']*100),0) ?> g of <?= $meals['meal '.$i]['protein']['source2']['name']?></h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']/80+1),0) ?> Eggs</h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['protein']/$meals['meal '.$i]['protein']['source2']['calories']*100),0) ?>g of <?= $meals['meal '.$i]['protein']['source4']['name']?></h1>
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
            <h1>This meal contains <?= htmlspecialchars($diet_data['meal'][0]['fat']) ?> calories of fats</h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['fat']/$meals['meal '.$i]['fat']['source1']['calories']*100),0) ?> g of <?= $meals['meal '.$i]['fat']['source1']['name']?></h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['fat']/$meals['meal '.$i]['fat']['source2']['calories']*100),0) ?> g of  <?= $meals['meal '.$i]['fat']['source2']['name']?></h1>
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
                <h1><?= htmlspecialchars(number_format($diet_data['meal'][0]['fat']/$meals['meal '.$i]['fat']['source3']['calories']*100),0) ?> g of <?= $meals['meal '.$i]['fat']['source3']['name']?></h1>
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
                <h1>Nuts [ Almond , Penaut , .. ]</h1>
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
            <h1>For your PLAN you will need <?= htmlspecialchars($diet_data['snack'][0]['carbs']) ?> calories</h1>
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
                <h1>Fruits ( 1 banana , 1 apple , ... ) </h1>
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
                <h1>Granola (oat)</h1>
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
                <h1>bread with honey</h1>
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
            <h1>For your PLAN you will need <?= htmlspecialchars($diet_data['snack'][0]['protein']) ?> calories</h1>
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
                <h1>Greek Yogurt (60 g)</h1>
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
                <h1>1 protein bar</h1>
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
                <h1>seeds</h1>
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
            <h1>For your PLAN you will need <?= htmlspecialchars($diet_data['snack'][0]['fat']) ?> calories</h1>
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
                <h1>penaut buttter</h1>
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
                <h1>Almond milk</h1>
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
                <h1>Olives</h1>
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
