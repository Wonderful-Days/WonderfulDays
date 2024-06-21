<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Retrieve form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Connect to database
  $servername = "localhost";
  $username = "root";
  $password_db = "";
  $dbname = "register";
  $conn = new mysqli($servername, $username, $password_db, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Update password
  $sql = "UPDATE `users` SET `password`='" . $password . "' WHERE `email`='" . $email . "'";
  if ($conn->query($sql) === TRUE) {
    // Password updated successfully, redirect to login page
    echo "<script>alert('Password updated successfully..!')</script>";
    header("Location: register.html");
    exit();
  } else {
    echo "Error updating password: " . $conn->error;
  }

  // Close database connection
  $conn->close();

}

?>
