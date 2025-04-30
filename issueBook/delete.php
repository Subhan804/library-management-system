<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch book_id and return_date of this issued book
    $query = mysqli_query($conn, "SELECT book_id, return_date FROM issue_books WHERE id = '$id'");
    $issueData = mysqli_fetch_assoc($query);

    if (!$issueData) {
        $_SESSION['error'] = "❌ Issued book record not found!";
        header("Location: index.php");
        exit;
    }

    $book_id = $issueData['book_id'];
    $return_date = $issueData['return_date'];

    // Check if book is still issued (return_date is empty)
    if ($return_date == NULL || $return_date == '') {
        $_SESSION['error'] = " Cannot delete! Book is still issued to student. Please return it first!";
        header("Location: index.php");
        exit;
    }

    // Book has been returned, allow delete
    $delete = mysqli_query($conn, "DELETE FROM issue_books WHERE id = '$id'");

    if ($delete) {
        $_SESSION['success'] = "🗑️ Book issue record deleted successfully!";
    } else {
        $_SESSION['error'] = "❌ Failed to delete issued book!";
    }

    header("Location: index.php");
    exit;
} else {
    $_SESSION['error'] = "❌ Invalid request!";
    header("Location: index.php");
    exit;
}
