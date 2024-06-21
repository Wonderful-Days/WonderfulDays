<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "register");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get the user's email and password from the form
  $email = $_POST["loginName"];
  $password = $_POST["loginPassword"];

  // Query the database for a row with the given email and password
  $sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  // If a row is found, the login is successful
  if (mysqli_num_rows($result) == 1) {
    // Start session and redirect to dashboard
    session_start();
    $_SESSION["email"] = $email;
    header("Location: monday.html");
    exit();
  } else {
    // Display an error message if the email and password don't match
    echo "<script>alert('Invalid email or password')</script>";
  }
}
?>
