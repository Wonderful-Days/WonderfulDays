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

// Handle Create User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_user'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country_code = $_POST['country_code'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = "INSERT INTO tbl_user_basic (fullname, username, email, country_code, phone, address,password) VALUES ('$fullname', '$username', '$email', '$country_code', '$phone', '$address','$password')";
    mysqli_query($conn, $query);
}

// Handle Delete User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_user'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM tbl_user_basic WHERE ID='$id'";
    mysqli_query($conn, $query);
}

// Retrieve user details with their events concatenated
$user_query = "
    SELECT 
        u.ID, u.fullname, u.username, u.email, u.country_code, u.phone, u.address, 
        ud.college_id, ud.company_name, ud.designation,
        GROUP_CONCAT(e.title SEPARATOR ', ') AS events_registered
    FROM tbl_user_basic u
    LEFT JOIN tbl_user_detail ud ON u.ID = ud.user_basic_id
    LEFT JOIN tbl_user_event ue ON u.ID = ue.user_basic_id
    LEFT JOIN tbl_events e ON ue.events_ID = e.ID
    GROUP BY u.ID
";
$user_result = mysqli_query($conn, $user_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Details</title>
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
            margin: 5%;
            margin-top: 2%;
            background-color: rgba(128, 128, 128, 0.385);
            width: 80%;
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

        #createUserForm form {
            margin-top: 20px;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        #createUserForm label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        #createUserForm input,
        #createUserForm textarea,
        #createUserForm select,
        #createUserForm button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #createUserForm button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        #createUserForm button:hover {
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
    <!-- Create User Form -->
    <div id="createUserForm">
        <form method="POST" action="">
            <h2>Create User</h2>
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" required>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="country_code">Country Code:</label>
            <select name="country_code" required>
                <option value="1">+1 (USA)</option>
                <option value="44">+44 (UK)</option>
                <option value="91">+91 (India)</option>
                <option value="61">+61 (Australia)</option>
                <option value="49">+49 (Germany)</option>
                <option value="33">+33 (France)</option>
                <option value="39">+39 (Italy)</option>
                <option value="55">+55 (Brazil)</option>
                <option value="81">+81 (Japan)</option>
                <option value="86">+86 (China)</option>
                <option value="27">+27 (South Africa)</option>
                <option value="82">+82 (South Korea)</option>
                <option value="34">+34 (Spain)</option>
                <option value="90">+90 (Turkey)</option>
                <option value="62">+62 (Indonesia)</option>
                <option value="971">+971 (United Arab Emirates)</option>
                <option value="66">+66 (Thailand)</option>
                <option value="92">+92 (Pakistan)</option>
                <option value="48">+48 (Poland)</option>
                <option value="98">+98 (Iran)</option>
                <!-- Add more country codes as needed -->
            </select>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" required>
            <label for="address">Address:</label>
            <input type="text" name="address" required>
            <button type="submit" name="create_user">Create User</button>
        </form>
    </div>
</body>

</html>