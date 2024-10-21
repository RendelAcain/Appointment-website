<?php
$servername = "localhost"; // Your database host
$username = "your_username"; // Your database username
$password = "your_password"; // Your database password
$dbname = "health_center"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO appointments (name, email, appointment_date, appointment_time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $date, $time);

// Get the values from the form
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];

// Execute the statement
if ($stmt->execute()) {
    echo "Appointment booked successfully! Thank you, $name.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
