<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
<div class="container">
    <span class="navbar-brand">Admin AurigaStore</span>
    <div>
        <a href="dashboard.php" class="text-white me-3">Dashboard</a>
        <a href="produk.php" class="text-white me-3">Produk</a>
        <a href="logout.php" class="text-danger">Logout</a>
    </div>
</div>
</nav>

<div class="container mt-4">
