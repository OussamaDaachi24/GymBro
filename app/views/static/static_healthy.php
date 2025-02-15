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
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/static_healthy.css" />
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
        <span class="bulk">Healthy</span>
        <span class="meals"> Meals</span>
      </div>

      <div class="btn">
        <button type="button" class="btn_back">
          <a href="./static_food.html"><-Go Back</a>
        </button>
      </div>

      <div class="food_card">
        <div class="food_img">
          <img
            src="http://localhost/GymBro/public/assets/images/food_healthy1.jpg"
            id="img"
            alt="Smoky chickpea salad"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Enjoy the layers of flavour and contrast of textures in this vegan
              salad, with crisp, fried chickpeas, crunchy raw broccoli, and a
              smoked paprika dressing
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                1 tbsp sunflower oil<br />
                2 x 400g can chickpeas, drained and rinsed<br />
                200g carrots, peeled into ribbons or grated<br />
                200g spinach<br />
                1 small head of broccoli, roughly chopped<br />
                2 tsp smoked paprika<br />
                2 tsp garlic granules<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Heat the oil in a large pan over a medium heat. Tip in the
                chickpeas and fry gently for 3-4 mins until sizzling and
                slightly crispy. Whisk together the dressing ingredients in a
                bowl, then pour over the chickpeas along with 4 tbsp water and
                bring to a boil. Cook for 1-2 mins until reduced slightly,
                remove from the heat, season well and set aside.
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
            src="http://localhost/GymBro/public/assets/images/food_healthy2.jpg"
            id="img"
            alt="Peanut butter & maple syrup flapjacks"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Grab one of our peanut butter flapjacks when you’re on the go.
              Ideal for a lunchbox, they also make a good choice during exercise
              to help sustain energy levels
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                125g unsalted butter , plus extra for the tin<br />
                125g maple syrup<br />
                125g crunchy peanut butter<br />
                150g golden caster sugar<br />
                350g porridge oats<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Heat the oven to 180C/160C fan/gas 4. Butter and line a 20cm
                square tin with baking parchment. Melt the butter in a saucepan
                over a low heat, then stir in the maple syrup. Remove from the
                heat and leave to cool for a few minutes before stirring in the
                peanut butter.Combine the sugar and oats in a bowl, then make a
                dip in the centre and pour in the butter mixture and mix until
                combined.
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
            src="http://localhost/GymBro/public/assets/images/food_healthy3.jpg"
            id="img"
            alt="Chicken dhansak"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Make chicken go further with this Parsi curry where lentils create
              a hearty, creamy texture. It also has sweet and sour flavour notes
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                2 tbsp neutral-tasting oil (such as rapeseed), or ghee<br />
                1 large onion , finely chopped<br />
                1 cinnamon stick<br />
                1 tsp cumin seeds<br />
                ½ butternut squash , peeled and cut into cubes<br />
                1 tsp finely chopped garlic<br />
                400g chicken breast or thigh, cut into cubes<br />
                1 tsp ground turmeric<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Heat the oil or ghee in a large, heavy-based pan over a medium
                heat and cook the onions and cinnamon stick for a few minutes
                until the onions start to brown. Add the cumin seeds and mix
                well.Tip in the squash and continue to cook for a few minutes
                more, then add the garlic and cook for 1 min. Stir in the
                chicken and brown for a few minutes, then add the turmeric,
                ground coriander.
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
            src="http://localhost/GymBro/public/assets/images/food_cut4.jpg"
            id="img"
            alt="Chocolate chip & pecan butternut bread"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Love banana bread? You’ll love this butternut bread, which is
              really more of a cake. The squash provides sweetness while keeping
              the texture dense and squidgy
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                250g butternut squash<br />
                2 eggs<br />
                125ml vegetable or sunflower oil<br />
                200g light brown soft sugar<br />
                100ml milk<br />
                2 tsp vanilla extract<br />
                ¼ tsp ground nutmeg<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Cut the squash into 2cm cubes, tip into a heatproof bowl, then
                add 2 tbsp water, cover with a heatproof plate or lid, and
                microwave on high for 5-8 mins until soft. (Or, roast or air-fry
                for 15-20 mins at 200C/180C fan/gas 6.) Leave to cool.Heat the
                oven to 200C/180C fan/gas 6 and line a 900g loaf tin with baking
                parchment. Mash the squash using a fork, then add the eggs, oil,
                sugar, milk, vanilla extract,
              </p>
            </div>
          </div>
        </div>
        <!--end of food details-->
      </div>
      <!--End of Food Card-->
    </main>
  </body>
  <script> window.chtlConfig = { chatbotId: "9142794298" } </script>
<script async data-id="9142794298" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
  <script src="http://localhost/GymBro/public/js/common.js"></script>
</html>
