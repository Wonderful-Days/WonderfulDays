<?php
session_start();

// Connect to the database
$conn = mysqli_connect("localhost", "root", "Rahul@1234", "world");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user basic details
$user_basic_query = "SELECT * FROM tbl_user_basic WHERE ID = " . $_SESSION["userId"];
$user_basic_result = mysqli_query($conn, $user_basic_query);
$user_basic_row = mysqli_fetch_assoc($user_basic_result);

// Fetch user detail details
$user_detail_query = "SELECT * FROM tbl_user_detail WHERE user_basic_id = " . $_SESSION["userId"];
$user_detail_result = mysqli_query($conn, $user_detail_query);
$user_detail_row = mysqli_fetch_assoc($user_detail_result);

// Prepare registered events query
$registered_events_query = "SELECT * FROM tbl_user_event WHERE user_basic_ID = ?";
$stmt = mysqli_prepare($conn, $registered_events_query);
mysqli_stmt_bind_param($stmt, "i", $_SESSION["userId"]);
mysqli_stmt_execute($stmt);
$registered_events_result = mysqli_stmt_get_result($stmt);

$registered_events = array();

while ($row = mysqli_fetch_assoc($registered_events_result)) {
    $registered_events[] = $row["events_ID"];
}

$event_names = array();
foreach ($registered_events as $event_id) {
    $sql = "SELECT event_name FROM tbl_events_master WHERE ID = '$event_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $event_row = $result->fetch_assoc();
    $event_names[] = $event_row["event_name"];
}
// Now $registered_events is an array of all the rows that match the user_basic_id
// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: white;
        font-family: Arial, sans-serif;
    }

    .profile-box {
        background-color: rgb(239, 237, 240);
        padding: 20px;
        margin: 50px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        max-width: 500px;
        width: 100%;
        position: relative;
    }

    .profile-box::before {
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

    .profile-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        transition: transform 0.3s;
        margin-bottom: 15px;
    }

    .profile-photo:hover {
        transform: scale(1.1);
    }

    .name {
        margin: 10px 0;
        font-size: 24px;
        color: #333;
    }

    .designation {
        margin: 5px 0;
        font-size: 18px;
        color: #777;
    }

    .details {
        text-align: left;
        font-size: 16px;
        color: #555;
    }

    .details p {
        margin: 5px 0;
    }

    .edit-button {
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

    .edit-button:hover {
        background-color: #0056b3;
        transform: scale(1.05);
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
    <div>
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
                            echo '<div class="nav-item dropdown show">
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
    </div>
    <div class="profile-box">
        <img src="images/profile.1024x1024.png" alt="Profile Photo" class="profile-photo">
        <?php
        echo '<h2 class="name">' . (isset($user_basic_row["fullname"]) ? $user_basic_row["fullname"] : 'Not available') . '</h2>
<p class="designation">' . (isset($user_detail_row["designation"]) ? $user_detail_row["designation"] : 'Not available') . '</p>
<div class="details">
    <p><strong>Bio: </strong>' . (isset($user_detail_row["bio_short_desc"]) ? $user_detail_row["bio_short_desc"] : 'Not available') . '</p>
    <p><strong>Address: </strong>' . (isset($user_basic_row["address"]) ? $user_basic_row["address"] : 'Not available') . '</p>
    <p><strong>State: </strong>' . (isset($user_basic_row["state"]) ? $user_basic_row["state"] : 'Not available') . '</p>
    <p><strong>Country: </strong>' . (isset($user_basic_row["country"]) ? $user_basic_row["country"] : 'Not available') . '</p>
    <p><strong>Zipcode: </strong>' . (isset($user_basic_row["zipcode"]) ? $user_basic_row["zipcode"] : 'Not available') . '</p>
    
    <p><strong>Registered Events:</strong>' . implode(', ', $event_names) . '</p>
    <p><strong>Email:</strong> ' . (isset($user_basic_row["email"]) ? $user_basic_row["email"] : 'Not available') . '</p>
    <p><strong>Country Code:</strong> ' . (isset($user_basic_row["country_code"]) ? $user_basic_row["country_code"] : 'Not available') . '</p>
    <p><strong>Phone no:</strong> ' . (isset($user_basic_row["phone"]) ? $user_basic_row["phone"] : 'Not available') . '</p>
    
    <p><strong>College ID:</strong> ' . (isset($user_detail_row["college_id"]) ? $user_detail_row["college_id"] : 'Not available') . '</p>
    <p><strong>Company Name:</strong> ' . (isset($user_detail_row["company_name"]) ? $user_detail_row["company_name"] : 'Not available') . '</p>
    <p><strong>Hobbies:</strong> ' . (isset($user_detail_row["hobbies"]) ? $user_detail_row["hobbies"] : 'Not available') . '</p>
    <p><strong>Facebook:</strong> ' . (isset($user_detail_row["social_facebook"]) ? $user_detail_row["social_facebook"] : 'Not available') . '</p>
    <p><strong>Instagram:</strong> ' . (isset($user_detail_row["social_instagram"]) ? $user_detail_row["social_instagram"] : 'Not available') . '</p>
    <p><strong>X:</strong> ' . (isset($user_detail_row["social_x"]) ? $user_detail_row["social_x"] : 'Not available') . '</p>
    <p><strong>YouTube:</strong> ' . (isset($user_detail_row["social_youtube"]) ? $user_detail_row["social_youtube"] : 'Not available') . '</p>
    <p><strong>LinkedIn:</strong> ' . (isset($user_detail_row["social_linkedin"]) ? $user_detail_row["social_linkedin"] : 'Not available') . '</p>
</div>
<form action="editDetail.php" method="get">
    <button class="edit-button" role="button" name="edit" value="edit">Edit Profile</button>
</form>
<form action="logout.php" method="post">
    <button class="edit-button" role="button" name="logout" value="logout">Logout</button>
</form>';
        ?>
    </div>

</body>

</html>