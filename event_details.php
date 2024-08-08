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

// Set the number of records to display per page
$records_per_page = 10;

// Get the current page number from the query string, default is 1 if not set
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $records_per_page;

// Get the search query from the form, if it exists
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Get the total number of records
$total_records_query = "SELECT COUNT(*) AS total FROM tbl_events";
if ($search_query) {
    $total_records_query .= " WHERE mstevent_event_name LIKE '%$search_query%' OR title LIKE '%$search_query%' OR description LIKE '%$search_query%' OR speaker LIKE '%$search_query%' OR eventtype LIKE '%$search_query%'";
}
$total_records_result = mysqli_query($conn, $total_records_query);
$total_records = mysqli_fetch_assoc($total_records_result)['total'];

// Calculate total pages
$total_pages = ceil($total_records / $records_per_page);

// Modify the query to include LIMIT and OFFSET, and the search condition
$event_query = "SELECT * FROM tbl_events";
if ($search_query) {
    $event_query .= " WHERE mstevent_event_name LIKE '%$search_query%' OR title LIKE '%$search_query%' OR description LIKE '%$search_query%' OR speaker LIKE '%$search_query%' OR eventtype LIKE '%$search_query%'";
}
$event_query .= " LIMIT $records_per_page OFFSET $offset";
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

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            margin: 0 10px;
        }

        .pagination-btn:hover {
            background-color: #0056b3;
        }

        .page-info {
            font-size: 16px;
        }

        #createEventForm form {
            max-width: 600px;
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

    <h1>Events Details</h1>

    <!-- Search Form -->
    <form method="GET" action="" style="text-align: center; margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Search events" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Search</button>
    </form>

    <div class="main1">
        <a href="create_events.php" class="btn1">Create Event</a>
    </div>
    <div class="main">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Master Event ID</th>
                    <th>Event Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Speaker</th>
                    <th>Link</th>
                    <th>Date</th>
                    <th>Capacity</th>
                    <th>Event Type</th>
                    <th>Updated On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($event_row = mysqli_fetch_assoc($event_result)) { ?>
                    <tr>
                        <td data-label='ID'><?php echo $event_row['ID']; ?></td>
                        <td data-label='Master Event ID'><?php echo $event_row['mst_event_ID']; ?></td>
                        <td data-label='Event Name'><?php echo $event_row['mstevent_event_name']; ?></td>
                        <td data-label='Title'><?php echo $event_row['title']; ?></td>
                        <td data-label='Description'><?php echo $event_row['description']; ?></td>
                        <td data-label='Speaker'><?php echo $event_row['speaker']; ?></td>
                        <td data-label='Link'><?php echo $event_row['onlinelink']; ?></td>
                        <td data-label='Date'><?php echo $event_row['dateofevent']; ?></td>
                        <td data-label='Capacity'><?php echo $event_row['capacity']; ?></td>
                        <td data-label='Event Type'><?php echo $event_row['eventtype']; ?></td>
                        <td data-label='Updated On'><?php echo $event_row['updatedon']; ?></td>
                        <td data-label='Actions'>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $event_row['ID']; ?>">
                                <button type="submit" name="delete_event">Delete</button>
                            </form>
                            <button>
                                <a href="edit_event.php?id=<?php echo $event_row['ID']; ?>">Update</a>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <?php if ($current_page > 1) : ?>
            <a href="?page=<?php echo $current_page - 1; ?>&search=<?php echo $search_query; ?>" class="pagination-btn prev">Previous</a>
        <?php endif; ?>

        <span class="page-info">Page <?php echo $current_page; ?> of <?php echo $total_pages; ?></span>

        <?php if ($current_page < $total_pages) : ?>
            <a href="?page=<?php echo $current_page + 1; ?>&search=<?php echo $search_query; ?>" class="pagination-btn next">Next</a>
        <?php endif; ?>
    </div>

</body>

</html>