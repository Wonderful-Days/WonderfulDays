<?php
session_start();
$servername = "97.74.93.233";
$username = "techindi_Develop";
$password = "A*-fcV6gaFW0";
$dbname = "techindi_Dev";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch current user details from the database using the email from the session
$sql = "SELECT events FROM register_form WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $desc = $conn->real_escape_string(trim($_POST["desc"]));

    // Update user details in the database
    $update_sql = "UPDATE register_form SET events = ? WHERE email = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ss", $desc, $_SESSION['email']);

    if ($update_stmt->execute()) {
        // Update the session with new data
        $_SESSION["desc"] = $desc;

        // Redirect back to the profile page after updating
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $update_stmt->close();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
 body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #bfe0f1;
  font-family: Arial, sans-serif;
 }
 .form-box {
  background-color: rgb(239, 237, 240);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
  max-width: 400px;
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
</style>
<body>
    <div class="form-box">
        <h2>Edit Profile</h2>
        <form action="editDetail.php" method="post">
            <input type="text" name="desc" class="input-field" value="<?php echo htmlspecialchars($user['events']); ?>" placeholder="Registered Events" required>
            <button type="submit" class="submit-button">Save Changes</button>
        </form>
    </div>
</body>
</html>
