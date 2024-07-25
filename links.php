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

  <br>
  <br>
  <br>
  <br>


  <div class="container">
    <h2 class="text-center">See the recodings of our Sunday</h2>
  </div>

  <br><br>

  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="card" style="width: 28rem;">
          <div class="card-body">
            <h5 class="card-title">Join our previous events of Innovation Sunday</h5>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Description</th>
                <th scope="col">Links</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Oct 30, 2022</td>
                <td>Innovation Sunday is not a widely recognized or established term or event. It is possible that you are referring to a specific event or initiative that is
                  specific to your organization, community, or industry.</td>
                <td><a href="https://drive.google.com/file/d/1kAWvW_YlylxdGgUHrzW-zaAUF3t1vZe1/view">Click Here</a></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <th scope="row">2</th>
                <td>Nov 27,22</td>
                <td>"A dedicated day for exploring and fostering creative thinking, disruptive ideas, and breakthrough solutions."</td>
                <td><a href="https://drive.google.com/file/d/1DFJKh8l81oB0oPPmaEDZGjQ1TRuaXN84/view?usp=sharing">Click Here</a></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <th scope="row">3</th>
                <td>Nov 20,22</td>
                <td>Innovation Sunday is a day set aside to encourage and facilitate innovative thinking, idea generation, and problem-solving</td>
                <td><a href="https://drive.google.com/file/d/1szApO_cEarruvuZIZZDHuvPmZ53MK9nL/view?usp=sharing">Click Here</a></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <th scope="row">4</th>
                <td>DEC 25,22</td>
                <td> It aims to create an environment where individuals or teams can explore new concepts, experiment with different approaches, and collaborate to develop groundbreaking solutions.</td>
                <td><a href="https://youtu.be/6e9QtfxRHO8">Click Here</a></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <th scope="row">5</th>
                <td>DEC 11,22</td>
                <td>Innovation Sunday is to create a dedicated time and space for individuals or teams to engage in creative thinking and idea generation </td>
                <td><a href="www.google.com">Click Here</a></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <th scope="row">6</th>
                <td>DEC 4,22</td>
                <td>innovation experts to assist participants in refining their ideas or overcoming obstacles.</td>
                <td><a href="www.google.com">Click Here</a></td>
              </tr>
            </tbody>
            <!-- <tbody>
                        <tr>
                          <th scope="row">7</th>
                          <td>Jan 1,23
                        </td>
                          <td><a href="www.google.com">Click Here</a></td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th scope="row">8</th>
                          <td>Jan 8,23
                        </td>
                          <td><a href="www.google.com">Click Here</a></td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th scope="row">9</th>
                          <td>Jan 15,23
                        </td>
                          <td><a href="www.google.com">Click Here</a></td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th scope="row">10</th>
                          <td>Jan 22,23
                        </td>
                          <td><a href="https://drive.google.com/drive/folders/1sEhrKw41Kfs8e1RKtKEPj2hz6rB2OI21">Click Here</a></td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th scope="row">11</th>
                          <td>Jan29,23
                        </td>
                          <td><a href="www.google.com">Click Here</a></td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th scope="row">12</th>
                          <td>Feb 5,23
                        </td>
                          <td><a href="www.google.com">Click Here</a></td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <th scope="row">13</th>
                          <td>Feb 12,23
                        </td>
                          <td><a href="www.google.com">Click Here</a></td>
                        </tr>
                      </tbody> -->
          </table>
        </div>
      </div>

      <div class="col-6">
        <div class="card" style="width: 28rem;">
          <div class="card-body">
            <h5 class="card-title">Join our previous events of Funday- Sunday</h5>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Description</th>
                <th scope="col">Links</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Date</td>
                <td>In this event vaioues poets presented their poems and interesting thing is some of them are sings well</td>
                <td><a href="www.google.com">Click Here</a></td>
              </tr>
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

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>