<?php
// Database connection
$servername = "localhost:3307"; // Use your actual server and port
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "facility_reservation"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the reservation
    $sql = "DELETE FROM reservations WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Redirect with success message
        header("Location: admin.php?message=deleted_successfully");
        exit(); // Stop the script after redirect
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
