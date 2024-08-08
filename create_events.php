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

// Handle Delete Event
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_event'])) {
    $id = $_POST['id'];

    $delete_query = "DELETE FROM tbl_events WHERE ID='$id'";
    mysqli_query($conn, $delete_query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$event_query = "SELECT * FROM tbl_events";
$event_result = mysqli_query($conn, $event_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Events Details</title>
    <style>
        .navbar {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }

        .navbar .logo {
            margin-right: 96%;
            display: flex;
            align-items: center;
            margin-left: 2%;
        }

        .navbar .logo img {
            margin-left: 60px;
            height: 50px;
        }

        .btnone {
            position: absolute;
            right: 20px;
            /* Adjust the value as needed / / Center vertically if needed */
            transform: translateY(-50%);
            /* Center vertically if top is 50% */
        }

        .btn0 {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .vbutton:hover {
            background-color: darkblue;
        }




        a {
            text-decoration: none;
        }

        .btntwo {
            position: relative;
            background-color: transparent;
            border: 1px solid black;
            font-size: 16px;
            width: 80px;
            text-transform: bold;
            transition: color 400ms;
            margin-left: 10%;
            color: black;
            width: 50px;
            text-align: center;
            padding: 0 12px 0;
            border-radius: 25px;
        }

        .main {
            margin-top: 2%;
            background-color: white;
            width: 100%;
            padding: 12px;
            border-radius: 25px;
            position: relative;
            overflow: hidden;
        }

        .main1 {
            margin: 2%;
            padding: 2px;
            border-radius: 25px;
        }

        .btn1 {
            background-color: blue;
            position: relative;
            margin-left: 15%;
            text-align: center;
            padding: 0 12px 0;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn1:hover {
            background-color: darkblue;
        }


        /* .btn1 {
            position: relative;
            background-color: transparent;
            border: 1px solid black;
            font-size: 18px;
            text-transform: bold;
            transition: color 400ms;
            margin-left: 15%;
            background-color: aqua;
            color: black;
            width: 50px;
            text-align: center;
            padding: 0 12px 0;
            border-radius: 25px;
        } */

        .btn2 {
            background-color: blue;
            position: relative;
            margin-left: 15%;
            text-align: center;
            padding: 0 12px 0;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn2:hover {
            background-color: darkblue;
        }


        .btn3 {
            background-color: blue;
            position: relative;
            margin-left: 15%;
            text-align: center;
            padding: 0 12px 0;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn3:hover {
            background-color: darkblue;
        }



        #createEventForm form {
            padding-top: 20px;
            max-width: 600px;
            margin-top: 20px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        #createEventForm label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        #createEventForm input,
        #createEventForm textarea,
        #createEventForm button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #createEventForm button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        #createEventForm button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo"></a>
            <div class="btnone">
                <a href="admin.php" class="btn0">Admin page</a>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <!-- Create Event Form -->
    <div id="createEventForm">

        <form method="POST" action="edit_event.php">
            <h2>Create Event
            </h2>
            <input type="hidden" name="create_event" value="1">
            <label for="mst_event_ID">Master Event ID:</label>
            <input type="number" name="mst_event_ID" id="mst_event_ID" required><br>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea><br>
            <label for="speaker">Speaker:</label>
            <input type="text" name="speaker" id="speaker" required><br>
            <label for="onlinelink">Link:</label>
            <input type="text" name="onlinelink" id="onlinelink" required><br>
            <label for="dateofevent">Date:</label>
            <input type="datetime-local" name="dateofevent" id="dateofevent" required><br>
            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" id="capacity" required><br>
            <label for="eventtype">Event Type:</label>
            <input type="text" name="eventtype" id="eventtype" required><br>
            <button type="submit">Create Event</button>
        </form>
    </div>
</body>

</html>