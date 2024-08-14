<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "Rahul@1234";
$dbname = "world";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION["name"])) {
  header("Location: register.php"); // Redirect to login if the user is not logged in
  exit();
}

$user_id = $_SESSION["userId"]; // Assuming you store user ID in the session

// Query to fetch registered events by joining tbl_user_event and tbl_events
$registered_events_query = "
    SELECT e.title, e.dateofevent 
    FROM tbl_user_event ue 
    JOIN tbl_events e ON ue.events_ID = e.ID 
    WHERE ue.user_basic_ID = ?
";
$stmt_registered = $conn->prepare($registered_events_query);

if (!$stmt_registered) {
  die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

$stmt_registered->bind_param("i", $user_id);
$stmt_registered->execute();
$registered_events_result = $stmt_registered->get_result();

if ($registered_events_result === false) {
  die("Execute failed: (" . $stmt_registered->errno . ") " . $stmt_registered->error);
}

// Query to fetch upcoming events
$upcoming_events_query = "
    SELECT title, dateofevent 
    FROM tbl_events 
    WHERE ID IN (SELECT events_ID FROM tbl_user_event WHERE user_basic_ID = ?) AND dateofevent >= CURDATE()
";
$stmt_upcoming = $conn->prepare($upcoming_events_query);

if (!$stmt_upcoming) {
  die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

$stmt_upcoming->bind_param("i", $user_id);
$stmt_upcoming->execute();
$upcoming_events_result = $stmt_upcoming->get_result();

if ($upcoming_events_result === false) {
  die("Execute failed: (" . $stmt_upcoming->errno . ") " . $stmt_upcoming->error);
}

// Query to fetch missed events
$missed_events_query = "
    SELECT title 
    FROM tbl_events 
    WHERE ID IN (SELECT events_ID FROM tbl_user_event WHERE user_basic_ID = ?) AND dateofevent < CURDATE()
";
$stmt_missed = $conn->prepare($missed_events_query);

if (!$stmt_missed) {
  die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

$stmt_missed->bind_param("i", $user_id);
$stmt_missed->execute();
$missed_events_result = $stmt_missed->get_result();

if ($missed_events_result === false) {
  die("Execute failed: (" . $stmt_missed->errno . ") " . $stmt_missed->error);
}

// Close the statements after execution
$stmt_registered->close();
$stmt_upcoming->close();
$stmt_missed->close();

$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <!-- MDB UI Kit -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet">
  <title>Wonderful Days</title>
</head>

<body>
  <!-- HEADER SECTION -->
  <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="index.php"><img height="50px" src="images/logo.png" class="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <!-- Your Events After Login Page -->
          <li class="nav-item">
            <a class="nav-link" style="color: black" role="button" href="upcomingevents.php">
              <img src="images/how_it_works_logo.png" width="24" height="24" class="bi d-flex-row mx-auto mb-1"> Your
              Events
            </a>
          </li>
          <!-- Profile and Logout Links -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" style="color:black">
              <img src="images/profile.1024x1024.png" width="24" height="24" class="bi d-flex-row mx-auto mb-1"> Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profile.php">View Profile</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </section>

  <!-- Main Content -->
  <div style="background-image: url('images/registereventsbackground.jpg'); background-size: cover; background-position: center; position: relative; height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <h1 style="color: white; font-size: 3em; margin-bottom: 20px; text-align: center;">Your Event Journey</h1>
    <div style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; width: 80%; max-width: 800px; display: flex; flex-direction: column; gap: 20px;">

      <!-- Registered Events Section -->
      <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <h2>Registered Events</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px">
          <thead>
            <tr>
              <th>Event Name</th>
              <th>Event Date</th>
            </tr>
          </thead>
          <tbody>
            <!-- PHP code to loop through and display registered events -->
            <?php
            while ($row = $registered_events_result->fetch_assoc()) {
              echo '<tr>
                                <td>' . htmlspecialchars($row["title"]) . '</td>
                                <td>' . htmlspecialchars($row["dateofevent"]) . '</td>
                            </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Upcoming Events Section -->
      <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <h2>Upcoming Events</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px">
          <thead>
            <tr>
              <th>Event Name</th>
              <th>Event Date</th>
            </tr>
          </thead>
          <tbody>
            <!-- PHP code to loop through and display upcoming events -->
            <?php
            while ($row = $upcoming_events_result->fetch_assoc()) {
              echo '<tr>
                                <td>' . htmlspecialchars($row["title"]) . '</td>
                                <td>' . htmlspecialchars($row["dateofevent"]) . '</td>
                            </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Missed Events Section -->
      <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <h2>Missed Events</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px">
          <thead>
            <tr>
              <th>Event Name</th>
            </tr>
          </thead>
          <tbody>
            <!-- PHP code to loop through and display missed events -->
            <?php
            while ($row = $missed_events_result->fetch_assoc()) {
              echo '<tr>
                                <td>' . htmlspecialchars($row["title"]) . '</td>
                            </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>