<?php
session_start();
$name = $_POST['name'];
$roll_number = $_POST['roll_number'];
$class = $_POST['class'];
$email = $_POST['email'];
$id = $_POST['id'];
$conn = mysqli_connect("localhost", "root", "", "lms") or die("Connection failed");
$sql = "UPDATE `students` SET `name` = '$name', `roll_number` = '$roll_number', `class` = '$class', `email` = '$email' WHERE `students`.`id` = $id";
$result = mysqli_query($conn, $sql) or die("Query failed");
$_SESSION['success'] = "Student updated successfully!";
header("Location: index.php");
mysqli_close($conn);
