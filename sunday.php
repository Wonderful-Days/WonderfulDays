<?php
session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!--Google fonts Oswald-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />



  <link rel="stylesheet" href="style.css">

  <title>Innovation Sunday</title>
</head>
<style>
  .banner {
    background-image: linear-gradient(20deg, #00b7ff,
        #40E0D0);
  }

  .row {
    justify-content: space-between;
  }

  .text-img {
    padding-left: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .img {
    height: 60vh;
    width: auto;
    padding-left: 30px;
    border-radius: 50px;
  }

  .btn-c {
    align-items: center;
    padding-top: 20px;
    padding-left: -100px;
  }

  .btn {
    background-color: #fe399c;
    border-radius: 10px;
    margin-right: 90px;
    font-size: 1.2rem;
  }

  .btn:hover {
    background-color: #fe399c;
  }

  .btn a {
    color: white;
    text-decoration: none;
  }

  .content {

    margin: 50px;
    padding-left: 20px;
    padding-right: 20px;
  }

  .heading {
    padding-bottom: 30px;
  }

  .text {
    font-size: 3em;
  }

  .para {
    padding-top: 30px;
  }

  #custom-card {
    height: auto;
    width: 30%;
    border: 1px solid grey;
    border-radius: 30px;
  }

  #custom-card:hover {
    box-shadow: 20px 20px 200px rgb(170, 170, 170);
    transform: scale(1.03);
  }

  .waviy {
    position: relative;
  }

  .waviy span {
    position: relative;
    display: inline-block;
    animation: flip 5s infinite;
    animation-delay: calc(.2s * var(--i))
  }

  @keyframes flip {

    0%,
    80% {
      transform: rotateY(360deg)
    }
  }

  .animate-charcter {
    text-transform: uppercase;
    background-image: linear-gradient(-225deg,
        #231557 50%,
        #44107a 59%,
        #ff1361 67%,
        #fe399c 100%
        /* #f8ad22 100% */
      );
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 5s linear;
    display: inline-block;

  }

  @keyframes textclip {
    to {
      background-position: 200% center;
    }
  }

  .blog-post {
    display: flex;
    align-items: center;
    max-width: 90rem;
    background-color: #fff;
    padding: 4.5rem;
    box-shadow: 0 0.7rem 3rem rgba(0, 0, 0, 0.2);
    border-radius: 0.8rem;
  }

  .second {
    flex-direction: row-reverse;
  }

  .blog-post__img {
    position: relative;
    min-width: 20rem;
    max-width: 35rem;
    height: 20rem;
    transform: translateX(-8rem);
  }

  .second .blog-post__img {
    transform: translateX(8rem);
    position: relative;
  }

  .blog-post__img img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0.8rem;
    border-radius: 54px;
  }

  .blog-post__img::before {
    content: "";
    position: absolute;
    inset: 0;
    border: 20px solid #40e0d0;
    box-shadow: 0.2rem 0.2rem 1rem 0.3px rgba(0, 0, 0, 0.01);
    border-radius: 54px;
    opacity: 0.5;
  }

  .blog-post__date span {
    display: block;
    color: #8e8c8c;
    font-weight: 600;
    margin: 0.5rem 0;
  }

  .blog-post__title {
    font-size: 2.5rem;
    margin: 1.5rem 0 2rem;
    text-transform: uppercase;
    color: #40e0d0;
    /*color: black;*/
  }

  .blog-post__info p {
    margin-bottom: 3rem;
    color: rgba(0, 0, 0, 0.7);
  }

  .blog-post__cta {
    display: inline-block;
    /* background-image: linear-gradient(to right, #00b7ff 0%, #40e0d0 100%); */
    /*background-image: linear-gradient(20deg, #00b7ff, #40e0d0); */
    background-color: #fe399c;
    padding: 1rem 1rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #fff;
    border-radius: 0.8rem;
    text-decoration: none;
  }

  .blog-post__cta:hover {
    /*background-image: linear-gradient(to right, #00b7ff 0%, #40e0d0 100%);*/
    background-color: #fe399c;
  }

  @media (max-width: 1068px) {
    .blog-post {
      max-width: 80rem;
    }

    .blog-post__img {
      min-width: 30rem;
      max-width: 30rem;
    }
  }

  @media (max-width: 868px) {
    .blog-post {
      max-width: 70rem;
    }
  }

  @media (max-width: 768px) {
    .blog-post {
      padding: 2.5rem;
      flex-direction: column;
    }

    .blog-post__img {
      min-width: 100%;
      transform: translate(0, -8rem);
    }
  }

  .npc {
    background-color: transparent;
  }

  /* Carousel top */
  .headSection img {

    box-shadow: none;
  }
</style>

<body>
  <!-- HEADER SECTION -->
  <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="images/how_it_works_logo.png" width="24" height="24" fill="currentColor" class="bi d-flex-row mx-auto mb-1" viewBox="0 0 16 16"> Events
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="sunday.php">Sunday</a>
              <a class="dropdown-item" href="monday.php">Monday</a>
              <a class="dropdown-item" href="tuesday.php">Tuesday</a>
              <a class="dropdown-item" href="wendnesday.php">Wednesday</a>
              <a class="dropdown-item" href="thursday.php">Thursday</a>
              <a class="dropdown-item" href="friday.php">Friday</a>
              <a class="dropdown-item" href="saturday.php">Saturday</a>
            </div>

          </li>

          <li class="nav-item act">
            <a class="nav-link" style="color:black" href="#testimonials">
              <img src="images/review)logo.png" width="24" height="24" fill="currentColor" class="bi d-flex-row mx-auto mb-1" viewBox="0 0 16 16">
              Review </a>
          </li>
          <li class="nav-item act">
            <a class="nav-link" style="color:black" href="aboutus.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi d-flex-row mx-auto mb-1" viewBox="0 0 16 16">
                <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              </svg> About Us </a>
          </li>

          <?php
          if (isset($_SESSION["name"])) {
            echo '<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="images/how_it_works_logo.png"
      width="24"
      height="24"
      fill="currentColor"
      class="bi d-flex-row mx-auto mb-1"
      viewBox="0 0 16 16"> Your Events
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="registeredevents.html">Registered Events </a>
      <a class="dropdown-item" href="upcomingevents.html">Upcomig Events</a>
    </div>
    
  </li>

    <div class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false" style="color:black">
                <img src="images/profile.1024x1024.png" width="24" height="24" class="bi d-flex-row mx-auto mb-1" viewBox="0 0 16 16"> Profile
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </div>';
          } else {
            echo '<li class="nav-item act">
            <a class="nav-link" style="color:black" href="register.php">
                <img src="images/register.1024x1024.png" width="24" height="24" fill="currentColor" class="bi d-flex-row mx-auto mb-1" viewBox="0 0 16 16"> Register
            </a>
          </li>';
          }
          ?>

        </ul>
      </div>
    </nav>
  </section>
  <!-- Header section End -->

  <!-- Banner section start -->
  <section class="banner">
    <!--Breadcrumbs Section Start-->
    <section class="breadcrumbs-section">
      <div class="container pl-3 p-sm-3">
        <div class="row">
          <div class="col-12">
            <!--<h2>Contact Us</h2>-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Sunday Events</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!--Breadcrum section End-->


    <!--Sunday Page SlideShow Start-->
    <section class="p-2 pt-md-4 pb-md-4">
      <div id="carouselExampleControls" class="carousel slide headSection" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <!-- <img class="d-block w-100" src="..." alt="First slide"> -->
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6 text-img">
                  <h2 class="animate-charcter">
                    "Discover the joy of Sundays with our exciting program."
                  </h2>
                  <div class="btn-c">
                    <button class="btn">
                      <a href="#innovation_sunday">Read more</a>
                    </button>
                  </div>
                </div>
                <div class="col-md-6 text-img">
                  <img class="img-fluid p-3 img-responsive img" src="images/Innovation Sunday.png" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <!-- <img class="d-block w-100" src="..." alt="Second slide"> -->
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6 text-img">
                  <h2 class="animate-charcter">
                    "Join us for a fun-filled day of laughter and adventure!"
                  </h2>
                  <div class="btn-c">
                    <button class="btn">
                      <a href="#funday_sunday">Read more</a>
                    </button>
                  </div>
                </div>
                <div class="col-md-6 text-img">
                  <img class="img-fluid p-3 img-responsive img" src="images/FundaySunday.jpg" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon npc" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon npc" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>

    <!--Sunday Page slide show end-->
  </section>
  <br>


  <!--About section start  -->

  <section class="content">
    <h2 class="heading">
      <div class="waviy">
        <span style="--i:1">A</span>
        <span style="--i:2">b</span>
        <span style="--i:3">o</span>
        <span style="--i:4">u</span>
        <span style="--i:5">t</span>
        <span style="--i:8"> </span>
        <span style="--i:6">E</span>
        <span style="--i:7">v</span>
        <span style="--i:8">e</span>
        <span style="--i:9">n</span>
        <span style="--i:10">t</span>

      </div>
    </h2>
    <!-- <h3 class="text-center text"> Innovation Sunday</h3> -->
    <!-- <div class="para">
  <p> Innovation Sunday is a platform for individuals to share their innovative ideas with a community of like-minded individuals. The goal is to foster a creative environment where people can exchange thoughts and ideas, and build upon each other's perspectives.
  </p>
  <p>By sharing your innovative ideas, you can gain valuable feedback and insights from others, and potentially find collaborators who can help bring your ideas to life. Additionally, you can also learn about the creative processes of others, and gain new perspectives on how to approach problem-solving and innovation.
  </p>   
  <p>Participation in Innovation Sunday is open to anyone with a good idea, regardless of background or experience. The focus is on fostering collaboration, creativity, and the exchange of ideas. Whether you have a fully-formed idea or just a spark of inspiration, Innovation Sunday is a place where you can connect with others and bring your vision to life.
  </p>
 </div>
 <div class="btn-c">
  <button class="btn "><a href="register.php">Register for Event</a></button>
</div> -->


    <h2 id="innovation_sunday"></h2>
    <article class="blog-post">
      <div class="blog-post__img">
        <img src="images/Innovation Sunday.png" alt="" />
      </div>
      <div class="blog-post__info">

        <h2 class="blog-post__title">Innovation Sunday</h2>
        <p>
          Innovation Sunday is a platform for individuals to share their innovative
          ideas with a community of like-minded individuals. The goal is to foster
          a creative environment where people can exchange thoughts and ideas, and
          build upon each other's perspectives.
          By sharing your innovative ideas, you can gain valuable feedback and
          insights from others, and potentially find collaborators who can help
          bring your ideas to life. Additionally, you can also learn about the
          creative processes of others, and gain new perspectives on how to approach
          problem-solving and innovation.
        </p>
        <a href="register.php" class="blog-post__cta">Register for Event</a>
        <a href="links.php" class="blog-post__cta">See privous Events</a>
      </div>
    </article>

    <br><br><br>
    <!--post 2-->
    <h2 id="funday_sunday"></h2>
    <article class="blog-post second">
      <div class="blog-post__img">
        <img src="images/FundaySunday.jpg" alt="" />
      </div>
      <div class="blog-post__info">

        <h2 class="blog-post__title">Funday Sunday</h2>
        <p>
          Funday Sunday is the perfect opportunity to unwind and have some fun. Whether you prefer a relaxing day spent outdoors or an exciting adventure, there are endless possibilities for a fun-filled day. You can have a picnic at a nearby park, go on a hike or kayaking adventure, or even have a spa day at home. If you're in the mood for a lazy day, you can binge-watch your favorite movies or TV shows, or have a board game night with friends. Whatever your preference, the most important thing is to enjoy yourself and spend time with those who matter most to you.
        </p>
        <a href="register.php" class="blog-post__cta"> Register for Event</a>
        <a href="links.php" class="blog-post__cta">See Prevoius Events</a>
      </div>
    </article>
    <br><br><br>
  </section>


  <!-- about section  end-->

  <!-- Review section start -->
  <h2 id="testimonials"></h2>
  <br><br><br>
  <h2 class="text-center">What our participants says about us</h2>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators ">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active dash"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1" class="dash"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2" class="dash"></li>
    </ol>
    <div class="carousel-inner " style="padding-top: 70px;">
      <div class="carousel-item active text-center">
        <img src="images/imagePlaceholder.jpg" style="border-radius: 100px;" width="20%" height="200px" class="bd-placeholder-img " alt="">
        <h2 style="padding-top: 20px;">Anil Rose</h2>
        <p style="max-height: 180px;">Govt. Millennium Polytechnic Chamba HP
        </p>

      </div>
      <div class="carousel-item text-center">
        <img src="images/imagePlaceholder.jpg" style="border-radius: 100px;" width="20%" height="200px" class="bd-placeholder-img " alt="">
        <h2 style="padding-top: 20px;">Jay pujara</h2>
        <p style="max-height: 180px;">Lakhdhirji Engineering College-Morbi.
        </p>

      </div>
      <div class="carousel-item text-center">
        <img src="images/imagePlaceholder.jpg" style="border-radius: 100px;" width="20%" height="200px" class="bd-placeholder-img " alt="">
        <h2 style="padding-top: 20px;">Sonali</h2>
        <p style="max-height: 180px;">MKSSS'S Smt. Hiraben Nanavati INstitute of Management & Research
        </p>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
      <span class="carousel-control-prev-icon " aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
      <span class="carousel-control-next-icon " aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>



  <!-- Review section end-->


  <!--Our More Progeam Start-->
  <!--Our More Progeam Start-->
  <section class="pt-3 pb-4">
    <div class="container">
      <div class="row mt-4">
        <div class="col text-center">
          <h3>
            Join Our More Programs
          </h3>
        </div>
      </div>
      <hr>
      <div class="row">

        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/Mooney Monday.png" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Mooney Monday
          </h5>
          <p>
            Mooney Monday is a celebration of poetry and all things poetic. <a href="monday.php"><b>Read more...</b></a>
          </p>

        </div>

        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/MotivationalMomday.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Motivational Monday
          </h5>
          <p>
            Motivation Monday is a term that refers to the practice of starting the week off on a positive and motivated note. <a href="monday.php"><b>Read more...</b></a>
          </p>

        </div>



        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/TeacherTuesday.png" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Teachers' Tuesday
          </h5>
          <p>
            Teachers' Tuesday is a platform for educators to come together, share their experiences, <br> <a href="#"><b>Read more...</b></a>
          </p>

        </div>
        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/tuesday2.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Travel' Tuesday
          </h5>
          <p>
            Travel' Tuesday is a platform for "DISCOVER THE HIDDEN GEMS OF THE WORLD WITH TRAVEL TUESDAY!"
            <br><a href="#"><b>Read more...</b></a>
          </p>

        </div>
      </div>

      <div class="row">
        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/tuesday3.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Trivia' Tuesday
          </h5>
          <p>
            Trivia' Tuesday is a platform for "RETRO REWIND: A JOURNEY THROUGH THE NOSTALGIC GEMS OF THE 80S AND 90S!"
            <br><a href="#"><b>Read more...</b></a>
          </p>

        </div>
        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/Copy of WonderfulWednesday.png" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Wonderful Wednesday
          </h5>
          <p>
            Wonderful Wednesday is a day dedicated to personal growth and goal-setting.<br> <a href="#"><b>Read
                more...</b></a>
          </p>

        </div>

        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/WomensWednesday.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Women Wednesday
          </h5>
          <p>
            "Women Wednesday" is a term used to recognize and celebrate women, their contributions, and achievements.<br> <a href="#"><b>Read more...</b></a>
          </p>
        </div>
        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/Teaming Thursday.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Teaming Thursday
          </h5>
          <p>
            Teaming Thursday is a day dedicated to team building and collaboration among members of Smart Cookies.<br> <a href="#"><b>Read more...</b></a>
          </p>
        </div>

      </div>
      <div class="row">

        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/thirsty Thursday .jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Thirsty Thursday
          </h5>
          <p>
            Thirsty Thursday is a day "QUENCH YOUR THIRST WITH THIRSTY THURSDAY: SIPS,SIPS,HOORAY!".<br> <a href="#"><b>Read more...</b></a>
          </p>
        </div>

        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/throwbackthurshday.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Throwback Thursday
          </h5>
          <p>
            Throwback Thursday is a day "BLAST FROM THE PAST: JOURNEYING TO THEROARING'20S!".<br> <a href="#"><b>Read
                more...</b></a>
          </p>
        </div>
        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/FasionFriday.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Fashion Friday
          </h5>
          <p>
            Fashion Friday is a day dedicated to the celebration of fashion and its role in enhancing our lives.<br> <a href="friday.php"><b>Read more...</b></a>
          </p>
        </div>
        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/Farming  Friday.png" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Farming Friday
          </h5>
          <p>
            Farming Friday aims at bringing all the farmers, students, research scholars, research scientists...<br> <a href="friday.php"><b>Read more...</b></a>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/FOODIE FRIDAY.png" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Foodie Friday
          </h5>
          <p>
            Its a day when people can come together to enjoy a variety of delicious food and drinks,...<br> <a href="friday.php"><b>Read more...</b></a>
          </p>
        </div>

        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/FinTech.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Fin-Tech Friday
          </h5>
          <p>
            This events provide a platform for industry leaders, entrepreneurs, investors, and other...<br> <a href="friday.php"><b>Read more...</b></a>
          </p>
        </div>
        <div class="col-md-3 text-center p-5">
          <img class="img-fluid qualities-img p-5" src="images/saturday.jpg" style="border-radius: 50%;" alt="Card image cap">
          <h5>
            Startup Saturday
          </h5>
          <p>
            Startup Saturday is a day dedicated to fostering innovation and entrepreneurship by bringing together
            individuals <a href="saturday.php"><b>Read more...</b></a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--Our More Program End-->
  <!--Our More Program End-->





  <!-- Footer Section start -->
  <footer class="footer-area sky-gray-bg padding-bottom padding-top-50 relative wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="footer-bottom-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12 sm-center xs-center sm-mb50 xs-mb50">
            <div class="footer-logo mb20">
              <a href="#"><img src="images/logo.png" alt=""></a>
            </div>
            <div class="footer-about">
              <p>Smart Cookie believes in the power of youth.</p>
            </div>
          </div>
          <div class="col-md-7 col-md-offset-1 col-xs-12">
            <div class="row">
              <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="single-footer-widget">
                  <h4>Pages</h4>
                  <ul>
                    <li><a href="https://smartcookie.in/new/events/" target="_blank">Events</a></li>
                    <li><a href="help/index1.php" target="_blank">Help</a></li>
                    <li><a href="https://smartcookie.in/core/contact-us.php" target="_blank">Contact us</a></li>
                    <!--  <li><a href="" target="_blank">About us</a></li> -->
                    <li><a href="https://smartcookie.in/core/SmartCookie.pdf" target="_blank">Info</a></li>
                    <li><a href="https://smartcookie.in/core/student.php" target="_blank">Students</a></li>
                    <li><a href="https://smartcookie.in/core/college.php" target="_blank">School/College</a></li>
                    <li><a href="https://smartcookie.in/core/teacher.php" target="_blank">Teachers</a></li>
                    <li><a href="https://smartcookie.in/core/parent.php" target="_blank">Parents</a></li>
                    <li><a href="https://smartcookie.in/core/sponsor.php" target="_blank">Vendors/Sponsors</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-footer-widget">
                  <h4>Social Media</h4>
                  <ul>
                    <li class="social"><a href="https://www.facebook.com/Smarcookie-108920238009055" title="Facebook" target="_blank"><img src="images/facebook-icon.png" height="24" width="24"> &nbsp;&nbsp; Facebook </a></li>
                    <li class="social"><a href="https://twitter.com/smartcookieinn" title="Twitter" target="_blank"><img src="images/twitter-icon.png" height="24" width="24"> &nbsp;&nbsp; Twitter </a></li>
                    <li class="social"><a href="https://www.linkedin.com/in/smart-cookie-1537aa210/" title="LinkedIn" target="_blank"><img src="images/linkedin-icon.png" height="24" width="24"> &nbsp;&nbsp; LinkedIn</a></li>
                    <li class="social"><a href="https://www.instagram.com/smartcookie360/" title="Instagram" target="_blank"> <img src="images/instagram-icon.png" height="24" width="24">&nbsp; Instagram</a></li>

                  </ul>
                </div>
              </div>
              <div class="col-md-5 col-sm-4 col-xs-12">
                <div class="single-footer-widget">
                  <h4>Contact-us</h4>
                  <ul>
                    <li>
                      <p>Blue Planet Info Solutions, (Pvt.) Ltd.
                        Paud Road, Kothrud, Pune,
                        Maharashtra, India
                        info@blueplanetsolutions.com
                        +91-20-25434632 / 25434622</p>
                    </li>
                    <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.5378730365087!2d73.81140607495605!3d18.504580448828694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bfc78084d5eb%3A0xf2b3ff7d826fa2fe!2sBlue%20Planet%20InfoSolutions%20India%20Pvt.%20Ltd.%20-%20Call%20Center!5e0!3m2!1sen!2sin!4v1675259407925!5m2!1sen!2sin" width="250" height="160" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-md-12 ">
            <div class="footer-copyright mt50 ">
              <p>Copyright © <a href="https://smartcookie.in" target="_blank">Smart Cookie</a> All Right Reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!--Footer Section End -->


  <script src="script.js"></script>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>