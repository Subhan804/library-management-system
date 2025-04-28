<?php
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

// Fetch the issue record to edit
if (!isset($_GET['id'])) {
    die("Invalid Request. ID missing.");
}

$issue_id = $_GET['id'];
$issue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM issue_books WHERE id = '$issue_id'"));

// Fetch students and books for dropdowns
$students = mysqli_query($conn, "SELECT * FROM students");
$books = mysqli_query($conn, "SELECT * FROM books");
?>

<?php include '../header.php'; ?>
<div class="container">
<h2 class="mb-4 text-warning">✏️ Edit Issued Book</h2>

<form action="updateData.php" method="POST" class="row g-3">
    <input type="hidden" name="id" value="<?= $issue_id; ?>">
    <div class="col-md-6">
        <label>Student</label>
        <select name="student_id" class="form-select" required>
            <?php while ($student = mysqli_fetch_assoc($students)) { ?>
                <option value="<?= $student['id']; ?>" <?= $student['id'] == $issue['student_id'] ? 'selected' : '' ?>>
                    <?= $student['name']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6">
        <label>Book</label>
        <select name="book_id" class="form-select" required>
            <?php while ($book = mysqli_fetch_assoc($books)) { ?>
                <option value="<?= $book['id']; ?>" <?= $book['id'] == $issue['book_id'] ? 'selected' : '' ?>>
                    <?= $book['title']; ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="col-md-6">
        <label>Issue Date</label>
        <input type="date" name="issue_date" value="<?= $issue['issue_date']; ?>" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label>Due Date</label>
        <input type="date" name="due_date" value="<?= $issue['due_date']; ?>" class="form-control" required>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-warning">Update</button>
    </div>
    </div>
</form>
