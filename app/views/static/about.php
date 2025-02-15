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
    rel="stylesheet" />
  <link rel="stylesheet" href="http://localhost/GymBro/public/css/about.css" />
  <link rel="stylesheet" href="http://localhost/GymBro/public/css/common.css" />
</head>

<!--  Body section-->
<?php 
  include 'header.php';
?>
<body>
  <section class="mobile_options">
    <div class="options">
      <a href="./home.html">Home</a>
      <a href="./about.html">About</a>
      <a href="./static_food.html">My Meals</a>
      <a href="./static_exercise.html">My Workout </a>
    </div>
  </section>




  <!-- Hero Section -->
  <div class="hero-section">
    <div class="Heading">
      <div class="Headingtxt">WE ARE <span class="blue-text">GymBro</span></h1>
        <p class="tagline">More than just your average fitness website.</p>
      </div>
      </nav>
    </div>

    <!-- Our Story Section -->
    <div class="our-story">
      <div class="story-container">
        <div class="storytitle">Our Story</div>
        <p class="story-text">
          At GymBro, we believe everyone deserves to achieve their fitness goals. Our free
          workout and nutrition plans provide the foundation for anyone to start their
          bodybuilding journey. By joining our community, you'll not just get expert
          guidance but also the motivation and support to become your best self.
          Together, we'll elevate your fitness to new heights. Let's get started!
        </p>
      </div>


    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const storyText = document.querySelector('.story-text');


        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('visible');
            }
          });
        });
        observer.observe(storyText);
      });
    </script>

    <!-- Card 1 -->
    <!-- <div class="card">
      <div class="card-image">
        <img class="photo" src="http://localhost/GymBro/public/assets/images/jimmi.png" alt="Youcef Chebaani" />
      </div>
      <div class="card-content">
        <div class="card-info">
          <h3 class="name">Youcef Chebaani</h3>
          <div class="card-shade"></div>
        </div>
      </div>
    </div>-->


<script src="http://localhost/GymBro/public/javaScript/common.js"></script>


<div class="our-people">
  <div class="titleppl"> Our People </div>
  <div class="card-section" style="overflow:hidden">
    <div class="cards-grid">

       <!-- Card 1 -->
      <div class="card">
        <div class="card-blue">
          <div class="name">Youcef Chebaani</div>
          <div class="quote">" never hurt a designer's feeling "</div>
        </div>
        <img class="photo" src="http://localhost/GymBro/public/assets/images/jimmi.png" alt="Youcef Chebaani" />
        <div class="card-shade"></div>
      </div>

      <!-- Card 2 -->
      <div class="card">
        <div class="card-blue">
          <div class="name">Khalil Kessoum</div>
          <div class="quote">" Cheatyy! "</div>
        </div>
        <img class="photo" src="http://localhost/GymBro/public/assets/images/Kessoum.png" alt="Youcef Chebaani" />
        <div class="card-shade"></div>
      </div>
    </div>


    <div class="cards-grid">

      <!-- Card 3 -->
      <div class="card">
        <div class="card-blue">
          <div class="name" id="Gasmi">Gasmi Ahmed Yassine</div>
          <div class="quote">" Light Weight! "</div>
        </div>
        <img class="photo" src="http://localhost/GymBro/public/assets/images/Yassine.png" alt="Gasmi Yassine" />
        <div class="card-shade"></div>
      </div>

      <!-- Card 4 -->
      <div class="card">
        <div class="card-blue">
          <div class="name">Daachi Oussama</div>
          <div class="quote">" Dont merge conflicts "</div>
        </div>
        <img class="photo" src="http://localhost/GymBro/public/assets/images/Yassine.png" alt="Daachi Oussama" />
        <div class="card-shade"></div>
      </div>


    </div>
  </div>
</div>
<footer class="footer">
  <div class="footer-content">
      <div class="footer-section">
          <p>&copy; 2024 Your Company Name. All Rights Reserved.</p>
      </div>
      <div class="footer-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
          <a href="#">Contact</a>
      </div>
  </div>
</footer>
<script> window.chtlConfig = { chatbotId: "9142794298" } </script>
<script async data-id="9142794298" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>

</body>
</html>