<?php
session_start();
include '../koneksi.php';

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($koneksi,
        "SELECT * FROM users WHERE username='$u' AND password='$p' AND role='admin'");

    if(mysqli_num_rows($q) > 0){
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login | AurigaStore</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/admin.css" rel="stylesheet">
</head>
<body class="admin-login">

<div class="login-box">
    <h3>Admin Login</h3>
    <p class="text-muted">AurigaStore Panel</p>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="post">
        <input class="form-control mb-3" name="username" placeholder="Username" required>
        <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
        <button name="login" class="btn btn-dark w-100">Login</button>
    </form>
</div>

</body>
</html>
