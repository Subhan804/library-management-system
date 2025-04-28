<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Library System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
$base_url = '/lms/';
?>

<body class="d-flex flex-column min-vh-100"> <!-- Added flexbox classes -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 mb-4">
    <div class="container-fluid">
      <!-- Enhanced Header Text -->
      <a class="navbar-brand d-flex align-items-center" href="<?= $base_url ?>dashboard.php">
        <span class="fs-2 fw-bold text-warning">📚 Library System</span>
      </a>

      <!-- Toggler for Mobile View -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown me-3">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Manage
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item text-white py-2 px-4 fs-6" href="<?= $base_url ?>books/index.php">Manage Books</a></li>
              <li><a class="dropdown-item text-white py-2 px-4 fs-6" href="<?= $base_url ?>students/index.php">Manage Students</a></li>
              <li><a class="dropdown-item text-white py-2 px-4 fs-6" href="<?= $base_url ?>issueBook/index.php">Issue Book</a></li>
            </ul>
          </li>

          <!-- Home Button with margin -->
          <li class="nav-item ms-4"> <!-- Added ms-4 here -->
            <a class="nav-link bg-white text-dark border border-2 rounded px-2 py-2 shadow-sm fw-semibold" href="<?= $base_url ?>dashboard.php">
              Home
            </a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

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

<style>
  /* Hover effect for cards */
  .card:hover {
    transform: translateY(-12px); /* Lift the card slightly */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Add a deeper shadow */
    background-color: #f8f9fa; /* Slightly change the background color */
  }
</style>

  <!-- Footer -->
  <footer class="bg-dark text-white mt-auto"> <!-- Added mt-auto -->
    <div class="container py-4">
      <div class="row">
        <div class="col-md-6">
          <h5>About Us</h5>
          <p class="small">
            Welcome to the Library Management System. We provide tools to manage books, students, and book issuance efficiently.
          </p>
        </div>
        <div class="col-md-3">
          <h5>Quick Links</h5>
          <ul class="list-unstyled small">
            <li><a href="<?= $base_url ?>dashboard.php" class="text-white text-decoration-none">Home</a></li>
            <li><a href="<?= $base_url ?>books/index.php" class="text-white text-decoration-none">Manage Books</a></li>
            <li><a href="<?= $base_url ?>students/index.php" class="text-white text-decoration-none">Manage Students</a></li>
            <li><a href="<?= $base_url ?>issueBook/index.php" class="text-white text-decoration-none">Issue Book</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Contact</h5>
          <p class="small">
            Email: support@librarysystem.com<br>
            Phone: +123 456 7890
          </p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col text-center">
          <p class="small mb-0">&copy; 2023 Library Management System. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS for Dropdown and Other Components -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>