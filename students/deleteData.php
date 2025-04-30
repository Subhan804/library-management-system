<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 🔍 Check if student has any books not returned
    $checkQuery = "SELECT * FROM issue_books WHERE student_id = $id AND return_date IS NULL";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['error'] = "❌ Cannot delete student. They still have books issued.";
    } else {
        // ✅ Safe to delete student
        $sql = "DELETE FROM students WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['success'] = "✅ Student deleted successfully!";
        } else {
            $_SESSION['error'] = "❌ Failed to delete student.";
        }
    }
} else {
    $_SESSION['error'] = "❌ No student ID found!";
}

header("Location: index.php");
exit;
