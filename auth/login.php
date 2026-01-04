<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$db = new Database();
$conn = $db->getConnection();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../public/index.php"); 
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="login-body">
  <div class="wrapper">

    <!-- SATU FORM SAJA -->
    <form action="login.php" method="POST">
      <h1>Login</h1>

      <div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>

      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>

      <div class="remember-forgot">
        <label><input type="checkbox"> Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>

      <button type="submit" name="login" class="btn">Login</button>

      <div class="register-link">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div>
    </form>

  </div>
</body>
</html>
