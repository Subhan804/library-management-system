<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the book is currently issued (not returned yet)
    $checkIssued = mysqli_query($conn, "SELECT * FROM issue_books WHERE book_id = $id AND return_date IS NULL");

    if (mysqli_num_rows($checkIssued) > 0) {
        $_SESSION['error'] = " Cannot delete this book. It is currently assigned to a student!";
    } else {
        // Proceed with deletion if not issued
        $sql = "DELETE FROM books WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "📚 Book deleted successfully!";
        } else {
            $_SESSION['error'] = "❌ Failed to delete book!";
        }
    }

    header("Location: index.php");
    exit();
} else {
    $_SESSION['error'] = "❌ Invalid request!";
    header("Location: index.php");
    exit();
}
