<?php
// Database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "facility_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert reservation into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $facility_name = $_POST['facility_name'];
    $reservation_date = $_POST['reservation_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $sql = "INSERT INTO reservations (user_name, email, facility_name, reservation_date, start_time, end_time)
            VALUES ('$user_name', '$email', '$facility_name', '$reservation_date', '$start_time', '$end_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
