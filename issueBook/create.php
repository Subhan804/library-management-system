<?php
session_start();
include '../header.php';

$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

// Fetch students
$students = mysqli_query($conn, "SELECT * FROM students");

// Fetch books
$books = mysqli_query($conn, "SELECT * FROM books");
?>

<div class="container">
  <h2 class="mb-4 text-warning">📤 Issue Book to Student</h2>
  <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
      <?= $_SESSION['error'] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php
  endif; ?>
  <!-- in issue.php -->
  <form action="saveData.php" method="POST" class="row g-3">


    <div class="col-md-6">
      <select name="student_id" class="form-select" required>
        <option value="">-- Select Student --</option>
        <?php while ($student = mysqli_fetch_assoc($students)) { ?>
          <option value="<?php echo $student['id']; ?>">
            <?php echo $student['name']; ?> (Roll: <?php echo $student['roll_number']; ?>)
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="col-md-6">
      <select name="book_id" class="form-select" required>
        <option value="">-- Select Book --</option>
        <?php while ($book = mysqli_fetch_assoc($books)) { ?>
          <option value="<?php echo $book['id']; ?>">
            <?php echo $book['title']; ?> (Qty: <?php echo $book['quantity']; ?>)
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="col-md-6">
      <label>Issue Date</label>
      <input type="date" name="issue_date" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label>Due Date</label>
      <input type="date" name="due_date" class="form-control" required>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-warning">Issue Book</button>
    </div>
  </form>
</div>

<?php
include '../footer.php';
?>