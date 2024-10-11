<?php
$servername = "localhost:3307";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "facility_reservation"; // Replace with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch events
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT event_date, status FROM facility_events";
    $result = $conn->query($sql);
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    echo json_encode($events);
    exit; // Exit to avoid further output
}

// Insert or update an event
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['event_date'];
    $status = $_POST['status'];

    // Check if the event exists
    $sql = "SELECT id FROM facility_events WHERE event_date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the existing event
        $sql = "UPDATE facility_events SET status = ? WHERE event_date = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $status, $date);
    } else {
        // Insert a new event
        $sql = "INSERT INTO facility_events (event_date, status) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $date, $status);
    }

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
    exit; // Exit after processing
}

// Delete an event
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $date = $_DELETE['event_date'];
    $sql = "DELETE FROM facility_events WHERE event_date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $date);
    $stmt->execute();
    echo json_encode(["success" => true]);
    exit; // Exit after processing
}

$conn->close();
?>
