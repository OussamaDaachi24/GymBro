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
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/static_bulk.css" />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
  </head>

  <body>
    <?php 
    include 'header.php';
    ?>
    <!--End of NavBAr-->

    <section class="mobile_options">
      <div class="options">
        <a href="./home.html">Home</a>
        <a href="./about.html">About</a>
        <a href="./static_exercise.html">My Meals</a>
        <a href="./static_food.html">My Workout </a>
      </div>
    </section>

    <!--start of main content-->
    <main class="main_content">
      <div class="title">
        <span class="discover"><b>Discover</b></span>
        <span class="everyday"><b>Everyday</b></span
        ><br />
        <span class="bulk">Bulk</span>
        <span class="meals"> Meals</span>
      </div>

      <div class="btn">
        <button type="button" class="btn_back">
          <a href="./static_food.html"><-Go Back</a>
        </button>
      </div>

      <div class="food_card">
        <div class="food_img">
          <img src="http://localhost/GymBro/public/assets/images/food_bulk1.jpg" id="img" alt="food1" />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              These thick wheat noodles with mushrooms and cabbage are made for
              slurping – a lovely low-fat, low-calorie vegetarian supper
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                250g dried udon noodles (400g frozen or fresh)<br />
                2 tbsp sesame oil<br />
                1 onion, thickly sliced<br />
                ¼ head white cabbage, roughly sliced<br />
                10 shiitake mushrooms<br />
                4 spring onions, finely sliced<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Boil some water in a large saucepan. Add 250ml cold water and
                the udon noodles. (As they are so thick, adding cold water helps
                them to cook a little bit slower so the middle cooks through).
                If using frozen or fresh noodles, cook for 2 mins or until al
                dente; dried will take longer, about 5-6 mins. Drain and leave
                in the colander.Heat 1 tbsp of the oil, add the onion and
                cabbage and sauté for 5 mins until softened. Add the mushrooms
                and some spring onions, and sauté for 1 more min. Pour in the
                remaining sesame oil and the noodles. If using cold noodles, let
                them heat through before adding the ingredients for the sauce.
              </p>
            </div>
          </div>
        </div>
        <!--end of food details-->
      </div>
      <!--End of Food Card-->

      <div class="food_card">
        <div class="food_img">
          <img src="http://localhost/GymBro/public/assets/images/food_bulk2.jpg" id="img" alt="food2" />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Try our chicken and chickpea curry for a dish that packs in punchy
              flavour but doesn’t require a lot of effort to make. It’s great to
              freeze for busy days
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                3 tbsp sunflower oil<br />
                2 onions, thinly sliced<br />
                6 garlic cloves<br />
                2 green chillies, finely chopped<br />
                3 tbsp tomato purée<br />
                8 skinless chicken thighs, on the bone<br />
                1 tsp chilli powder<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Heat the oil in a saucepan and add the onions. Cook over a
                medium heat for 10 mins until golden, then add the garlic and
                chillies and cook for 1 min until fragrant. Add the tomato purée
                and cook for 1 min. Move the mixture to the side of the pan,
                then add the chicken thighs. Spread the tomato mix on top of the
                chicken and cook over a high heat for 5 mins.Add the spices, 1
                tsp salt and 150ml just-boiled water, and mix well. Cover and
                cook over a low heat for 45 mins until the chicken is cooked.
                Add the chickpeas and cook for a final 5 mins. To freeze
                portions, divide into freezable containers.
              </p>
            </div>
          </div>
        </div>
        <!--end of food details-->
      </div>
      <!--End of Food Card-->

      <div class="food_card">
        <div class="food_img">
          <img
            src="http://localhost/GymBro/public/assets/images/food_bulk3.jpg"
            id="img"
            alt="Asparagus & new potato frittata"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              A simple, low-calorie spring main that uses the season's finest
              ingredients and is ready in just 20 minutes
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                200g new potatoes, quartered<br />
                100g asparagus tips<br />
                1 tbsp olive oil<br />
                1 onion, finely chopped<br />
                6 eggs, beaten<br />
                40g cheddar, grated<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Heat the grill to high. Put the potatoes in a pan of cold salted
                water and bring to the boil. Once boiling, cook for 4-5 mins
                until nearly tender, then add the asparagus for a final 1 min.
                Drain.Meanwhile, heat the oil in an ovenproof frying pan and add
                the onion. Cook for about 8 mins until softened.Mix the eggs
                with half the cheese in a jug and season well. Pour over the
                onion in the pan, then scatter over the asparagus and potatoes
                Top with the remaining cheese and put under the grill for 5 mins
                or until golden and cooked through. Cut into wedges and serve
                from the pan with salad.
              </p>
            </div>
          </div>
        </div>
        <!--end of food details-->
      </div>
      <!--End of Food Card-->

      <div class="food_card">
        <div class="food_img">
          <img
            src="http://localhost/GymBro/public/assets/images/food_bulk4.jpg"
            id="img"
            alt="Fajita chicken rice bowl with burnt lime"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Make crowd-pleasing fajitas the easy way with this one-tray recipe
              that’s full of nutrients and low in fat and calories. It makes a
              speedy midweek meal.
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                2 large chicken breasts<br />
                2 peppers, sliced<br />
                2 red onions, sliced<br />
                200g baby corn<br />
                3 tsp chipotle chilli paste<br />
                1 lime, zested, then halved<br />
                2 tsp vegetable oil<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Heat the oven to 220C/200C fan/gas 7 and line a large baking
                tray with baking parchment. Arrange the chicken, peppers, red
                onions and baby corn on the tray, and spoon over the chipotle
                paste. Season, then toss to combine. Put the lime halves on the
                tray, cut-side down, then drizzle the oil over the chicken and
                veg. Roast for 20 mins, or until everything is cooked
                through.Meanwhile, warm the beans in a small pan over a low
                heat, and season.
              </p>
            </div>
          </div>
        </div>
        <!--end of food details-->
      </div>
      <!--End of Food Card-->
    </main>
  </body>
  <script src="http://localhost/GymBro/public/js/common.js"></script>
</html>
