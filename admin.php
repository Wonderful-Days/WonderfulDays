<?php
session_start();
if (!isset($_SESSION["admin"])) {
    exit;
}
// Connect to the database
$conn = mysqli_connect("localhost", "root", "Rahul@1234", "world");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user details with their events concatenated
$user_query = "
    SELECT 
        u.ID, u.fullname, u.username, u.email, u.country_code, u.phone, u.address, 
        ud.college_id, ud.company_name, ud.designation,
        GROUP_CONCAT(e.title SEPARATOR ', ') AS events_registered
    FROM tbl_user_basic u
    LEFT JOIN tbl_user_detail ud ON u.ID = ud.user_basic_id
    LEFT JOIN tbl_user_event ue ON u.ID = ue.user_basic_id
    LEFT JOIN tbl_events e ON ue.events_ID = e.ID
    GROUP BY u.ID
";
$user_result = mysqli_query($conn, $user_query);

// Retrieve event details
$event_query = "SELECT * FROM tbl_events";
$event_result = mysqli_query($conn, $event_query);

// Retrieve email log details
$email_log_query = "SELECT * FROM tbl_email_log";
$email_log_result = mysqli_query($conn, $email_log_query);

// Retrieve SMS log details
$sms_log_query = "SELECT * FROM tbl_sms_log";
$sms_log_result = mysqli_query($conn, $sms_log_query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Landing Page</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
        }

        .navbar {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar img {
            height: 60px;
            width: 60px;
            padding-left: 40px;
        }

        .navbar h2 {
            flex: 1;
            text-align: center;
            margin: 0;
        }

        .container {
            display: flex;
            height: calc(100vh - 60px);
        }

        .sidebar {
            width: 20%;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h5 {
            margin-top: 0;
        }

        .sidebar .nav-link {
            display: block;
            margin: 10px 0;
            padding: 10px;
            text-decoration: none;
            color: #000;
            border: 1px solid #007bff;
            border-radius: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .content {
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
        }

        .stat-box {
            width: 200px;
            height: 200px;
            padding: 20px 30px;
            /* Added padding on left and right */
            border-radius: 5px;
            text-align: center;
            background-color: #e0f7fa;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .stat-box:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .stat-box h5 {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .stat-box p {
            font-size: 1.5em;
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="#"><img src="logo.png" alt="Logo"></a>
        <h2>Dashboard</h2>
        <a href="adminLogout.php">Log Out</a>
    </div>

    <!-- Container -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="nav-link" href="user_details.php">User Details</a>
            <a class="nav-link" href="event_details.php">Event Details</a>
            <a class="nav-link" href="#">Email Logs</a>
            <a class="nav-link" href="#">Sms Log</a>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="stat-grid">
                <div class="stat-box">
                    <h5>Total Registered Users</h5> <!-- count from user table -->
                    <p>250</p>
                </div>
                <div class="stat-box">
                    <h5>Total Events</h5> <!-- count from events table -->
                    <p>100</p>
                </div>
                <div class="stat-box">
                    <h5>Total Employes</h5> <!-- count from admin table -->
                    <p>100</p>
                </div>
                <!-- <div class="stat-box">
                    <h5>Total logged user</h5>
                    <p>120</p>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>