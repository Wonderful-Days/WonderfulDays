<?php
// Get form data
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];

// Connect to database
$conn = mysqli_connect('localhost', 'root', '', 'register');

// Check if email already exists in database
$emailQuery = "SELECT * FROM `users` WHERE email='$email'";
$emailResult = mysqli_query($conn, $emailQuery);
if (mysqli_num_rows($emailResult) > 0) {
  // Display error message and stop execution
  echo ('Email already exists!');
  exit();
}

// Insert new user data into database
$insertQuery = "INSERT INTO users (`Name`, `Username`, `Email`, `Password`, `Repeat password`) VALUES ('$name', '$username', '$email', '$password', '$repeatPassword')";
$insertResult = mysqli_query($conn, $insertQuery);

// Check if insertion was successful
if ($insertResult) {
  // Send success response to client
  echo "success";
} else {
  // Send error response to client
  echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
