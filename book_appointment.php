<?php
$servername = "localhost"; 
$username = "your_username"; 
$password = "your_password"; 
$dbname = "health_center"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// para sa connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// para magprepare at mabind
$stmt = $conn->prepare("INSERT INTO appointments (name, email, appointment_date, appointment_time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $date, $time);

// kuhanin ang values sa form
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
