<?php
session_start();
if (!isset($_SESSION["admin"])) {
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar .logo {
            height: 50px;
        }

        .navbar .admin-btn {
            background-color: #fff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .navbar .admin-btn:hover {
            background-color: #777;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="email"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="email"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .send-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            align-self: center;
        }

        .send-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="../images/logo.png" alt="Logo" class="logo">
        <button class="admin-btn"><a href="admin.php">Admin Page</a></button>
    </div>

    <div class="container">
        <h1>Send Mail</h1>
        <form method="POST" action="">
            <label for="sender_email">Sender Email:</label>
            <input type="email" name="sender_email" id="sender_email" required>

            <label for="receiver_email">Receiver Email:</label>
            <input type="email" name="receiver_email" id="receiver_email" required>

            <label for="mail_body">Mail Body:</label>
            <textarea name="mail_body" id="mail_body" rows="6" required></textarea>

            <button type="submit" class="send-btn">Send</button>
        </form>
    </div>
</body>

</html>