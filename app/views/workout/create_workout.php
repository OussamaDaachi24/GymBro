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

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Signika:wght@300700&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100900;1,100900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="http://localhost/GymBro/public/css/create_workout.css" />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/create_diet.css" />
    <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
  </head>

  <header class="head_Bar" id="#head">
    <div class="menu_bar"><img src="http://localhost/GymBro/public/assets/images/menu.png" /></div>
    <div class="logo">
      <a href="home.html">
        <img src="http://localhost/GymBro/public/assets/icons/logo.png" class="logo_img"
      /></a>
      <div class="logotxt">GymBro</div>
    </div>
    <ul class="navSections">
      <li><a href="home.html">Home</a></li>
      <li><a href="about.html" class="current">About</a></li>
      <li><a href="see_workout.html">myWorkouts</a></li>
      <li><a href="see_diet.html">myMeals</a></li>
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
      <a href="./see_diet.html">My Meals</a>
      <a href="./see_workout.html">My Workout </a>
    </div>
  </section>

  <!--1-->

  <!--1-->
  <body>
    <div class="MainPlat">
      <div class="HeadingText">
        Customize your <span class="highlight">Workout</span>!
      </div>

      <div class="step-indicator">
        <!--STEPS FOR FORM-->
        <div id="1num" class="step">1</div>
        <div class="line"></div>
        <div id="2num" class="step completed">2</div>
        <div class="line"></div>
        <div id="3num" class="step completed">3</div>
      </div>

      <div class="MainCard2">
        <!--container for form-->

        <div id="step1" class="form-container">
          <!--Form 1-->
          <div class="Titlecard">Workout split</div>

          <div class="InfoBox" style="padding-bottom: 20px">
            <div class="upboxtext">How many days you workout a week?</div>

            <div class="input-box">
              <div class="button" onclick="decrease()">&lt;</div>
              <div class="number-display" id="number-display">2</div>
              <div class="button" onclick="increase()">&gt;</div>
            </div>
            <div class="InfoBox">
              <button id="Next1" class="ButtonNext">Next</button>
            </div>

            <script>
              // Initialize the starting number
              let currentNumber = 2;

              // Function to update the displayed number
              function updateDisplay() {
                document.getElementById("number-display").innerText =
                  currentNumber;
              }

              // Function to increase the number (limit to 6)
              function increase() {
                if (currentNumber < 6) {
                  currentNumber++;
                  updateDisplay();
                }
              }

              // Function to decrease the number (limit to 2)
              function decrease() {
                if (currentNumber > 2) {
                  currentNumber--;
                  updateDisplay();
                }
              }
            </script>
          </div>
        </div>

        <!--form 2-->

        <div id="step2" class="form-container">
          <div class="Titlecard">Intensity</div>

          <div class="layoutinside">
            <div class="upboxtext">Choose your workout intensity</div>
            <div class="intensity-container">
              <button class="Container3" onclick="toggleButton(this)">
                Low
              </button>
              <button class="Container3" onclick="toggleButton(this)">
                Medium
              </button>
              <button class="Container3" onclick="toggleButton(this)">
                High
              </button>
            </div>
          </div>

          <script>
            function toggleButton(clickedButton) {
              const buttons =
                clickedButton.parentElement.querySelectorAll(".Container3");

              buttons.forEach((btn) => {
                btn.classList.remove("active");
              });

              clickedButton.classList.add("active");
            }
          </script>

          <div class="InfoBox">
            <button id="Next2" class="ButtonNext">Next</button>
          </div>
        </div>
      </div>

      <!--form 3-->
      <div id="step3" class="form-container">
        <!--
        <div class="step-indicator">
         <div class="step completed">1</div>
         <div class="line"></div>
         <div class="step completed">2</div>
         <div class="line"></div>
         <div class="step">3</div>
         </div>
   -->

        <div class="Titlecard2">Fitness Objective</div>

        <div class="layoutinside">
          <div class="upboxtext">Choose your gaining objective</div>
          <div class="InfoBox">
            <div class="Container3">
              <div
                class="Ex"
                style="
                  opacity: 0.7;
                  color: #1f1f1f;
                  font-size: 16px;
                  font-family: Signika;
                  font-weight: 300;
                  word-wrap: break-word;
                "
              >
                Power
              </div>
            </div>
          </div>

          <div class="InfoBox">
            <div class="Container3">
              <div
                class="Ex"
                style="
                  opacity: 0.7;
                  color: #1f1f1f;
                  font-size: 16px;
                  font-family: Signika;
                  font-weight: 300;
                  word-wrap: break-word;
                "
              >
                Muscle
              </div>
            </div>
          </div>

          <div class="InfoBox">
            <div class="Container3">
              <div
                class="Ex"
                style="
                  opacity: 0.7;
                  color: #1f1f1f;
                  font-size: 16px;
                  font-family: Signika;
                  font-weight: 300;
                  word-wrap: break-word;
                "
              >
                Endurance
              </div>
            </div>
          </div>

          <div class="InfoBox" style="margin-top: 2.5rem">
            <button class="ButtonNext" type="submit">Submit</button>
          </div>
        </div>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
          var Form1 = document.getElementById("step1");
          var Form2 = document.getElementById("step2");
          var Form3 = document.getElementById("step3");
          var Next1 = document.getElementById("Next1");
          var Next2 = document.getElementById("Next2");
          var num1 = document.getElementById("1num");
          var num2 = document.getElementById("2num");
          var num3 = document.getElementById("3num");

          // Ensure initial state
          Form1.style.opacity = "1";
          Form1.style.left = "50%";
          Form2.style.opacity = "0";
          Form2.style.left = "150%";
          Form3.style.opacity = "0";
          Form3.style.left = "110%";
          Form3.style.top = "62%";

          // First Next button
          Next1.addEventListener("click", function () {
            // Move Form1 out of view
            Form1.style.left = "-150%";
            Form1.style.opacity = "0";

            // Bring Form2 to center
            Form2.style.left = "50%";
            Form2.style.opacity = "1";

            // Update step indicators
            num1.style.opacity = 0.5;
            num2.style.opacity = 1;
          });

          // Second Next button
          Next2.addEventListener("click", function () {
            // Move Form2 out of view
            Form2.style.left = "-150%";
            Form2.style.opacity = "0";

            // Bring Form3 to center
            Form3.style.left = "80.8%";
            Form3.style.opacity = "1";

            // Update step indicators
            num2.style.opacity = 0.5;
            num3.style.opacity = 1;
          });
        });
      </script>
    </div>
  </body>
  <!--Ai chat bot-->
  <script>
    window.chtlConfig = { chatbotId: "9142794298" };
  </script>
  <script
    async
    data-id="9142794298"
    id="chatling-embed-script"
    type="text/javascript"
    src="https://chatling.ai/js/embed.js"
  ></script>

  <script src="http://localhost/GymBro/public/javaScript/common.js"></script>
</html>
