<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch book_id before deleting
    $get = mysqli_query($conn, "SELECT book_id FROM issue_books WHERE id = '$id'");
    $row = mysqli_fetch_assoc($get);
    $book_id = $row['book_id'];

    $delete = mysqli_query($conn, "DELETE FROM issue_books WHERE id = '$id'");

    // Restore quantity
    mysqli_query($conn, "UPDATE books SET quantity = quantity + 1 WHERE id = '$book_id'");

    $_SESSION['success'] = "🗑️ Book return recorded (deleted)!";
    header("Location: index.php");
    exit;
} else {
    $_SESSION['error'] = "❌ Invalid request!";
    header("Location: index.php");
    exit;
}
?>
