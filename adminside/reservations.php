<?php
$host = 'localhost:3307';
$db_name = 'barangay_reservations';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to retrieve all reservations
function getReservations($conn) {
    $sql = "SELECT * FROM reservations";
    $result = $conn->query($sql);
    $reservations = [];
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }
    return $reservations;
}

// Function to add a reservation
function addReservation($conn, $data) {
    $stmt = $conn->prepare("INSERT INTO reservations (name, date, time, purpose, room_type, price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssd", $data['name'], $data['date'], $data['time'], $data['purpose'], $data['room_type'], $data['price']);
    $stmt->execute();
    $stmt->close();
}

// Function to update a reservation
function updateReservation($conn, $data) {
    $stmt = $conn->prepare("UPDATE reservations SET name=?, date=?, time=?, purpose=?, room_type=?, price=? WHERE id=?");
    $stmt->bind_param("ssssssi", $data['name'], $data['date'], $data['time'], $data['purpose'], $data['room_type'], $data['price'], $data['id']);
    $stmt->execute();
    $stmt->close();
}

// Function to delete a reservation
function deleteReservation($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM reservations WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Handle incoming requests
$request_method = $_SERVER['REQUEST_METHOD'];
switch ($request_method) {
    case 'GET':
        $reservations = getReservations($conn);
        echo json_encode($reservations);
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        addReservation($conn, $data);
        echo json_encode(["message" => "Reservation added successfully!"]);
        break;
    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        updateReservation($conn, $data);
        echo json_encode(["message" => "Reservation updated successfully!"]);
        break;
    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"), true);
        deleteReservation($conn, $data['id']);
        echo json_encode(["message" => "Reservation deleted successfully!"]);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

$conn->close();
?>
