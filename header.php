<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>AurigaStore</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <img src="assets/img/logo.png" width="35">
      AurigaStore
    </a>

    <div class="navbar-nav ms-auto align-items-center">
      <a class="nav-link" href="index.php">Home</a>
      <a class="nav-link" href="keranjang.php">Keranjang</a>

      <?php if(isset($_SESSION['user'])){ ?>
          <span class="nav-link fw-bold">
              Hi, <?= htmlspecialchars($_SESSION['user']) ?>
          </span>
          <a class="nav-link text-danger" href="logout.php">Logout</a>
      <?php } else { ?>
          <a class="btn btn-outline-light ms-2" href="login.php">
              Login
          </a>
      <?php } ?>
    </div>
  </div>
</nav>

<div class="container mt-4">
