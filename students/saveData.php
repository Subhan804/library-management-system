<?php
session_start();

$name = $_POST['name'];
$roll_number = $_POST['roll_number'];
$class = $_POST['class'];
$email = $_POST['email'];

$conn = mysqli_connect("localhost", "root", "", "lms") or die("Connection failed");

$sql = "INSERT INTO students (name, roll_number, class, email) 
            VALUES ('$name', '$roll_number', '$class', '$email')";

$result = mysqli_query($conn, $sql) or die("Query failed");
$_SESSION['success'] = "Student added successfully!";
// 👇 Redirect with success flag
header("Location: index.php");

mysqli_close($conn);
