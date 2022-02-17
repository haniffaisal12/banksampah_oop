<?php
require 'init.php';
?>

<html>

<head>
  <title>Login Aplikasi</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/open-iconic/font/css/open-iconic-bootstrap.min.css">
</head>

<body>
  <div class="container">
    <section class="login-box">

      <h2> <i class="oi oi-account-login"></i> Login Aplikasi</h2>
      <form method="post" action="">
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <input type="submit" name="submit" value="LOGIN">
      </form>
  </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $petugas = new Petugas();
  $petugas->cekLogin($username, $password);
}
?>
