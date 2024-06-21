<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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

 .profile-box {
  background-color: rgb(239, 237, 240);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
  max-width: 300px;
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
</style>

<body>
    <div class="profile-box">
        <img src="images/profile.1024x1024.png" alt="Profile Photo" class="profile-photo">
        <?php
        echo '<h2 class="name">'.$_SESSION["uname"].'</h2>
        <div class="details">
            <p><strong>Registred Events: </strong>'.$_SESSION["desc"].'</p>
            <p><strong>Email:</strong> '.$_SESSION["email"].'</p>
        </div>
        <form action="editDetail.php" method="get">
            <button class="edit-button" role="button" name="edit" value="edit">Edit Profile</button>
        </form>
        <form action="logout.php" method="post">
            <button class="edit-button" role="button" name="logout" value="logout">Logout</button>
        </form>'
        ?>
    </div>
</body>
</html>