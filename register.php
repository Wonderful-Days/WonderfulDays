<?php 
session_start();
include("connect.php"); 

// if(isset($_POST['login']))
// {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
    
//         $query = "select * from wonderfulldays where email= '$email' and password='$password'";
//         $result= mysqli_query($conn,$query);
//         $count=mysqli_num_rows($result);
//         if($count>0)
//         { 
//           $_SESSION['status']= "login sucessful"
//           echo "<script>alert('login sucessfull')</script>".mysqli_error($conn);
//         }
//         else
//         {
//           echo "<script>alert('login sucessfull')</script>".mysqli_error($conn);
//         }
//  } 

        // if($result)
        // {
        //     if($result && mysqli_num_rows($result)>0)
        //     {
        //         $user_data = mysqli_fetch_assoc($result);

        //         if($user_data['password'] == $password)
        //         {
        //             header("location:index.php");
        //             die; 
        //         }
        //     }
        // }
        // echo "<script type='text/javascript'>alert('wrong email or password')</script> ";



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="style.css">
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"/>
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"/>
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
    rel="stylesheet"/>
 
    <title>Register Page</title>

    <style>
        .wrapper-register{
            height: 100%;
            width: 100%;
            /* display: flex; */
            background-image: linear-gradient( 20deg, #00b7ff,
      #40E0D0);
            align-items: center;
            justify-content: center;
            padding-bottom: 30px;
        }
  

        .card{
            margin: 3% auto 3% auto;
            padding: 2rem;
            width: 35%;
            background-color: white;
            box-shadow: 20px 20px 200px rgb(102, 102, 102);
        }
        .card-header{
            text-align: center;
        }
    </style>
  </head>
  <body>






    <!-- HEADER SECTION -->
    <section id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light ">
          <a class="navbar-brand" href="index.html"><img src="images/logo.png"class="logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="images/how_it_works_logo.png"
                  width="24"
                  height="24"
                  fill="currentColor"
                  class="bi d-flex-row mx-auto mb-1"
                  viewBox="0 0 16 16"> Events
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="sunday.html">Innovation Sunday</a>
                  <a class="dropdown-item" href="monday.html">Mooney Monday</a>
                  <a class="dropdown-item" href="tuesday.html">Teachers Tuesday</a>
                  <a class="dropdown-item" href="wendnesday.html">Wonderful Wednesday</a>
                  <a class="dropdown-item" href="thursday.html">Teaming Thursday</a>
                  <a class="dropdown-item" href="friday.html">Farming Friday</a>
                  <a class="dropdown-item" href="saturday.html">Startup Saturday</a>
                </div>
                
              </li>
            
              <li class="nav-item act" >
                <a class="nav-link" style="color:black" href="#"> 
                  <img src="images/review)logo.png"
                  width="24"
                  height="24"
                  fill="currentColor"
                  class="bi d-flex-row mx-auto mb-1"
                  viewBox="0 0 16 16">
                    Review </a>
              </li>
              <li class="nav-item act">
                <a class="nav-link" style="color:black" href="#"><svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  fill="currentColor"
                  class="bi d-flex-row mx-auto mb-1"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"
                  />
                  <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg> About Us </a>
              </li>
              <li class="nav-item act">
                <a class="nav-link" style="color:black" target="_blank" href="register.html">
                  <img src="images/register.1024x1024.png"
                  width="24"
                  height="24"
                  fill="currentColor"
                  class="bi d-flex-row mx-auto mb-1"
                  viewBox="0 0 16 16"> Register </a>
              </li>
            </ul>
          </div>
        </nav>
  </section>




  <div class="wrapper-register">
        <!--Breadcrumbs Section Start-->
        <section class="breadcrumbs-section">
          <div class="container pl-3 p-sm-3">
            <div class="row">
              <div class="col-12">
                <!--<h2>Contact Us</h2>-->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Register Page</li>
                </ol>
              </div>
            </div>
          </div>
        </section>
        <!--Breadcrum section End-->
    <div class="card">
        <div class="card-header">
            <h3>Wonderful Days</h3>
        </div>
         <!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
        aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
        aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
  </ul>
  <!-- Pills navs -->
  
  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form action="connect.php" method="post">
        <div class="text-center mb-3">
          <p>Sign in with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
          </button>
        </div>
  
        <p class="text-center">or:</p>
  
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="loginName" class="form-control" name="email" />
          <label class="form-label" for="loginName">Email or username</label>
        </div>
  
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="loginPassword" class="form-control" name="password" />
          <label class="form-label" for="loginPassword">Password</label>
        </div>
  
        <!-- 2 column grid layout -->
        <div class="row mb-4">
          <div class="col-md-6 d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check mb-3 mb-md-0">
              <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
              <label class="form-check-label" for="loginCheck"> Remember me </label>
            </div>
          </div>
  
          <div class="col-md-6 d-flex justify-content-center">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>
  
        <!-- Submit button -->
        <a href="index.php"><input type="submit" class="btn btn-primary btn-block mb-4" name="login" value="log in"></a>
  
        <!-- Register buttons -->
        <div class="text-center" role="tab">
          <p>Not a member? </p><a class="nav-link" href="#pills-register">Register</a>
        </div>
<!-- 
        <li class="nav-item" role="presentation">
          <a class="nav-link" data-mdb-toggle="pill" href="#pills-register" role="tab"
            aria-controls="pills-register" aria-selected="false">Register</a>
        </li> -->
     </form>
    </div>










    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
      <!-- connection to php -->
      <form  action="connect.php" method="post">
        <div class="text-center mb-3">
          <p>Sign up with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
          </button>
  
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
          </button>
        </div>
  
        <p class="text-center">or:</p>
  
        <!-- Name input -->
        <div class="form-outline mb-4">
          <input type="text" id="registerName" class="form-control" name="name" />
          <label class="form-label" for="registerName">Name</label>
        </div>
  
        <!-- Username input -->
        <div class="form-outline mb-4">
          <input type="text" id="registerUsername" class="form-control" name="username" />
          <label class="form-label" for="registerUsername">Username</label>
        </div>


        <select name="events">
          <option value="">select events</option>
          <option value="INNOVATION SUNDAY">INNOVATION SUNDAY</option>
          <option value="FUNDAY SUNDAY">FUNDAY SUNDAY</option>
          <option value="Mooney Monday">Mooney Monday</option>
          <option value="Motivational Monday">Motivational Monday</option>
          <option value="Teachers' Tuesday">Teachers' Tuesday</option>
          <option value="Travel' Tuesday">Travel' Tuesday</option>
          <option value="Wonderful Wednesday">Wonderful Wednesday</option>
          <option value="Women Wednesday">Women Wednesday</option>
          <option value="Teaming Thursday">Teaming Thursday</option>
          <option value="Thirsty Thursday">Thirsty Thursday</option>
          <option value="Throwback Thursday">Throwback Thursday</option>
          <option value="Fashion Friday">Fashion Friday</option>
          <option value="Farming Friday">Farming Friday</option>
          <option value="Foodie Friday">Foodie Friday</option>
          <option value="Fin-Tech Friday">Fin-Tech Friday</option>
          <option value="Startup Saturday">Startup Saturday</option>

         </select>
          <br>
          <br>
  
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="registerEmail" class="form-control" name="email" />
          <label class="form-label" for="registerEmail">Email</label>
        </div>
        
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="registerPassword" class="form-control" name="password"/>
          <label class="form-label" for="registerPassword">Password</label>
        </div>
  
        <!-- Repeat Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="registerRepeatPassword" class="form-control" name="repeatpassword" />
          <label class="form-label" for="registerRepeatPassword">Repeat password</label>
        </div>
  
        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
          <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
            aria-describedby="registerCheckHelpText" />
          <label class="form-check-label" for="registerCheck">
            I have read and agreed to the terms
          </label>
        </div>
  
        <!-- Submit button -->
       <a href="index.php"> <button type="submit" class="btn btn-primary btn-block mb-3" name="register">Sign up</button></a>
      </form>
    </div>
  </div>
  <!-- Pills content -->
    </div>
  </div>



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
                              <ul >
                                  <li class="social"><a href="https://www.facebook.com/Smarcookie-108920238009055" title="Facebook" target="_blank"><img src="images/facebook-icon.png" height="24" width="24"> &nbsp;&nbsp; Facebook </a></li>
                                  <li class="social"><a href="https://twitter.com/smartcookieinn" title="Twitter" target="_blank"><img src="images/twitter-icon.png" height="24" width="24"> &nbsp;&nbsp; Twitter </a></li>
                                  <li class="social"><a href="https://www.linkedin.com/in/smart-cookie-1537aa210/" title="LinkedIn" target="_blank"><img src="images/linkedin-icon.png" height="24" width="24"> &nbsp;&nbsp; LinkedIn</a></li>
                                 <li class="social"><a href="https://www.instagram.com/smartcookie360/" title="Instagram" target="_blank"> <img src="images/instagram-icon.png"height="24" width="24" >&nbsp; Instagram</a></li>

                              </ul>
                          </div>
                      </div>
                      <div class="col-md-5 col-sm-4 col-xs-12">
                          <div class="single-footer-widget">
                              <h4>Contact-us</h4>
                              <ul>
                                  <li><p>Blue Planet Info Solutions, (Pvt.) Ltd.
                                    Paud Road, Kothrud, Pune,                                   
                                    Maharashtra, India                                    
                                    info@blueplanetsolutions.com                                    
                                    +91-20-25434632 / 25434622</p></li>
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


  <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
    ></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>




