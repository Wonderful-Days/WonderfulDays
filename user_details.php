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

// Search functionality
$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

// Pagination settings
$limit = 10; // Number of entries per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Retrieve user details with their events concatenated and applying search
$user_query = "
    SELECT 
        u.ID, u.fullname, u.username, u.email, u.country_code, u.phone, u.address, u.state, u.country, u.zipcode, 
        ud.college_id, ud.company_name, ud.designation,
        GROUP_CONCAT(e.title SEPARATOR ', ') AS events_registered
    FROM tbl_user_basic u
    LEFT JOIN tbl_user_detail ud ON u.ID = ud.user_basic_id
    LEFT JOIN tbl_user_event ue ON u.ID = ue.user_basic_id
    LEFT JOIN tbl_events e ON ue.events_ID = e.ID
    WHERE u.fullname LIKE '%$search%' OR u.username LIKE '%$search%' OR u.email LIKE '%$search%'
    GROUP BY u.ID
    LIMIT $start, $limit
";
$user_result = mysqli_query($conn, $user_query);

// Count total records for pagination
$count_query = "
    SELECT COUNT(*) AS total 
    FROM tbl_user_basic u
    WHERE u.fullname LIKE '%$search%' OR u.username LIKE '%$search%' OR u.email LIKE '%$search%'
";
$count_result = mysqli_query($conn, $count_query);
$total_records = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_records / $limit);
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
            margin-top: 2%;
            background-color: white;
            padding: 12px;
            border-radius: 25px;
            position: relative;
            overflow: hidden;
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


        .main1 {
            display: flex;
            align-items: center;
            gap: 20px;
            /* Space between "Create User" button, search box, and search button */
            padding: 10px;
            border-radius: 25px;
        }

        input[name="search"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 250px;
            /* Adjust the width as needed */
        }


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

        #createUserForm form {
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

        .pagination {
            text-align: center;
            margin: 20px 0;
        }

        .pagination a {
            color: blue;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: blue;
            color: white;
            border: 1px solid blue;
        }

        .user-action-section {
            padding: 20px;
            background-color: #f8f9fa;
            /* Light background color for the section */
            border-radius: 10px;
            margin: 20px 0;
            /* Space above and below the section */
            text-align: center;
        }

        .user-action-container {
            display: flex;
            align-items: center;
            gap: 20px;
            /* Space between "Create User" button, search box, and search button */
            text-align: center;
        }

        input[name="search"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 250px;
            /* Adjust the width as needed */
        }

        .search-form {
            display: flex;
            padding-left: 20%;
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

    <section class="user-action-section">
        <div class="user-action-container">
            <a href="create_user.php" class="btn2">Create User</a>
            <form method="GET" action="" class="search-form">
                <input type="text" name="search" placeholder="Search by name, username, or email" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="btn1">Search</button>
            </form>
        </div>
    </section>



    <div class="main">
        <table>
            <thead>
                <tr>
                    <th>Sr No.</th>
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
                    <th>State</th>
                    <th>Country</th>
                    <th>Zipcode</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 + $start;
                while ($user_row = mysqli_fetch_assoc($user_result)) { ?>
                    <tr>
                        <td data-label='Sr no.'><?php echo $i;
                                                $i++; ?></td>
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
                        <td data-label='State'><?php echo $user_row['state']; ?></td>
                        <td data-label='Country'><?php echo $user_row['country']; ?></td>
                        <td data-label='Zipcode'><?php echo $user_row['zipcode']; ?></td>
                        <td data-label='Actions'>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $user_row['ID']; ?>">
                                <button type="submit" name="delete_user">Delete</button>
                            </form>
                            <button><a href="edit_user.php?id=<?php echo $user_row['ID']; ?>">Update</a></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="?search=<?php echo urlencode($search); ?>&page=<?php echo $i; ?>" class="<?php echo ($page == $i) ? 'active' : ''; ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>
</body>

</html>