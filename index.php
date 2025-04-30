<?php
include './header.php';
?>

<!-- Main Content -->
<div class="container mt-5   flex-grow-1">
  <h2 class="text-center text-primary mb-5">📚 Library Management Dashboard</h2>

  <div class="row g-4">
    <div class="col-md-4">
      <a href="books/index.php" class="text-decoration-none">
        <div class="card shadow border-0 bg-light text-center p-4"
          style="transition: all 0.3s ease;">
          <h4>📘 Manage Books</h4>
          <p>Add, view, edit, or delete books</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="students/index.php" class="text-decoration-none">
        <div class="card shadow border-0 bg-light text-center p-4"
          style="transition: all 0.3s ease;">
          <h4>🎓 Manage Students</h4>
          <p>Add and manage student records</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="issueBook/index.php" class="text-decoration-none">
        <div class="card shadow border-0 bg-light text-center p-4"
          style="transition: all 0.3s ease;">
          <h4>📤 Issue Book</h4>
          <p>Issue books to students</p>
        </div>
      </a>
    </div>
  </div>
</div>

<?php
include './footer.php';
?>