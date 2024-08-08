<?php
session_start();
session_regenerate_id(true);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "Rahul@1234";
$dbname = "world";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Registration logic
if (isset($_POST['register'])) {
    $name = $_POST['fullName'];
    $username = $_POST['username'];
    $country_code = $_POST['country_code'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // Insert the new participant into the Participants table
    $sql = "INSERT INTO `tbl_user_basic`(`fullname`, `username`,`country_code`,`phone`, `email`,`address`, `password`) VALUES (?, ?, ?, ?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $username, $country_code, $phone, $email, $address, $password);

    if ($stmt->execute()) {

        $query = "SELECT * FROM tbl_user_basic WHERE email= ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        // Store user session data
        $_SESSION["name"] = $name;
        $_SESSION["userId"] = $data['ID'];
        $_SESSION["userName"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["country_code"] = $country_code;
        $_SESSION["phone"] = $phone;
        $_SESSION["address"] = $address;

        // Redirect to the index page
        header('Location: index.php');
        exit();
    } else {
        echo "<script>alert('Error inserting participant: " . $stmt->error . "')</script>";
        $stmt->close();
    }
}

// Login logic
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM tbl_user_basic WHERE email= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();


    if ($result->num_rows > 0) {
        if ($data['password'] == $password) {
            $_SESSION["userId"] = $data['ID'];
            $_SESSION["name"] = $data['fullname'];
            $_SESSION["userName"] = $data['username'];
            $_SESSION["email"] = $data['email'];
            $_SESSION["country_code"] = $$data['country_code'];
            $_SESSION["phone"] = $data['phone'];
            $_SESSION["address"] = $data['address'];
            header('Location: index.php');
        } else {
            echo "<script>alert('Wrong password')</script>";
            header('Location: index.php');
        }
    } else {
        echo "<script>alert('Wrong email/username')</script>";
        header('Location: index.php');
    }

    $stmt->close();
    $stmt2->close();
    if (isset($stmt3)) $stmt3->close();
}

// Close the database connection
mysqli_close($conn);
