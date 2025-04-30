<?php include '../header.php'; ?>
<h3 class="text-center mb-4 text-primary">✏️ Add Book</h3>

<form action="saveData.php" method="POST" class="w-50 mx-auto border p-4 shadow-sm bg-light rounded">
  <div class="mb-3">
    <label class="form-label">Book Title:</label>
    <input type="text" name="title" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Author:</label>
    <input type="text" name="author" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Genre:</label>
    <input type="text" name="genre" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Quantity:</label>
    <input type="number" name="quantity" class="form-control" required>
  </div>

  <button type="submit" name="submit" class="btn btn-success  w-100">Submit</button>
</form>


<?php
include '../footer.php';
?>