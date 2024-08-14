<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
if (!isset($_SESSION["admin"])) {
    exit;
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "Rahul@1234";
$dbname = "world";

// Include PHPMailer files
require 'C:/Users/Rahul/OneDrive/Desktop/WonderfulDays/vendor/phpmailer/phpmailer/src/Exception.php';
require 'C:/Users/Rahul/OneDrive/Desktop/WonderfulDays/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'C:/Users/Rahul/OneDrive/Desktop/WonderfulDays/vendor/phpmailer/phpmailer/src/SMTP.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events from the database
$sql = "SELECT * FROM tbl_events_master";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$events = array();
if ($result->num_rows > 0) {
    while ($event_row = $result->fetch_assoc()) {
        $events[] = $event_row;
    }
} else {
    echo "No events found.<br>"; // Debug message
}

$successMessage = "";
$errorMessage = "";
$emailsSentList = array(); // Array to store successfully sent emails

if (isset($_POST['send_email'])) {
    $event_id = filter_input(INPUT_POST, 'event_id', FILTER_SANITIZE_NUMBER_INT);
    $sender_email = filter_input(INPUT_POST, 'sender_email', FILTER_SANITIZE_EMAIL);
    $mail_body = htmlspecialchars($_POST['mail_body'], ENT_QUOTES, 'UTF-8');

    if (filter_var($sender_email, FILTER_VALIDATE_EMAIL)) {
        // Fetch the users who have registered for the selected event
        $sql = "SELECT ue.user_basic_ID, ub.email, ub.username 
                FROM tbl_user_event ue
                JOIN tbl_user_basic ub ON ue.user_basic_ID = ub.ID
                WHERE ue.events_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $users = $result->fetch_all(MYSQLI_ASSOC); // Fetch all users into an array

        if (count($users) > 0) {

            // Initialize PHPMailer
            $mail = new PHPMailer(true);

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'mail id';  // SMTP username
            $mail->Password = 'app password';    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;

            // Set sender details
            $mail->setFrom($sender_email, 'Event Organizer');

            // Send emails to all users
            $emails_sent = 0;
            foreach ($users as $row) {
                try {
                    $mail->addAddress($row['email'], $row['username']); // Add a recipient
                    $mail->isHTML(true);  // Set email format to HTML
                    $mail->Subject = 'Event Notification';
                    $mail->Body = $mail_body;

                    $mail->send();
                    $emailsSentList[] = $row['email']; // Store the successfully sent email
                    $emails_sent++;
                } catch (Exception $e) {
                    echo "Failed to send email to " . $row['email'] . " Error: " . $mail->ErrorInfo . "<br>";
                }

                // Clear all recipients for the next iteration
                $mail->clearAddresses();
            }
            if ($emails_sent > 0) {
                $successMessage = "$emails_sent email(s) sent successfully!";
            } else {
                $errorMessage = "No emails were sent.";
            }
        } else {
            $errorMessage = "No users found for the selected event.";
        }
        $stmt->close();
    } else {
        echo "Invalid sender email address!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
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
            background-color: #4A90E2;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar .logo {
            height: 50px;
        }

        .navbar .admin-btn {
            background-color: #555;
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
            max-width: 800px;
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

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="email"]:focus,
        select:focus,
        textarea:focus {
            border-color: #4A90E2;
            outline: none;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .send-btn {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .send-btn:hover {
            background-color: #218838;
        }

        .create-btn {
            display: block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }

        .create-btn:hover {
            background-color: #218838;
        }

        .email-logs-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .email-logs-table th,
        .email-logs-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .email-logs-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .email-logs-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .email-logs-table tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            display: flex;
        }

        .actions .edit-btn,
        .actions .delete-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 5px;
        }

        .actions .delete-btn {
            background-color: #dc3545;
        }

        .actions .edit-btn:hover {
            background-color: #0056b3;
        }

        .actions .delete-btn:hover {
            background-color: #c82333;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page-btn {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            margin: 0 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .page-btn:hover {
            background-color: #555;
        }

        .searchbtn {
            display: flex;
            justify-content: center;
            text-align: center;
            gap: 20px;
        }

        .searchbtn input[name="search"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 250px;
        }

        .searchbtn input[name="search"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .message-container {
            display: none;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #28a745;
            /* Green background for success */
            color: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .message-container.error {
            background-color: #dc3545;
            /* Red background for error */
        }

        .close-btn {
            background-color: transparent;
            color: #fff;
            border: none;
            font-size: 20px;
            line-height: 1;
            cursor: pointer;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="./images/logo.png" alt="Logo" class="logo">
        <a href="admin.php" class="admin-btn">Admin Page</a>
    </div>

    <div class="container">
        <h1>Send Mail</h1>
        <form method="POST" action="">
            <label for="event_id">Select Event:</label>
            <select name="event_id" id="event_id" required>
                <option value="">Select Event</option>
                <?php foreach ($events as $event) : ?>
                    <option value="<?php echo $event['ID']; ?>"><?php echo $event['event_name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="sender_email">Sender Email:</label>
            <input type="email" name="sender_email" id="sender_email" value="<?php echo isset($_SESSION["admin_email"]) ? $_SESSION["admin_email"] : ''; ?>" required>

            <label for="mail_body">Mail Body:</label>
            <textarea name="mail_body" id="mail_body" rows="6" required></textarea>

            <button type="submit" name="send_email" class="send-btn">Send</button>
        </form>

        <!-- Display the success/error message -->
        <div id="messageContainer" class="message-container <?php echo !empty($errorMessage) ? 'error' : ''; ?>">
            <?php
            if (!empty($successMessage)) {
                echo $successMessage;
            } elseif (!empty($errorMessage)) {
                echo $errorMessage;
            }
            ?>
            <button class="close-btn" onclick="closeMessage()">×</button>
        </div>

        <!-- Display the list of successfully sent emails -->
        <?php if (!empty($emailsSentList)) : ?>
            <h2>Emails Sent to the Following Users:</h2>
            <ul>
                <?php foreach ($emailsSentList as $email) : ?>
                    <li><?php echo $email; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </div>

    <script>
        // Show the message container if there's a message
        document.addEventListener('DOMContentLoaded', function() {
            const messageContainer = document.getElementById('messageContainer');
            if (messageContainer.innerHTML.trim() !== '') {
                messageContainer.style.display = 'block';
            }
        });

        // Function to close the message container
        function closeMessage() {
            const messageContainer = document.getElementById('messageContainer');
            messageContainer.style.display = 'none';
        }
    </script>
</body>

</html>