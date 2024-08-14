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

$fullname = $username = $email = $country_code = $phone = $address = "";
$update = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $update = true;
    $result = mysqli_query($conn, "SELECT * FROM tbl_user_basic WHERE ID=$id");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $fullname = $row['fullname'];
        $username = $row['username'];
        $email = $row['email'];
        $country_code = $row['country_code'];
        $phone = $row['phone'];
        $address = $row['address'];
    }
}

// Handle Create/Update User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_user'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country_code = $_POST['country_code'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($id) {
        $query = "UPDATE tbl_user_basic SET fullname='$fullname', username='$username', email='$email', country_code='$country_code', phone='$phone', address='$address' WHERE ID='$id'";
    } else {
        $query = "INSERT INTO tbl_user_basic (fullname, username, email, country_code, phone, address) VALUES ('$fullname', '$username', '$email', '$country_code', '$phone', '$address')";
    }
    mysqli_query($conn, $query);
    header("Location: user_details.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $update ? 'Update User' : 'Create User'; ?></title>
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

        .navbar img {
            height: 50px;
        }

        .admin-btn {
            background-color: #555;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .admin-btn:hover {
            background-color: #777;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        form {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
            border-radius: 25px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 5px #1c7430;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        button[type="submit"]:hover {
            background-color: #218838;
            box-shadow: 0 5px #1c7430, 0 10px #1c7430;
            transform: translateY(-2px);
        }

        button[type="submit"]:active {
            background-color: #218838;
            box-shadow: 0 2px #1c7430;
            transform: translateY(2px);
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <img src="../images/logo.png" alt="Logo">
        <button class="admin-btn">Admin Page</button>
    </div>

    <h1><?php echo $update ? 'Update User' : 'Create User'; ?></h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" value="<?php echo $fullname; ?>" required>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $username; ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>
        <label for="country_code">Country Code:</label>
        <input type="text" name="country_code" value="<?php echo $country_code; ?>" required>
        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" required>
        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $address; ?>" required>
        <button type="submit" name="save_user"><?php echo $update ? 'Update User' : 'Create User'; ?></button>
    </form>
</body>

</html>