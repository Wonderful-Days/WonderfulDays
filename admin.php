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


// Retrieve total number of registered users
$user_count_query = "SELECT COUNT(*) as total_users FROM tbl_user_basic";
$user_count_result = mysqli_query($conn, $user_count_query);
$user_count_row = mysqli_fetch_assoc($user_count_result);
$total_users = $user_count_row['total_users'];

// Retrieve total number of events
$event_count_query = "SELECT COUNT(*) as total_events FROM tbl_events";
$event_count_result = mysqli_query($conn, $event_count_query);
$event_count_row = mysqli_fetch_assoc($event_count_result);
$total_events = $event_count_row['total_events'];
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
        <img src="./images/logo.png" alt="Logo">
        <h2>Dashboard</h2>
        <a href="adminLogout.php">Log Out</a>
    </div>

    <!-- Container -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="nav-link" href="user_details.php">User Details</a>
            <a class="nav-link" href="event_details.php">Event Details</a>
            <a class="nav-link" href="email_log.php">Email Logs</a>
            <a class="nav-link" href="sms_log.php">Sms Log</a>
            <a class="nav-link" href="sendEmail.php">Send Email</a>
            <a class="nav-link" href="sendSms.php">Send Sms</a>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="stat-grid">
                <div class="stat-box">
                    <h5>Total Registered Users</h5> <!-- count from user table -->
                    <p><?php echo $total_users; ?></p>
                </div>
                <div class="stat-box">
                    <h5>Total Events</h5> <!-- count from events table -->
                    <p><?php echo $total_events; ?></p>
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