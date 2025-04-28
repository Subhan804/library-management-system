<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO books (title, author, genre, quantity) 
            VALUES ('$title', '$author', '$genre', '$quantity')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "📘 Book added successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "❌ Failed to add book!";
        header("Location: index.php");
        exit();
    }
}
?>
