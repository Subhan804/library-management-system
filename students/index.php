<?php
session_start();
include '../header.php';
?>

<?php if (isset($_GET['success']) && $_GET['success'] == 'add'): ?>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ <strong>Student Added!</strong> The student has been added successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['success'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div>
<?php unset($_SESSION['success']);
endif; ?>

<?php if (isset($_SESSION['error'])): ?>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div>
<?php unset($_SESSION['error']);
endif; ?>

<div class="container">
  <div class="row mt-5">
    <div class="col-6">
      <h2 class="mb-4 text-success">👨‍🎓 Student List</h2>
    </div>
    <div class="col-6">
      <a href="create.php" class="btn btn-success float-end">Add Student</a>
    </div>
  </div>

  <hr>

  <table class="table table-striped mt-5">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Roll No</th>
        <th>Class</th>
        <th>Email</th>
        <th>Books Assigned</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");
      $sql = "SELECT * FROM students";
      $result = mysqli_query($conn, $sql) or die("Query failed");

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $student_id = $row['id'];

          // Get assigned (not yet returned) books
          $booksQuery = mysqli_query($conn, "
            SELECT books.Title 
            FROM issue_books 
            JOIN books ON issue_books.book_id = books.ID 
            WHERE issue_books.student_id = '$student_id' AND issue_books.return_date IS NULL
          ");

          $bookTitles = [];
          while ($book = mysqli_fetch_assoc($booksQuery)) {
            $bookTitles[] = $book['Title'];
          }
      ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['roll_number'] ?></td>
            <td><?= $row['class'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
              <?php
              if (!empty($bookTitles)) {
                echo "<ul class='mb-0'>";
                foreach ($bookTitles as $title) {
                  echo "<li>$title</li>";
                }
                echo "</ul>";
              } else {
                echo "<span class='text-muted'>No books assigned</span>";
              }
              ?>
            </td>
            <td>
              <a href='update.php?id=<?= $row['id'] ?>' class="btn btn-success btn-sm">Edit</a>
              <a href='deletedata.php?id=<?= $row['id'] ?>' class="btn btn-danger btn-sm">Delete</a>
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

<?php include '../footer.php'; ?>