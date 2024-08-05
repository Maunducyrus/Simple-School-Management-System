<?php
//Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_registration";

$con = new mysqli($servername. $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die ("connection failed: " . $conn->connect_error);
}

//Get form data
$name = $_POST['name'];
$regNo = $_POST['regNo'];
$email = $_POST['email'];
$password = password_has($_POST['password'], PASSWORD_DEFAULT);
$course = $_POST['course'];

//Insert data into database
$sql = "INSERT INTO students (name, regNo, email, password, course_id) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $regNo, $email, $password, $course);

if ($stmt->execute()) {
    echo "Registration successful";
}else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>