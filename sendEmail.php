<?php
session_start();
if (!isset($_SESSION["admin"])) {
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "Rahul@1234";
$dbname = "world";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_events_master";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$events = array();
while ($event_row = $result->fetch_assoc()) {
    $events[] = $event_row;
}

if (isset($_POST['send_email'])) {
    $event_id = filter_input(INPUT_POST, 'event_id', FILTER_SANITIZE_NUMBER_INT);
    $sender_email = filter_input(INPUT_POST, 'sender_email', FILTER_SANITIZE_EMAIL);
    $mail_body = htmlspecialchars($_POST['mail_body'], ENT_QUOTES, 'UTF-8');

    if (filter_var($sender_email, FILTER_VALIDATE_EMAIL)) {
        // Fetch the users who have registered for the selected event
        $sql = "SELECT ub.email 
                FROM tbl_user_event ue
                JOIN tbl_user_basic ub ON ue.user_basic_ID = ub.ID
                WHERE ue.events_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Send emails to all users
        $emails_sent = 0;
        while ($row = $result->fetch_assoc()) {
            $to = $row['email'];
            $subject = "Event Notification";

            // Use the PHP mail function to send the email
            if (mail($to, $subject, $mail_body, "From:" . $sender_email)) {
                $emails_sent++;
            } else {
                echo "Failed to send email to " . $to . "<br>";
            }
        }

        echo "$emails_sent email(s) sent successfully!";
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
            <label for="event_id">Select Event:</label>
            <select name="event_id" id="event_id" required>
                <option value="">Select Event</option>
                <?php

                foreach ($events as $event) {
                    echo "<option value='" . $event['ID'] . "'>" . $event['event_name'] . "</option>";
                }
                ?>
            </select>

            <label for="sender_email">Sender Email:</label>
            <input type="email" name="sender_email" id="sender_email" value="<?php echo $_SESSION["admin_email"] ?>" required>

            <label for="mail_body">Mail Body:</label>
            <textarea name="mail_body" id="mail_body" rows="6" required></textarea>

            <button type="submit" name="send_email" class="send-btn">Send</button>
        </form>

    </div>
</body>

</html>