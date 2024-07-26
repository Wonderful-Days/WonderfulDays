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

$mst_event_ID = $title = $description = $speaker = $onlinelink = $dateofevent = $capacity = $eventtype = "";
$update = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $update = true;
    $result = mysqli_query($conn, "SELECT * FROM tbl_events WHERE ID=$id");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $mst_event_ID = $row['mst_event_ID'];
        $title = $row['title'];
        $description = $row['description'];
        $speaker = $row['speaker'];
        $onlinelink = $row['onlinelink'];
        $dateofevent = $row['dateofevent'];
        $capacity = $row['capacity'];
        $eventtype = $row['eventtype'];
    }
}

// Handle Create/Update Event
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_event'])) {
    $id = $_POST['id'];
    $mst_event_ID = $_POST['mst_event_ID'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $speaker = $_POST['speaker'];
    $onlinelink = $_POST['onlinelink'];
    $dateofevent = $_POST['dateofevent'];
    $capacity = $_POST['capacity'];
    $eventtype = $_POST['eventtype'];
    $updatedon = date('Y-m-d H:i:s');

    // Get event name from master table
    $master_event_query = "SELECT event_name FROM tbl_events_master WHERE ID = $mst_event_ID";
    $master_event_result = mysqli_query($conn, $master_event_query);
    $master_event_row = mysqli_fetch_assoc($master_event_result);
    $mstevent_event_name = $master_event_row['event_name'];

    if ($id) {
        $query = "UPDATE tbl_events SET mst_event_ID='$mst_event_ID', mstevent_event_name='$mstevent_event_name', title='$title', description='$description', speaker='$speaker', onlinelink='$onlinelink', dateofevent='$dateofevent', capacity='$capacity', eventtype='$eventtype', updatedon='$updatedon' WHERE ID='$id'";
    } else {
        $query = "INSERT INTO tbl_events (mst_event_ID, mstevent_event_name, title, description, speaker, onlinelink, dateofevent, capacity, eventtype, updatedon) VALUES ('$mst_event_ID', '$mstevent_event_name', '$title', '$description', '$speaker', '$onlinelink', '$dateofevent', '$capacity', '$eventtype', '$updatedon')";
    }
    mysqli_query($conn, $query);
    header("Location: main_file.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $update ? 'Edit Event' : 'Create Event'; ?></title>
</head>

<body>
    <div class="navbar">
        <img src="logo.png" alt="Logo">
        <button class="admin-btn">Admin Page</button>
    </div>

    <h1><?php echo $update ? 'Edit Event' : 'Create Event'; ?></h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="mst_event_ID">Master Event ID:</label>
        <input type="number" name="mst_event_ID" id="mst_event_ID" value="<?php echo $mst_event_ID; ?>" required><br>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $title; ?>" required><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $description; ?></textarea><br>
        <label for="speaker">Speaker:</label>
        <input type="text" name="speaker" id="speaker" value="<?php echo $speaker; ?>" required><br>
        <label for="onlinelink">Link:</label>
        <input type="text" name="onlinelink" id="onlinelink" value="<?php echo $onlinelink; ?>" required><br>
        <label for="dateofevent">Date:</label>
        <input type="datetime-local" name="dateofevent" id="dateofevent" value="<?php echo date('Y-m-d\TH:i', strtotime($dateofevent)); ?>" required><br>
        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" id="capacity" value="<?php echo $capacity; ?>" required><br>
        <label for="eventtype">Event Type:</label>
        <input type="text" name="eventtype" id="eventtype" value="<?php echo $eventtype; ?>" required><br>
        <button type="submit" name="save_event"><?php echo $update ? 'Update Event' : 'Create Event'; ?></button>
    </form>
</body>

</html>