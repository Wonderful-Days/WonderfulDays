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
    $country_code = $_POST['country_code'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = "INSERT INTO tbl_user_basic (fullname, username, email, country_code, phone, address) VALUES ('$fullname', '$username', '$email', '$country_code', '$phone', '$address')";
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

        /* .btn3 {
            position: relative;
            background-color: transparent;
            border: 1px solid black;
            font-size: 18px;
            text-transform: bold;
            transition: color 400ms;
            margin-left: 20%;
            background-color: rgba(82, 78, 78, 0.686);
            width: 50px;
            text-align: center;
            padding: 0 12px 0;
            border-radius: 25px;
            color: white;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #0f0f0f;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        @media screen and (max-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tr {
                margin-bottom: 15px;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                text-align: left;
            }
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

    <h1>User Details</h1>
    <div class="main1">
        <button onclick="document.getElementById('createUserForm').style.display='block'" class="btn1">Create User</button>
    </div>
    <div class="main">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Country Code</th>
                    <th>Phone Number</th>
                    <th>Events Registered</th>
                    <th>College ID</th>
                    <th>Company Name</th>
                    <th>Designation</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user_row = mysqli_fetch_assoc($user_result)) { ?>
                    <tr>
                        <td data-label='Name'><?php echo $user_row['fullname']; ?></td>
                        <td data-label='Username'><?php echo $user_row['username']; ?></td>
                        <td data-label='Email'><?php echo $user_row['email']; ?></td>
                        <td data-label='Country Code'><?php echo $user_row['country_code']; ?></td>
                        <td data-label='Phone Number'><?php echo $user_row['phone']; ?></td>
                        <td data-label='Events Registered'><?php echo $user_row['events_registered']; ?></td>
                        <td data-label='College ID'><?php echo $user_row['college_id']; ?></td>
                        <td data-label='Company Name'><?php echo $user_row['company_name']; ?></td>
                        <td data-label='Designation'><?php echo $user_row['designation']; ?></td>
                        <td data-label='Address'><?php echo $user_row['address']; ?></td>
                        <td data-label='Actions'>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $user_row['ID']; ?>">
                                <button type="submit" name="delete_user">Delete</button>
                            </form>
                            <a href="edit_user.php?id=<?php echo $user_row['ID']; ?>">update</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Create User Form -->
    <div id="createUserForm" style="display:none;">
        <form method="POST" action="">
            <h2>Create User</h2>
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" required>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="country_code">Country Code:</label>
            <input type="text" name="country_code" required>
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" required>
            <label for="address">Address:</label>
            <input type="text" name="address" required>
            <button type="submit" name="create_user">Create User</button>
        </form>
    </div>
</body>

</html>