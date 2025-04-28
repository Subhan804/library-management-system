<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $bookQuery = mysqli_query($conn, "SELECT book_id FROM issue_books WHERE id = $id");
    $book = mysqli_fetch_assoc($bookQuery);
    $book_id = $book['book_id'];

    $return_date = date('Y-m-d');

    // Update return date
    $update = "UPDATE issue_books SET return_date = '$return_date' WHERE id = '$id'";
    $updateResult = mysqli_query($conn, $update);

    // Increase quantity back
    $updateBook = "UPDATE books SET quantity = quantity + 1 WHERE id = '$book_id'";
    $bookResult = mysqli_query($conn, $updateBook);
    
    if ($updateResult && $bookResult) {
        $_SESSION['success'] = "Book returned successfully!";
    } else {
        $_SESSION['error'] = "Failed to return book!";
    }

    header("Location: index.php");
    exit();
}
?>
