<?php include '../header.php'; ?>

<div class="container">
  <h3 class="text-center mb-4 text-success">➕ Add New Student</h3>

  <form action="saveData.php" method="POST" class="w-50 mx-auto border p-4 shadow-sm bg-light rounded">
    <div class="mb-3">
      <label class="form-label">Full Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Roll Number</label>
      <input type="number" name="roll_number" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Class</label>
      <input type="text" name="class" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>

    <button type="submit" name="submit" class="btn btn-success w-100">Student</button>
  </form>
</div>

</div>
</body>

</html>