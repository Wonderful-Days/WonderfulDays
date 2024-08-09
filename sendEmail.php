<?php
session_start();
if (!isset($_SESSION["admin"])) {
    exit;
}

$servername = "localhost";
$username = "root";
$password = "Rahul@1234";
$dbname = "world";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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

// Retrieve email logs with search and pagination
$sql = "SELECT * FROM tbl_email_log 
        WHERE recipient_email LIKE '%$search%' 
        OR mail_subject LIKE '%$search%' 
        OR sender_email LIKE '%$search%' 
        LIMIT $start, $limit";
$result = $conn->query($sql);

// Count total records for pagination
$count_sql = "SELECT COUNT(*) AS total 
              FROM tbl_email_log 
              WHERE recipient_email LIKE '%$search%' 
              OR mail_subject LIKE '%$search%' 
              OR sender_email LIKE '%$search%'";
$count_result = $conn->query($count_sql);
$total_records = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_records / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Logs</title>
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
            background-color: #d3d1ec;
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
            max-width: 1200px;
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
        .actions{
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
        .searchbtn{
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


    </style>
</head>

<body>
    <div class="navbar">
        <img src="./images/logo.png" alt="Logo" class="logo">
        <a href="admin.php" class="admin-btn">Admin Page</a>
    </div>

    <div class="container">
        <h1>Email Logs</h1>
        <form method="GET" action="" class="searchbtn">
            <input type="text" name="search" placeholder="Search by email, subject, or sender" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="create-btn">Search</button>
        </form>
        <table class="email-logs-table">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>User Basic ID</th>
                    <th>Recipient Email</th>
                    <th>Mail Subject</th>
                    <th>Mail Body</th>
                    <th>Sent Status</th>
                    <th>Sent Datetime</th>
                    <th>Sender Email</th>
                    <th>Error Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['events_ID']}</td>
                                <td>{$row['user_basic_ID']}</td>
                                <td>{$row['recipient_email']}</td>
                                <td>{$row['mail_subject']}</td>
                                <td>{$row['mail_body']}</td>
                                <td>{$row['sent_status']}</td>
                                <td>{$row['sent_datetime']}</td>
                                <td>{$row['sender_email']}</td>
                                <td>{$row['error_message']}</td>
                                <td class='actions'>
                                    <button class='edit-btn'>Edit</button>
                                    <button class='delete-btn'>Delete</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <a href="?search=<?php echo urlencode($search); ?>&page=<?php echo $i; ?>" class="page-btn <?php echo ($page == $i) ? 'active' : ''; ?>"><?php echo $i; ?></a>
            <?php } ?>
        </div>
    </div>
</body>

</html>

<?php
$conn->close();
?>
