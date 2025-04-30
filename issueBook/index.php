<?php
session_start();
include '../header.php';
?>
<div class="container">

    <!-- ✅ Success/Error Alerts -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            ✅ <?= $_SESSION['success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php unset($_SESSION['success']);
    endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            ❌ <?= $_SESSION['error'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php unset($_SESSION['error']);
    endif; ?>

    <!-- Header -->
    <div class="row mt-3">
        <div class="col-6">
            <h2 class="mb-4 text-success">👨‍🎓 Issue Books List</h2>
        </div>
        <div class="col-6">
            <a href="create.php" class="btn btn-success float-end">Issue Book</a>
        </div>
    </div>

    <div class="text-success mb-4 mt-3">
        <hr>
    </div>
    <!-- Table -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Book</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Return Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "LMS") or die("connection failed");
            $sql = "SELECT issue_books.*, students.name AS student_name, books.title AS book_title
                FROM issue_books 
                JOIN books ON issue_books.book_id = books.id 
                JOIN students ON issue_books.student_id = students.id";
            $result = mysqli_query($conn, $sql) or die("Query failed");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['student_name'] ?></td>
                        <td><?= $row['book_title'] ?></td>
                        <td><?= $row['issue_date'] ?></td>
                        <td><?= $row['due_date'] ?></td>
                        <td><?= $row['return_date'] ?></td>
                        <td>
                            <?php
                            if ($row['return_date'] == null) {
                            ?>
                                <a href='returnBook.php?id=<?= $row['id'] ?>' class="btn btn-success">Return Book</a>
                            <?php
                            }
                            ?>
                            <a href='update.php?id=<?= $row['id'] ?>' class="btn btn-success">Edit</a>
                            <a href='delete.php?id=<?= $row['id'] ?>' class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>
<?php
include '../footer.php';
?>