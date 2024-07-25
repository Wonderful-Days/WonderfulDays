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

    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"/>
      <!-- Font Awesome -->
      <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
      />
      <!-- Google Fonts -->
      <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
      />
      <!-- MDB -->
      <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
      rel="stylesheet"
      />
    <link rel="stylesheet" href="style.css">
    <title>Wonderful days</title>
  </head>
  <body>
<!-- HEADER SECTION -->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png"class="logo"></a>
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
                    <a class="dropdown-item" href="sunday.php">Sunday</a>
                    <a class="dropdown-item" href="monday.php">Monday</a>
                    <a class="dropdown-item" href="tuesday.php">Tuesday</a>
                    <a class="dropdown-item" href="wendnesday.php">Wednesday</a>
                    <a class="dropdown-item" href="thursday.php">Thursday</a>
                    <a class="dropdown-item" href="friday.php">Friday</a>
                    <a class="dropdown-item" href="saturday.php">Saturday</a>
                  </div>
                  
                </li>
              
                <li class="nav-item act" >
                  <a class="nav-link" style="color:black" href="#testimonials"> 
                    <img src="images/review)logo.png"
                    width="24"
                    height="24"
                    fill="currentColor"
                    class="bi d-flex-row mx-auto mb-1"
                    viewBox="0 0 16 16">
                      Review </a>
                </li>
                <li class="nav-item act">
                  <a class="nav-link" style="color:black" href="aboutus.php"><svg
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
     



    <!-- BANNER SECTION -->
    <section id="banner">
      <video autoplay muted loop >
        <source src="images/My Video1.mp4" type="video/mp4">
      </video>
        <!-- <div class="container">
          
            <div class="row">
                <div class="col-md-6">
                    <h1 class="promo-title">Wanna make your ordinary days as "Great Days"</h1>
                    <br>
                    <div class="text-center">
                      <button type="button" class="btn btn-warning">Join Us</button>
                      </div>
                    </div>
                   
            </div>
        </div> -->
       
    </section>
  <br>
  <br>
  <br>
  <br>

<!-- BAnner End  -->

<Section>
  <div class="para1">
    <p>We are very excited to share with you that we are going to organize event days as “WonderfulDays! 
      Any day that ends in Y!!” is an event day, can you imagine days of the week without ending Y? Of course 
      not so we are having events on all the days of the week exciting isn’t it? In this, each day you will have a 
      new theme and activity. Every day we will join you through Google meet and zoom in the evenings. In this meeting, 
      students will gather together in sharing ideas like a mini Clubhouse.</p>
      <p>They will be allowed to discuss in the sessions 
      and interact with each other. Students will be able to share knowledge, thoughts and will get new skills and concepts. You 
      will come to know new people, new contacts and much more. You will feel happy to share your own ideas with people around 
      the world. You will come toknow that there are a lot of people who share the same thoughts and arepassionate about the same. 
      This is really interesting, isn’t it? It will help youin developing their abilities.
      </p>
  </div>
</Section>

<!--Days of Week Sectio Start-->

<div class="album py-5 ">
  <div class="container ">
    <h2 class="text-center p-b-30">
      <!--
      <div class="waviy">
      <span style="--i:1; color: blue; font-family: cursive;" >E</span>
      <span style="--i:2; color: rgb(233, 76, 9); font-family: cursive;">V</span>
      <span style="--i:3; color: rgb(183, 146, 16); font-family: cursive;">E</span>
      <span style="--i:4; color: rgb(72, 134, 7); font-family: cursive;">N</span>
      <span style="--i:5; color: rgb(13, 237, 162); font-family: cursive;">T</span>
      <span style="--i:6; color: rgb(123, 15, 195); font-family: cursive;">S </span>
      <span> </span>
      <span style="--i:7; color: blue; font-family: cursive;">F</span>
      <span style="--i:8; color: rgb(143, 13, 207); font-family: cursive;">O</span>
      <span style="--i:9; color: rgb(221, 8, 221); font-family: cursive;">R </span>
      <span> </span>
      <span style="--i:10; color: rgb(255, 0, 162); font-family: cursive;">Y</span>
      <span style="--i:11; color: rgb(255, 0, 21); font-family: cursive;">O</span>
      <span style="--i:12; color: rgb(233, 192, 10); font-family: cursive;">U</span> 
    </div>
    -->
      Events For You
  </h2>
    <br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <!--Sunday-->
      <div class="col text-center" >
        <div class="card shadow-sm" >
          <img src="images/Innovation Sunday.png" class="bd-placeholder-img card-img-top" height="300" role="img" alt="">
          <div class="card-body">
              <h4><b>Sunday</b></h4>
            <p class="card-text">Sunday is to share your Funny and innovative ideas with everyone. Days like Funday-Sundat, InnovationSunday...</p>
            
                <button type="button" class="btn  btn-outline-primary"><a href="sunday.php">Read more</a></button>
                
              </div>
              
            
        </div>
      </div>
      <!--Monday-->
      <div class="col text-center">
           
        <div class="card shadow-sm">
          <img src="images/Mooney Monday.png" class="bd-placeholder-img card-img-top" height="300" role="img" alt="">
          <div class="card-body">
              <h4><b>Monday</b></h4>
              <p class="card-text">Mondayis all about poetry. People who are good at poetry are welcome.
                Days like Mooney Monday, Motivational Monday...
                 </p>
           
                  <button type="button" class="btn btn-outline-primary"><a href="register.php">Read more</a></button>
                  
                </div>
              
            
        </div>
      </div>
       <!--Tuesday-->
      <div class="col text-center">
          
        <div class="card shadow-sm">
          <img src="images/TeacherTuesday.png" class="bd-placeholder-img card-img-top" height="300" role="img" alt="">
          <div class="card-body">
            <h4><b> Tuesday</b></h4>
            <p class="card-text">Teachers Tuesday aims about bringing teachers togetherand sharing of taught about student community...</p>
            
                  <button type="button" class="btn btn-outline-primary"><a href="register.php">Read more</a></button>
                  
                </div>
             
           
        </div>
      </div>
       <!--Wednesday-->
      <div class="col text-center">
          
        <div class="card shadow-sm">
          <img src="images/Copy of WonderfulWednesday.png" class="bd-placeholder-img card-img-top" height="300" role="img" alt="">
          <div class="card-body">
            <h4><b> Wednesday</b></h4>
            <p class="card-text">Wednesday is an interesting day to celevrate days like Wonderful Wednesday, Women's Wednesday... </p>
            
                  <button type="button" class="btn btn-outline-primary"><a href="register.php">Read more</a></button>
                  
                </div>
          </div>
      </div>
       <!--Thursday-->
      <div class="col text-center">
          
        <div class="card shadow-sm">
          <img src="images/Teaming Thursday.jpg" class="bd-placeholder-img card-img-top" height="300" role="img" alt="">
          <div class="card-body">
            <h4><b>Thursday</b></h4>
            <p class="card-text">Thursdays will carry teaming and all the teams enrolled in Smart cookies will take a turn anddiscuss their...</p>
           
                  <button type="button" class="btn  btn-outline-primary"><a href="register.php">Read more</a></button>
                  
                </div>
            
        </div>
      </div>
           <!--Friday-->
      <div class="col text-center">
      
        <div class="card shadow-sm">
          <img src="images/Farming  Friday.png" class="bd-placeholder-img card-img-top" height="300" role="img" alt="">
          <div class="card-body">
            <h4><b>Friday</b></h4>
            <p class="card-text">Friday aims at bringing all  the days like Farming Friday, Fashion Friday, Fin-Tech Friday, Foodie Friday...</p>
            
                  <button type="button" class="btn  btn-outline-primary"><a href="register.php">Read more</a></button>
                  
           
          </div>
        </div>
      </div>
       <!--Saturday-->
      <div class="col text-center" >
          
        <div class="card shadow-sm">
          <img src="images/saturday.jpg" class="bd-placeholder-img card-img-top" height="300" role="img" alt="">
          <div class="card-body">
              <h4><b>Saturday</b></h4>
              <p class="card-text">Saturdays aremagical days, full of promise and freedom from the moment you open your eyes inthe morning...</p>
           
                  <button type="button" class="btn btn-outline-primary"><a href="register.php">Read more</a></button>
                  
                </div>
              
           
        </div>
      </div>     
    </div>
  </div>
</div>
<!--Days of Week Sectio End-->
<br>
<br>
<br>


<!--About section start-->
<div id=about1>
  <br><br>
  <h3 id=title style=" color:black;"">About us </h3>
  <div class="row">
    <div class="column">
      <img src="images/avikulkarni.png" alt="Snow" style="width:250px" "height:400px" border-radius:15px; id="avi">
    </div>
    <div class="column">
      <img src="images/rakeshkhatri.png" alt="Snow" style="width:250px" "height:400px" border-radius:15px; id="rakesh">
    </div>
    </div>
    <p style="font-family:verdana; color:black; padding-left:20px;" ><b>At WonderfulDays, we believe that
      every day should be an opportunity to create lifelong memories, and we're
      dedicated to making that a reality for our clientsAs an event planning company 
      that hosts daily events, we're dedicated to providing unique and memorable experiences 
      every day of the week.From Monday to Sunday, we offer a wide range of events that cater to a variety 
      of interests. Our commitment to quality and creativity has helped us establish a reputation as a leading 
      event planning company, and we're proud to offer a diverse range of events that cater to all tastes
      and preferences.</b></p>
      <button class="btn24" href:"aboutus.php">EXPLORE MORE </button>
  </div>

<!--About Us End-->



<br>
<br>
<br>
<br>
<!-- companion starts -->
<section class="pt-3 pb-4">
  <div class="container ">
    <div class="row mt-4">
      <div class="col text-center">
        <h3>
          Our Companion Products
        </h3>
      </div>
    </div>
    <hr>
    <!-- <div class="row">
      <div class="col-md-4 text-center products">
        <img class="img-fluid qualities-img "  src="images/startupWorld.jfif"   alt="Card image cap">
        <h3>StartUp World</h3>
        
        <a href="https://startupworld.in/" target="_blank"><button class="btn btn-warning">View details »</button></a>
      </div>
       <div class="col-md-4 text-center products">
        <img class="img-fluid qualities-img " src="images/campusRadio.jfif"   alt="Card image cap">
        <h3>Campus Radio</h3>
        
        <a href="https://www.startupworld.in/project_radio.php" target="_blank"><button class="btn btn-warning">View details »</button></a>
      </div>
      <div class="col-md-4 text-center products">
        <img class="img-fluid qualities-img " src="images/campusTv.jfif"   alt="Card image cap">
        <h3>Campus Tv</h3>
        
        <a href="https://smartcookie.in/blog.php" target="_blank"><button class="btn btn-warning">View details »</button></a>
      </div>
      
    </div> -->

    <div class="container-xl">
      <div class="row">
        <div class="col-md-9  mx-auto">
          
          <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
            <!-- Carousel indicators -->
             
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img "  src="images/startupWorld.jfif"   alt="Card image cap">
                    <h3>StartUp World</h3>
                    
                    <a href="https://startupworld.in/" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                   <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img " src="images/campusRadio.jfif"   alt="Card image cap">
                    <h3>Campus Radio</h3>
                    
                    <a href="https://www.startupworld.in/project_radio.html" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                  <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img " src="images/campusTv.jfif"   alt="Card image cap">
                    <h3>Campus Tv</h3>
                    
                    <a href="https://smartcookie.in/blog.html" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img "  src="images/startupWorld.jfif"   alt="Card image cap">
                    <h3>StartUp World</h3>
                    
                    <a href="https://startupworld.in/" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                   <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img " src="images/campusRadio.jfif"   alt="Card image cap">
                    <h3>Campus Radio</h3>
                    
                    <a href="https://www.startupworld.in/project_radio.html" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                  <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img " src="images/campusTv.jfif"   alt="Card image cap">
                    <h3>Campus Tv</h3>
                    
                    <a href="https://smartcookie.in/blog.html" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img "  src="images/startupWorld.jfif"   alt="Card image cap">
                    <h3>StartUp World</h3>
                    
                    <a href="https://startupworld.in/" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                   <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img " src="images/campusRadio.jfif"   alt="Card image cap">
                    <h3>Campus Radio</h3>
                    
                    <a href="https://www.startupworld.in/project_radio.html" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                  <div class="col-md-4 text-center products">
                    <img class="img-fluid qualities-img " src="images/campusTv.jfif"   alt="Card image cap">
                    <h3>Campus Tv</h3>
                    
                    <a href="https://smartcookie.in/blog.html" target="_blank"><button class="btn btn-warning">View details »</button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control-prev" data-target="#myCarousel" href="#myCarousel" data-slide="prev">
              <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
              <i class="fa fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next" data-target="#myCarousel" href="#myCarousel" data-slide="next">
              <span class="carousel-control-next-icon " aria-hidden="true"></span>
              <i class="fa fa-chevron-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <br>
    <hr>
   
</section>
<!-- Companion ends -->




<!-- Review section start -->

<!-- Carousel wrapper -->
  <br>
  <h2 class="text-center">What our participants says about us</h2>
<br><br><br><div id="carouselExampleControls" class="carousel slide text-center carousel-dark" data-mdb-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="rounded-circle shadow-1-strong mb-4"
        src="images/imagePlaceholder.jpg" alt="avatar"
        style="width: 150px;" />
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h5 class="mb-3">Dr. Subrata	Chakrabarti</h5>
          <p>Kishan-Sathi FPO ( Gurukul )</p>
          <p class="text-muted">
            <i class="fas fa-quote-left pe-2"></i>
            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
            nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
            fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
            doloremque.<i class="fas fa-quote-left pe-1"></i> -->
          </p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="rounded-circle shadow-1-strong mb-4"
        src="images/imagePlaceholder.jpg" alt="avatar"
        style="width: 150px;" />
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h5 class="mb-3">SUNIL	KULKARNI</h5>
          <p>BVDU COLLEGE OF NURSING SANGLI MAHARASHTRA</p>
          <p class="text-muted">
            <!-- <i class="fas fa-quote-left pe-2"></i>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
            nesciunt sint eligendi reprehenderit reiciendis.<i class="fas fa-quote-left pe-2"></i> -->
          </p>
        </div>
      </div>

    </div>
    <div class="carousel-item">
      <img class="rounded-circle shadow-1-strong mb-4"
        src="images/imagePlaceholder.jpg" alt="avatar" style="width: 150px;" />
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h5 class="mb-3">Dr. Ganesh Chandra	Dhal</h5>
          <p>NIT Meghalaya</p>
          <p class="text-muted">
            <!-- <i class="fas fa-quote-left pe-2"></i>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus et deleniti
            nesciunt sint eligendi reprehenderit reiciendis, quibusdam illo, beatae quia
            fugit consequatur laudantium velit magnam error. Consectetur distinctio fugit
            doloremque.<i class="fas fa-quote-left pe-2"></i> -->
          </p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls"
    data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls"
    data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br><br><br><br>
<!-- Carousel wrapper -->
<!-- Review section end-->  

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


    <script src="script.js"></script>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  
  </body>
</html>