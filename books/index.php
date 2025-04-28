<?php 
session_start();
include '../header.php';
?>

<div class="container mt-4">

<!-- ✅ SESSION ALERTS -->
<?php if (isset($_SESSION['success'])): ?>
  <div class="row justify-content-center mt-3">
    <div class="col-md-6">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ <?= $_SESSION['success'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div>
<?php unset($_SESSION['success']); endif; ?>

<?php if (isset($_SESSION['error'])): ?>
  <div class="row justify-content-center mt-3">
    <div class="col-md-6">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        ❌ <?= $_SESSION['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div>
<?php unset($_SESSION['error']); endif; ?>

<!-- ✅ Page Heading and Add Button -->
<div class="row mt-5">
  <div class="col-6">
    <h2 class="mb-3 text-success">📚 Add New Book</h2>
  </div>
  <div class="col-6">
    <a href="./create.php" class="btn btn-success float-end">Add Book</a>
  </div>
</div>

<div class="bg-success"><hr></div>

<h3 class="mb-3">📖 Book List</h3>
<table class="table table-striped">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Author</th>
      <th>Genre</th>
      <th>Quantity</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $conn = mysqli_connect("localhost", "root", "", "LMS") or die("connection failed");
      $sql = "SELECT * FROM books";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['author'] ?></td>
        <td><?= $row['genre'] ?></td>
        <td><?= $row['quantity'] ?></td>
        <td>
          <a href='update.php?id=<?= $row['id'] ?>' class="btn btn-success">Edit</a>
          <a href='deletedata.php?id=<?= $row['id'] ?>' class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php
        }
      } else {
        echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
      }
    ?>
  </tbody>
</table>

</div> <!-- End container -->
