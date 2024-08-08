<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$servername = "localhost";
$username = "root";
$password = "Rahul@1234";
$dbname = "world";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch current user details from the database using the email from the session
$sql = "SELECT * FROM tbl_user_basic WHERE ID =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION["userId"]);
$stmt->execute();
$result = $stmt->get_result();
$user_basic_row = $result->fetch_assoc();

$sql = "SELECT * FROM tbl_user_detail WHERE user_basic_id =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION["userId"]);
$stmt->execute();
$result = $stmt->get_result();
$user_detail_row = $result->fetch_assoc();

// Fetch all events from the database
$sql = "SELECT * FROM tbl_events_master";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$events = array();
while ($event_row = $result->fetch_assoc()) {
    $events[] = $event_row;
}

$registered_events_query = "SELECT * FROM tbl_user_event WHERE user_basic_ID = ?";
$stmt = mysqli_prepare($conn, $registered_events_query);
mysqli_stmt_bind_param($stmt, "i", $_SESSION["userId"]);
mysqli_stmt_execute($stmt);
$registered_events_result = mysqli_stmt_get_result($stmt);

$registered_events = array();

while ($row = mysqli_fetch_assoc($registered_events_result)) {
    $registered_events[] = $row["events_ID"];
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update user details in the database
    $update_sql = "UPDATE tbl_user_basic SET fullname =?, address =?,state =?, country =?,zipcode =?, email =?, phone =?, country_code =? WHERE ID =?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssisssi", $_POST["fullname"], $_POST["address"], $_POST["state"], $_POST["country"], $_POST["zipcode"], $_POST["email"], $_POST["phone"], $_POST["country_code"], $_SESSION["userId"]);
    $update_stmt->execute();
    echo "<script>alert('hello')</script>";

    $userId = $_SESSION["userId"];
    $profilePicture = "profile";
    $fullName = $_SESSION["name"];
    $bio = $_POST["bio"];
    $collegeId = $_POST["college_id"];
    $companyName = $_POST["company_name"];
    $hobbies = $_POST["hobbies"];
    $socialFacebook = $_POST["social_facebook"];
    $socialInstagram = $_POST["social_instagram"];
    $socialX = $_POST["social_x"];
    $socialYoutube = $_POST["social_youtube"];
    $socialLinkedin = $_POST["social_linkedin"];
    $designation = $_POST["designation"];

    $insert_sql = "INSERT INTO tbl_user_detail (user_basic_id, profile_picture, name, bio_short_desc, college_id, company_name, hobbies, social_facebook, social_instagram, social_x, social_youtube, social_linkedin, designation) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
               ON DUPLICATE KEY UPDATE 
               profile_picture = VALUES(profile_picture), 
               name = VALUES(name), 
               bio_short_desc = VALUES(bio_short_desc), 
               college_id = VALUES(college_id), 
               company_name = VALUES(company_name), 
               hobbies = VALUES(hobbies), 
               social_facebook = VALUES(social_facebook), 
               social_instagram = VALUES(social_instagram), 
               social_x = VALUES(social_x), 
               social_youtube = VALUES(social_youtube), 
               social_linkedin = VALUES(social_linkedin), 
               designation = VALUES(designation)";

    if ($insert_stmt = $conn->prepare($insert_sql)) {
        $insert_stmt->bind_param(
            "issssssssssss",
            $userId,
            $profilePicture,
            $fullName,
            $bio,
            $collegeId,
            $companyName,
            $hobbies,
            $socialFacebook,
            $socialInstagram,
            $socialX,
            $socialYoutube,
            $socialLinkedin,
            $designation
        );

        if (!$insert_stmt->execute()) {
            echo "Execute failed: (" . $insert_stmt->errno . ") " . $insert_stmt->error;
        }
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
    $registered_events = array();
    $delete_sql = "DELETE FROM tbl_user_event WHERE user_basic_ID = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $_SESSION["userId"]);
    $delete_stmt->execute();

    // Insert new checked events
    $update_sql = "INSERT INTO tbl_user_event (user_basic_ID, events_ID) VALUES (?,?)";
    $update_stmt = $conn->prepare($update_sql);

    foreach ($_POST["registered_events"] as $event_id) {
        $registered_events[] = $event_id;
        $update_stmt->bind_param("is", $_SESSION["userId"], $event_id);
        $update_stmt->execute();
    }
    $registered_events_str = implode(",", $registered_events);

    // Update the session with new data
    $_SESSION["fullname"] = $_POST["fullname"];
    $_SESSION["bio_short_desc"] = $_POST["bio_short_desc"];
    $_SESSION["address"] = $_POST["address"];
    $_SESSION["state"] = $_POST["state"];
    $_SESSION["country"] = $_POST["country"];
    $_SESSION["zipcode"] = $_POST["zipcode"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["phone"] = $_POST["phone"];
    $_SESSION["country_code"] = $_POST["country_code"];
    $_SESSION["college_id"] = $_POST["college_id"];
    $_SESSION["company_name"] = $_POST["company_name"];
    $_SESSION["hobbies"] = $_POST["hobbies"];
    $_SESSION["social_facebook"] = $_POST["social_facebook"];
    $_SESSION["social_instagram"] = $_POST["social_instagram"];
    $_SESSION["social_x"] = $_POST["social_x"];
    $_SESSION["social_youtube"] = $_POST["social_youtube"];
    $_SESSION["social_linkedin"] = $_POST["social_linkedin"];
    $_SESSION["designation"] = $_POST["designation"];
    $_SESSION["registered_events"] = $registered_events_str;

    // Redirect back to the profile page after updating


    $update_stmt->close();
    $insert_stmt->close();
    header('Location: profile.php');
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        margin: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: white;
        font-family: Arial, sans-serif;
    }

    .form-box {
        background-color: rgb(239, 237, 240);
        margin: 50px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        max-width: 500px;
        width: 100%;
        position: relative;
    }

    .form-box::before {
        content: '';
        position: absolute;
        top: -4px;
        left: -4px;
        right: -4px;
        bottom: -4px;
        z-index: -1;
        background: linear-gradient(45deg, red, orange, yellow, green, blue, indigo, violet);
        border-radius: 14px;
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .input-field {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .submit-button {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .submit-button:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* Add this to prevent the form from going out of bounds */
    .form-box form {
        max-height: 80vh;
        overflow-y: auto;
    }

    .navbar-brand img {
        height: 55px;
        width: 200px;
    }

    #nav-bar {
        width: 100%;
        margin: 0;
        padding: 0;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    @media (min-width: 768px) {
        .button-63 {
            font-size: 24px;
            min-width: 196px;
        }
    }

    .navbar {
        padding: 10px;
        background-color: white;
    }

    .logo {
        height: 30px;
        padding-left: 50px;
    }

    .nav-bar .dropdown .dropdown-menu:hover {
        background-color: black;
    }
</style>

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
    <div class="form-box">
        <h2>Edit Profile</h2>
        <form action="editDetail.php" method="post">
            <label>Full Name:</label>
            <input type="text" name="fullname" class="input-field" value="<?php echo htmlspecialchars($user_basic_row["fullname"] ?? ''); ?>" placeholder="Full Name"><br><br>

            <label>Short Bio:</label>
            <input type="text" name="bio" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["bio_short_desc"] ?? ''); ?>" placeholder="Short bio"><br><br>

            <label>Address:</label>
            <input type="text" name="address" class="input-field" value="<?php echo htmlspecialchars($user_basic_row["address"] ?? ''); ?>" placeholder="Address"><br><br>
            <label>State:</label>
            <input type="text" name="state" class="input-field" value="<?php echo htmlspecialchars($user_basic_row["state"] ?? ''); ?>" placeholder="State"><br><br>
            <label>Country:</label>
            <input type="text" name="country" class="input-field" value="<?php echo htmlspecialchars($user_basic_row["country"] ?? ''); ?>" placeholder="Country"><br><br>
            <label>Zipcode:</label>
            <input type="number" name="zipcode" class="input-field" value="<?php echo htmlspecialchars($user_basic_row["zipcode"] ?? ''); ?>" placeholder="Zipcode"><br><br>

            <label>Email:</label>
            <input type="email" name="email" class="input-field" value="<?php echo htmlspecialchars($user_basic_row["email"] ?? ''); ?>" placeholder="Email"><br><br>

            <label for="country_code">Country Code:</label>
            <select name="country_code" required>
                <option value="1" <?php echo ($user_basic_row["country_code"] == '1') ? 'selected' : ''; ?>>+1 (USA)</option>
                <option value="44" <?php echo ($user_basic_row["country_code"] == '44') ? 'selected' : ''; ?>>+44 (UK)</option>
                <option value="91" <?php echo ($user_basic_row["country_code"] == '91') ? 'selected' : ''; ?>>+91 (India)</option>
                <option value="61" <?php echo ($user_basic_row["country_code"] == '61') ? 'selected' : ''; ?>>+61 (Australia)</option>
                <option value="49" <?php echo ($user_basic_row["country_code"] == '49') ? 'selected' : ''; ?>>+49 (Germany)</option>
                <option value="33" <?php echo ($user_basic_row["country_code"] == '33') ? 'selected' : ''; ?>>+33 (France)</option>
                <option value="39" <?php echo ($user_basic_row["country_code"] == '39') ? 'selected' : ''; ?>>+39 (Italy)</option>
                <option value="55" <?php echo ($user_basic_row["country_code"] == '55') ? 'selected' : ''; ?>>+55 (Brazil)</option>
                <option value="81" <?php echo ($user_basic_row["country_code"] == '81') ? 'selected' : ''; ?>>+81 (Japan)</option>
                <option value="86" <?php echo ($user_basic_row["country_code"] == '86') ? 'selected' : ''; ?>>+86 (China)</option>
                <option value="27" <?php echo ($user_basic_row["country_code"] == '27') ? 'selected' : ''; ?>>+27 (South Africa)</option>
                <option value="82" <?php echo ($user_basic_row["country_code"] == '82') ? 'selected' : ''; ?>>+82 (South Korea)</option>
                <option value="34" <?php echo ($user_basic_row["country_code"] == '34') ? 'selected' : ''; ?>>+34 (Spain)</option>
                <option value="90" <?php echo ($user_basic_row["country_code"] == '90') ? 'selected' : ''; ?>>+90 (Turkey)</option>
                <option value="62" <?php echo ($user_basic_row["country_code"] == '62') ? 'selected' : ''; ?>>+62 (Indonesia)</option>
                <option value="971" <?php echo ($user_basic_row["country_code"] == '971') ? 'selected' : ''; ?>>+971 (United Arab Emirates)</option>
                <option value="66" <?php echo ($user_basic_row["country_code"] == '66') ? 'selected' : ''; ?>>+66 (Thailand)</option>
                <option value="92" <?php echo ($user_basic_row["country_code"] == '92') ? 'selected' : ''; ?>>+92 (Pakistan)</option>
                <option value="48" <?php echo ($user_basic_row["country_code"] == '48') ? 'selected' : ''; ?>>+48 (Poland)</option>
                <option value="98" <?php echo ($user_basic_row["country_code"] == '98') ? 'selected' : ''; ?>>+98 (Iran)</option>
            </select>

            <label>Phone Number:</label>
            <input type="text" name="phone" class="input-field" value="<?php echo htmlspecialchars($user_basic_row["phone"] ?? ''); ?>" placeholder="Phone Number"><br><br>

            <label>College ID:</label>
            <input type="text" name="college_id" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["college_id"] ?? ''); ?>" placeholder="College ID"><br><br>

            <label>Company Name:</label>
            <input type="text" name="company_name" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["company_name"] ?? ''); ?>" placeholder="Company Name"><br><br>

            <label>Hobbies:</label>
            <input type="text" name="hobbies" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["hobbies"] ?? ''); ?>" placeholder="Hobbies"><br><br>

            <label>Facebook:</label>
            <input type="text" name="social_facebook" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["social_facebook"] ?? ''); ?>" placeholder="Facebook"><br><br>

            <label>Instagram:</label>
            <input type="text" name="social_instagram" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["social_instagram"] ?? ''); ?>" placeholder="Instagram"><br><br>
            <label>Twitter:</label>
            <input type="text" name="social_x" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["social_x"] ?? ''); ?>" placeholder="Twitter"><br><br>
            <label>YouTube:</label>
            <input type="text" name="social_youtube" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["social_youtube"] ?? ''); ?>" placeholder="YouTube"><br><br>
            <label>LinkedIn:</label>
            <input type="text" name="social_linkedin" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["social_linkedin"] ?? ''); ?>" placeholder="LinkedIn"><br><br>
            <label>Designation:</label>
            <input type="text" name="designation" class="input-field" value="<?php echo htmlspecialchars($user_detail_row["designation"] ?? ''); ?>" placeholder="Designation"><br><br>
            <h3>Registered Events:</h3>
            <?php foreach ($events as $event) { ?>
                <input type="checkbox" name="registered_events[]" value="<?php echo $event["ID"]; ?>" <?php if (in_array($event["ID"], $registered_events)) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                <label><?php echo $event["event_name"]; ?></label><br>
            <?php } ?>
            <button type="submit" class="submit-button">Update Profile</button>
        </form>
    </div>

</body>

</html>