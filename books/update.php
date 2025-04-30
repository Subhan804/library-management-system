<?php
$conn = mysqli_connect("localhost", "root", "", "LMS") or die("Connection failed");

// Get book ID from URL
$id = $_GET['id'];

// Fetch current book data
$sql = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<?php include '../header.php'; ?>

<div class="container">
  <h3 class="text-center mb-4 text-primary">✏️ Edit Book</h3>

  <form action="updateData.php" method="POST" class="w-50 mx-auto border p-4 shadow-sm bg-light rounded">
    <!-- Hidden ID to pass to update.php -->
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Author</label>
      <input type="text" name="author" class="form-control" value="<?php echo $row['author']; ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Genre</label>
      <input type="text" name="genre" class="form-control" value="<?php echo $row['genre']; ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Quantity</label>
      <input type="number" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>" required>
    </div>

    <button type="submit" name="update" class="btn btn-success w-100">Update Book</button>
  </form>
</div>


<?php
include '../footer.php';
?>