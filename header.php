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

<body>

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
  <div class="container">
    <!-- Your content goes here -->
  </div>

  <!-- Bootstrap JS for Dropdown and Other Components -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>