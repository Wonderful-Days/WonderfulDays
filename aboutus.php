<?php
session_start();
?>
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
  <title>About Us</title>
  <style>
    .container {
      position: relative;
      width: 1160px;
      display: flex;
      /* justify-content: center; */
      flex-wrap: wrap;
      transform-style: preserve-3d;
      perspective: 500px;
      margin: auto;
    }

    .container .box {
      position: relative;
      width: 275px;
      height: 275px;
      background: #000;
      transition: 0.5s;
      transform-style: preserve-3d;
      overflow: hidden;
      margin-right: 15px;
      margin-top: 45px;
    }

    /* .container:hover .box {
  transform: rotateY(25deg);
} */
    .container .box:hover~.box {
      transform: rotateY(-25deg);
    }

    .container .box:hover {
      transform: rotateY(0deg) scale(1.25);
      /* z-index: 1; */
      box-shadow: 0 25px 40px rgba(0, 0, 0, 0.5);
    }

    .container .box .imgBx {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .container .box .imgBx:before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(180deg, rgb(184, 175, 175), #000);
      z-index: 1;
      opacity: 0;
      transition: 0.5s;
      mix-blend-mode: multiply;
    }

    .container .box:hover .imgBx:before {
      opacity: 1;
    }

    .container .box .imgBx img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .container .box .content {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      display: flex;
      padding: 20px;
      align-items: flex-end;
      box-sizing: border-box;
    }

    .container .box .content h2 {
      color: #fff;
      transition: 0.5s;
      text-transform: uppercase;
      margin-bottom: 5px;
      font-size: 20px;
      transform: translateY(200px);
      transition-delay: 0.3s;
    }

    .container .box:hover .content h2 {
      transform: translateY(0px);
    }

    .container .box .content p {
      color: #fff;
      transition: 0.5s;
      font-size: 14px;
      transform: translateY(200px);
      transition-delay: 0.4s;
    }

    .container .box:hover .content p {
      transform: translateY(0px);
    }

    .para {

      padding-left: 60px;
      padding-right: 60px;
    }
  </style>
</head>

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
  <!--BreadCrum Section Start-->

  <section class="breadcrumbs-section">
    <div class="container pl-3 p-sm-3">
      <div class="row jus">
        <div class="col-12">
          <!--<h2>Contact Us</h2>-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">About US</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!--Breadcrum Section End-->

  <!--Landing Page Start-->
  <div class="container my-5 z-depth-1">

    <!--Section: Content-->
    <section class="p-2 pt-md-4 pb-md-4">
      <div class="container text-center">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2>About Our Days</h2>
            <br>
            <p>
              We are comprised of passionate individuals who are dedicated to making a positive impact in
              the education system. We believe that the traditional focus on academics alone can limit the
              potential of students and teachers alike, leading to a lack of appreciation for their talents
              and achievements.Our goal is not to change the existing education structure, but rather to enhance
              it by offering new opportunities for growth and development beyond the classroom. We firmly believe
              that education should be a holistic experience that goes beyond just textbooks and exams.
            </p>
            <a href="#more"><button class="btn btn-primary">Read more</button></a>
          </div>
          <div class="col-md-6">
            <img class="img-fluid p-3" src="images/girlGIF.gif" alt="">
          </div>
        </div>
      </div>
    </section>
    <!--Section: Content-->
  </div>
  <!--Landing Page End-->


  <!--Our Team Section Start-->
  <div class="container">
    <h2 class="text-center">We have Awesome Team</h2>
  </div>
  <div class="container justify-content-around">
    <div class="box" style="padding-right: 30px;">
      <div class="imgBx">
        <img src="images/avikulkarni.png">
      </div>
      <div class="content">
        <div>
          <h2>Avinash Kulkarni</h2>
          <p>Founder & CEO -Smart Cookie. <br>+1 973 551 5593
          </p>
        </div>
      </div>
    </div>
    <div class="box">
      <div class="imgBx">
        <img src="images/rakeshkhatri.png">
      </div>
      <div class="content">
        <div>
          <h2>Rakesh Khatri</h2>
          <p>CTO - Smart Cookie<br> +91 996 090 3132
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--Out TEam Esction End-->
  <h2 id="more"></h2>
  <br><br>
  <div class="para ">

    <p>In pursuit of this vision, we have developed Campus Radio and Campus TV, two innovative
      applications that offer a platform for students to showcase their talents, engage with each
      other, and stay connected with the latest campus news and events. Our applications aim to foster
      a sense of community among students and provide them with a platform to express them and collaborate
      on various projects.
    </p>
    <p>In addition, we have also developed Smart Cookie, a student-teacher reward application that recognizes
      and rewards students for their achievements and contributions to the campus community. This application
      provides an opportunity for students to gain recognition for their hard work and helps to motivate them
      to achieve their goals.We believe that our applications can bring a revolution in the existing education
      structure by offering new opportunities for growth and development beyond the classroom. If you share our
      vision and want to learn more about how our applications can benefit your campus community, please do not
      hesitate to contact us.</p>
  </div>
  <br><Br>
  <!-- Footer Section start -->
  <footer class="footer-area sky-gray-bg padding-bottom padding-top-50 relative wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="footer-bottom-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12 sm-center xs-center sm-mb50 xs-mb50">
            <div class="footer-logo mb20">
              <a href="index.php"><img src="images/logo.png" alt=""></a>
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