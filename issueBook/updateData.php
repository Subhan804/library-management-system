<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $issue_date = $_POST['issue_date'];
    $due_date = $_POST['due_date'];

    $sql = "UPDATE `issue_books` SET `student_id` = '$student_id', `book_id` = '$book_id', `issue_date` = '$issue_date', `due_date` = '$due_date' WHERE `issue_books`.`id` = $id";

    $result = mysqli_query($conn, $sql);
    mysqli_query($conn, "UPDATE books SET quantity = quantity + 1 WHERE id = '$book_id'");
    if ($result) {
        $_SESSION['success'] = "✏️ Issue Book updated successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "❌ Failed to update issue book!";
        header("Location: index.php");
        exit();
    }
}
