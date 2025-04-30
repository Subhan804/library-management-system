<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $new_book_id = $_POST['book_id'];
    $issue_date = $_POST['issue_date'];
    $due_date = $_POST['due_date'];

    // Get the old book_id
    $getOld = mysqli_query($conn, "SELECT book_id FROM issue_books WHERE id = '$id'");
    $oldData = mysqli_fetch_assoc($getOld);
    $old_book_id = $oldData['book_id'];

    if ($old_book_id != $new_book_id) {
        // ✅ Increase quantity of old book
        mysqli_query($conn, "UPDATE books SET quantity = quantity + 1 WHERE id = '$old_book_id'");

        // ✅ Check new book quantity
        $checkNewBook = mysqli_query($conn, "SELECT quantity FROM books WHERE id = '$new_book_id'");
        $newBook = mysqli_fetch_assoc($checkNewBook);

        if ($newBook['quantity'] <= 0) {
            $_SESSION['error'] = "❌ Cannot change book. New selected book has 0 quantity!";
            header("Location: update.php?id=$id");
            exit;
        }

        // ✅ Decrease quantity of new book
        mysqli_query($conn, "UPDATE books SET quantity = quantity - 1 WHERE id = '$new_book_id'");
    }

    // ✅ Now update the issue_books table
    $update = mysqli_query($conn, "UPDATE issue_books 
        SET student_id = '$student_id', 
            book_id = '$new_book_id', 
            issue_date = '$issue_date', 
            due_date = '$due_date' 
        WHERE id = '$id'");

    if ($update) {
        $_SESSION['success'] = "✅ Issued book updated successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "❌ Failed to update issued book!";
        header("Location: index.php");
        exit();
    }
} else {
    $_SESSION['error'] = "❌ Invalid request!";
    header("Location: index.php");
    exit();
}
?>
