<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', quantity='$quantity' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "✏️ Book updated successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "❌ Failed to update book!";
        header("Location: index.php");
        exit();
    }
}
