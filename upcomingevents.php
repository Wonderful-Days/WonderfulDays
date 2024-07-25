<?php
include("connect.php");
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

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
  <title>Wonderful days</title>
</head>

<body>
  <!-- HEADER SECTION -->
  <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo"></a>
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
              <a class="dropdown-item" href="sunday.html">Sunday</a>
              <a class="dropdown-item" href="monday.html">Monday</a>
              <a class="dropdown-item" href="tuesday.html">Tuesday</a>
              <a class="dropdown-item" href="wendnesday.html">Wednesday</a>
              <a class="dropdown-item" href="thursday.html">Thursday</a>
              <a class="dropdown-item" href="friday.html">Friday</a>
              <a class="dropdown-item" href="saturday.html">Saturday</a>
            </div>

          </li>

          <li class="nav-item act">
            <a class="nav-link" style="color:black" href="#testimonials">
              <img src="images/review)logo.png" width="24" height="24" fill="currentColor" class="bi d-flex-row mx-auto mb-1" viewBox="0 0 16 16">
              Reviews </a>
          </li>


          <!-- //Your Events AFter login Page -->




          <li class="nav-item act">
            <a class="nav-link" style="color:black" href="aboutus.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi d-flex-row mx-auto mb-1" viewBox="0 0 16 16">
                <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              </svg> About Us </a>
          </li>

          <?php
          if (isset($_SESSION["uname"])) {
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
      <a class="dropdown-item" href="upcomingevents.php">Upcomig Events</a>
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



  <div style="background-image: url('images/registereventsbackground.jpg'); background-size: cover; background-position: center; position: relative; height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <h1 style="color: white; font-size: 3em; margin-bottom: 20px; text-align: center;">Your Event Journey</h1>
    <div style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; width: 80%; max-width: 800px; display: flex; flex-direction: column; gap: 20px;">
      <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <h2>Registered Events</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
          <thead>
            <tr>
              <th style="padding: 10px; border: 1px solid #ddd; background-color: #f4f4f4; text-align: center;">Number</th>
              <th style="padding: 10px; border: 1px solid #ddd; background-color: #f4f4f4; text-align: center;">Registered Events</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">1</td>
              <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">Money Monday</td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
      <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <h2>Upcoming Events</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
          <thead>
            <tr>
              <th style="padding: 10px; border: 1px solid #ddd; background-color: #f4f4f4; text-align: center;">Event Name</th>
              <th style="padding: 10px; border: 1px solid #ddd; background-color: #f4f4f4; text-align: center;">Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">Money Monday</td>
              <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">12/12/2024</td>
            </tr>
            <tr>
              <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">Funday Sunday</td>
              <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">18/06/2024</td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
      <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <h2>Oops! You Missed Some Events</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
          <thead>
            <tr>
              <th style="padding: 10px; border: 1px solid #ddd; background-color: #f4f4f4; text-align: center;">Registered Events</th>
              <th style="padding: 10px; border: 1px solid #ddd; background-color: #f4f4f4; text-align: center;">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">Money Monday</td>
              <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">Absent</td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
    </div>
  </div>




  <!-- Footer Section start -->
  <footer class="footer-area sky-gray-bg padding-bottom padding-top-50 relative wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    <div class="footer-bottom-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12 sm-center xs-center sm-mb50 xs-mb50">
            <div class="footer-logo mb20">
              <a href="index.html"><img src="images/logo.png" alt=""></a>
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

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>