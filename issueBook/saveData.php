<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $issue_date = $_POST['issue_date'];
    $due_date = $_POST['due_date'];

    // ✅ 1. Check if student already has this book not returned yet
    $duplicateCheck = mysqli_query($conn, "SELECT * FROM issue_books 
        WHERE student_id = '$student_id' 
        AND book_id = '$book_id' 
        AND return_date IS NULL");

    if (mysqli_num_rows($duplicateCheck) > 0) {
        $_SESSION['error'] = "❌ This student already has this book issued and not returned!";
        header("Location: create.php");
        exit;
    }

    // ✅ 2. Check if book quantity is available
    $check = mysqli_query($conn, "SELECT quantity FROM books WHERE id = '$book_id'");
    $row = mysqli_fetch_assoc($check);

    if ($row && $row['quantity'] > 0) {
        // ✅ 3. Insert new issue record
        $sql = "INSERT INTO issue_books (student_id, book_id, issue_date, due_date) 
                VALUES ('$student_id', '$book_id', '$issue_date', '$due_date')";
        $insert = mysqli_query($conn, $sql);

        // ✅ 4. Decrease book quantity
        mysqli_query($conn, "UPDATE books SET quantity = quantity - 1 WHERE id = '$book_id'");

        $_SESSION['success'] = "📚 Book issued successfully!";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['error'] = "❌ Not enough quantity available!";
        header("Location: create.php");
        exit;
    }
}
