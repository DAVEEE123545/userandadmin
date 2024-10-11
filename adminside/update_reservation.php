<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "facility_reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if both 'id' and 'action' are passed in the request
if (isset($_POST['id']) && isset($_POST['action'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $action = $conn->real_escape_string($_POST['action']);
    $status = ($action === 'approve') ? 'Approved' : 'Rejected';

    // Prepare SQL statement
    $sql = "UPDATE reservations SET status='$status' WHERE id=$id";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => ucfirst($status) . " successfully"]);
    } else {
        echo json_encode(['status' => 'error', 'message' => "Error updating record: " . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => "Invalid request"]);
}

$conn->close();
?>
