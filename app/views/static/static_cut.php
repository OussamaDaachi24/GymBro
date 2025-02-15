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
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/static_cut.css" />
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
        <span class="bulk">Cut</span>
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
            src="http://localhost/GymBro/public/assets/images/food_cut1.jpg"
            id="img"
            alt="Hummus snack packs"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Save the liquid from a can of chickpeas to make a creamy hummus.
              We’ve served it with vegetable crudités for a healthy snack that
              contributes to your 5-a-day
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                400g can chickpeas, drained, liquid reserved<br />
                1 garlic clove<br />
                ½ tsp ground cumin<br />
                1 tsp ground coriander<br />
                1-2 tbsp lemon juice<br />
                1 tbsp extra virgin olive oil<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Tip the chickpeas and garlic into a bowl with the cumin,
                coriander, 1 tbsp lemon juice and the oil. Add 2 tbsp of the
                reserved liquid from the chickpeas, then blitz using a hand
                blender until smooth. If the blender is struggling, add another
                splash of the liquid. Season and add a little more lemon juice
                if needed.Spoon the hummus into four small containers. Will keep
                covered and chilled for up to three days.
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
            src="http://localhost/GymBro/public/assets/images/food_cut2.jpg"
            id="img"
            alt="Mediterranean salad with hummus dressing"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Liven up your usual salad with roasted courgette, artichokes,
              chickpeas and feta in a creamy hummus dressing
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                2 courgettes<br />
                1 tbsp olive oil<br />
                1 tsp dried mixed herbs<br />
                100g chargrilled artichokes , roughly chopped<br />
                ½ cucumber , roughly chopped<br />
                400g can chickpeas , drained and rinsed<br />
                300g cherry tomatoes , halved<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Trim the courgettes, then cut in half lengthways, so you have
                two long halves. Score the flesh of the courgettes in a
                criss-cross. Sprinkle a large pinch of salt over the cut side of
                the courgettes and set aside for 10 mins. Pat dry then brush
                with the olive oil and sprinkle over the mixed herbs on the cut
                side. Heat a dry frying pan over a med- ium-high heat. Put the
                courgettes, scored-side down in the pan and cook for 8-10 mins,
                until deeply browned. Flip and cook for a further 5 mins until
                the courgettes are completely soft.
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
            src="http://localhost/GymBro/public/assets/images/food_cut3.jpg"
            id="img"
            alt="Summer tomato & cheese toastie"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Treat yourself to a summer take on a classic toastie, with
              seasonal tomatoes, garlic, lemon thyme, and Carrick cheese – a
              sustainable cheddar-like option from a UK cheesemaker
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                400g ripe tomatoes , we used a mixture of cherry and vine<br />
                4 garlic cloves , skin on<br />
                small handful of lemon thyme sprigs or use normmal thyme<br />
                3 tbsp extra virgin olive oil<br />
                30g mayonnaise<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Heat the oven to 220C/200C fan/gas 7. Roughly chop any larger
                tomatoes and tip into a roasting tin along with any green vines,
                as these impart flavour, too. Using the side of your knife,
                lightly bash the garlic cloves and add to the tomatoes along
                with the lemon thyme. Drizzle over the oil and season well. Toss
                using your hands to combine. Roast for 25-30 mins until bursting
                and lightly charred. Caref- ully remove the garlic skins and
                mash into the tomatoes then cook for a further 15 mins. Set
                aside to cool slightly, then remove the thyme sprigs and
                discard.
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
            alt="Beef, mushroom & marsala stroganoff with herby mash"
          />
        </div>

        <div class="food_details">
          <div class="food_description">
            <p class="recipe_title">Recipe:</p>
            <h2>
              Use our beef and lentil ragu recipe as the base to make this
              speedy mushroom and beef stroganoff. Perfect for busy weeknights,
              enjoy with herby mash
            </h2>
            <div class="the description"></div>
          </div>

          <div class="food_ingredients">
            <p class="recipe_title">Ingredients:</p>
            <div class="the ingredients">
              <p>
                1kg floury potatoes (we used Maris Piper), roughly chopped<br />
                50g butter<br />
                100ml milk<br />
                1 tsp celery salt (optional)<br />
                100ml soured cream<br />
                handful of soft herbs (we used chives, parsley and dill)<br />
                1 tbsp rapeseed oil<br />
              </p>
            </div>
          </div>

          <div class="food_steps">
            <p class="recipe_title">Steps:</p>
            <div class="the steps">
              <p>
                Put the potatoes in a pan of salted water, bring to the boil and
                cook for 10-12 mins until a sharp knife can slide in easily.
                Drain and leave to steam-dry in the colander for 5 mins. Add the
                butter to the pan along with the milk and celery salt, if using,
                as well as a good crack of black pepper. Gently heat until the
                butter has melted, then return the potatoes to the pan and mash
                well. Stir in the soured cream and most of the herbs, and season
                to taste.
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
