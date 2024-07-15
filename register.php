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
    <!-- dropdown menu for multiple event-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
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
                <a class="nav-link" style="color:black" target="_blank" href="register.php">
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
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
          <input type="email" id="loginName" class="form-control" name="email"/>
          <label class="form-label" for="loginName">Email or username</label>
        </div>
  
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="loginPassword" class="form-control" name="password"/>
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
        <button type="submit" class="btn btn-primary btn-block mb-4" name="login" >Sign in</button>
  
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
      <form action="connect.php" method="post">
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
          <input type="text" id="registerName" class="form-control" name="fullName"/>
          <label class="form-label" for="registerName">Name</label>
        </div>
  
        <!-- Username input -->
        <div class="form-outline mb-4">
          <input type="text" id="registerUsername" class="form-control" name="username"/>
          <label class="form-label" for="registerUsername">Username</label>
        </div>
        <!-- mobile number -->
        <div class="form-outline mb-4">
          <div style="display: flex;">
              <select id="country_code" name="country_code" style="flex: 0.3;">
                <option value="1">USA (+1)</option>
                <option value="7">Russia (+7)</option>
                <option value="20">Egypt (+20)</option>
                <option value="27">South Africa (+27)</option>
                <option value="30">Greece (+30)</option>
                <option value="31">Netherlands (+31)</option>
                <option value="32">Belgium (+32)</option>
                <option value="33">France (+33)</option>
                <option value="34">Spain (+34)</option>
                <option value="36">Hungary (+36)</option>
                <option value="39">Italy (+39)</option>
                <option value="40">Romania (+40)</option>
                <option value="41">Switzerland (+41)</option>
                <option value="43">Austria (+43)</option>
                <option value="44">United Kingdom (+44)</option>
                <option value="45">Denmark (+45)</option>
                <option value="46">Sweden (+46)</option>
                <option value="47">Norway (+47)</option>
                <option value="48">Poland (+48)</option>
                <option value="49">Germany (+49)</option>
                <option value="51">Peru (+51)</option>
                <option value="52">Mexico (+52)</option>
                <option value="53">Cuba (+53)</option>
                <option value="54">Argentina (+54)</option>
                <option value="55">Brazil (+55)</option>
                <option value="56">Chile (+56)</option>
                <option value="57">Colombia (+57)</option>
                <option value="58">Venezuela (+58)</option>
                <option value="60">Malaysia (+60)</option>
                <option value="61">Australia (+61)</option>
                <option value="62">Indonesia (+62)</option>
                <option value="63">Philippines (+63)</option>
                <option value="64">New Zealand (+64)</option>
                <option value="65">Singapore (+65)</option>
                <option value="66">Thailand (+66)</option>
                <option value="81">Japan (+81)</option>
                <option value="82">South Korea (+82)</option>
                <option value="84">Vietnam (+84)</option>
                <option value="86">China (+86)</option>
                <option value="90">Turkey (+90)</option>
                <option value="91">India (+91)</option>
                <option value="92">Pakistan (+92)</option>
                <option value="93">Afghanistan (+93)</option>
                <option value="94">Sri Lanka (+94)</option>
                <option value="95">Myanmar (+95)</option>
                <option value="98">Iran (+98)</option>
                <option value="211">South Sudan (+211)</option>
                <option value="212">Morocco (+212)</option>
                <option value="213">Algeria (+213)</option>
                <option value="216">Tunisia (+216)</option>
                <option value="218">Libya (+218)</option>
                <option value="220">Gambia (+220)</option>
                <option value="221">Senegal (+221)</option>
                <option value="222">Mauritania (+222)</option>
                <option value="223">Mali (+223)</option>
                <option value="224">Guinea (+224)</option>
                <option value="225">Ivory Coast (+225)</option>
                <option value="226">Burkina Faso (+226)</option>
                <option value="227">Niger (+227)</option>
                <option value="228">Togo (+228)</option>
                <option value="229">Benin (+229)</option>
                <option value="230">Mauritius (+230)</option>
                <option value="231">Liberia (+231)</option>
                <option value="232">Sierra Leone (+232)</option>
                <option value="233">Ghana (+233)</option>
                <option value="234">Nigeria (+234)</option>
                <option value="235">Chad (+235)</option>
                <option value="248">Seychelles (+248)</option>
                <option value="249">Sudan (+249)</option>
                <option value="250">Rwanda (+250)</option>
                <option value="251">Ethiopia (+251)</option>
                <option value="252">Somalia (+252)</option>
                <option value="253">Djibouti (+253)</option>
                <option value="254">Kenya (+254)</option>
                <option value="255">Tanzania (+255)</option>
                <option value="256">Uganda (+256)</option>
                <option value="257">Burundi (+257)</option>
                <option value="258">Mozambique (+258)</option>
                <option value="260">Zambia (+260)</option>
                <option value="261">Madagascar (+261)</option>
                <option value="262">Reunion (+262)</option>
                <option value="263">Zimbabwe (+263)</option>
                <option value="264">Namibia (+264)</option>
                <option value="265">Malawi (+265)</option>
                <option value="266">Lesotho (+266)</option>
                <option value="267">Botswana (+267)</option>
                <option value="268">Eswatini (+268)</option>
                <option value="269">Comoros (+269)</option>
                <option value="290">Saint Helena (+290)</option>
                <option value="291">Eritrea (+291)</option>
                <option value="297">Aruba (+297)</option>
                <option value="298">Faroe Islands (+298)</option>
                <option value="299">Greenland (+299)</option>
                <option value="350">Gibraltar (+350)</option>
                <option value="351">Portugal (+351)</option>
                <option value="352">Luxembourg (+352)</option>
                <option value="353">Ireland (+353)</option>
                <option value="354">Iceland (+354)</option>
                <option value="355">Albania (+355)</option>
                <option value="356">Malta (+356)</option>
                <option value="357">Cyprus (+357)</option>
                <option value="358">Finland (+358)</option>
                <option value="359">Bulgaria (+359)</option>
                <option value="370">Lithuania (+370)</option>
                <option value="371">Latvia (+371)</option>
                <option value="372">Estonia (+372)</option>
                <option value="373">Moldova (+373)</option>
                <option value="374">Armenia (+374)</option>
                <option value="375">Belarus (+375)</option>
                <option value="376">Andorra (+376)</option>
                <option value="377">Monaco (+377)</option>
                <option value="378">San Marino (+378)</option>
                <option value="379">Vatican City (+379)</option>
                <option value="380">Ukraine (+380)</option>
                <option value="381">Serbia (+381)</option>
                <option value="382">Montenegro (+382)</option>
                <option value="383">Kosovo (+383)</option>
                <option value="385">Croatia (+385)</option>
                <option value="386">Slovenia (+386)</option>
                <option value="389">North Macedonia (+389)</option>
                <option value="420">Czech Republic (+420)</option>
                <option value="421">Slovakia (+421)</option>
                <option value="423">Liechtenstein (+423)</option>
                <option value="500">Falkland Islands (+500)</option>
                <option value="501">Belize (+501)</option>
                <option value="502">Guatemala (+502)</option>
                <option value="503">El Salvador (+503)</option>
                <option value="504">Honduras (+504)</option>
                <option value="505">Nicaragua (+505)</option>
                <option value="506">Costa Rica (+506)</option>
                <option value="507">Panama (+507)</option>
                <option value="509">Haiti (+509)</option>
                <option value="590">Guadeloupe (+590)</option>
                <option value="591">Bolivia (+591)</option>
                <option value="592">Guyana (+592)</option>
                <option value="593">Ecuador (+593)</option>
                <option value="594">French Guiana (+594)</option>
                <option value="595">Paraguay (+595)</option>
                <option value="596">Martinique (+596)</option>
                <option value="597">Suriname (+597)</option>
                <option value="598">Uruguay (+598)</option>
                <option value="599">Curacao (+599)</option>
                <option value="670">East Timor (+670)</option>
                <option value="672">Antarctica (+672)</option>
                <option value="673">Brunei (+673)</option>
                <option value="674">Nauru (+674)</option>
                <option value="675">Papua New Guinea (+675)</option>
                <option value="676">Tonga (+676)</option>
                <option value="677">Solomon Islands (+677)</option>
                <option value="678">Vanuatu (+678)</option>
                <option value="679">Fiji (+679)</option>
                <option value="680">Palau (+680)</option>
                <option value="681">Wallis and Futuna (+681)</option>
                <option value="682">Cook Islands (+682)</option>
                <option value="683">Niue (+683)</option>
              </select>
              <input type="number" id="phone" name="phone" placeholder="mobile number" style="flex: 0.7;" pattern="[0-9]{1,14}" required>
          </div>
          </div>
           <!-- end mobile -->
        
  
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="registerEmail" class="form-control" name="email"/>
          <label class="form-label" for="registerEmail">Email</label>
        </div>
        <!--Address-->
        <div class="form-outline mb-4">
          <input type="address" id="registeraddress" class="form-control" name="address"/>
          <label class="form-label" for="registerUsername">Address</label>
        </div>


  
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="registerPassword" class="form-control" name="password"/>
          <label class="form-label" for="registerPassword">Password</label>
        </div>
  
        <!-- Repeat Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="registerRepeatPassword" class="form-control" />
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
        <button type="submit" class="btn btn-primary btn-block mb-3" name="register">Sign up</button>
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