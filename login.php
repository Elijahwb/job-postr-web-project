<?php
    $title = 'Job Postr Login';

    $type = '';

    $extracss = 'form';

    session_start();

    if (isset($_SESSION['loggedin'])) {
      $loggedin = $_SESSION['loggedin'];
    }else {
      $loggedin = false;
      session_destroy();
    }
    require_once('layouts/headers.php');

    require_once('content/header.php');
?>
  <h2 class="login-header">Login</h2>

  <form class="login-form" action="functions/validateLogin.php" method="POST">
    <div class="login-item type">
      <input type="text" name="username" placeholder="username" value='' autofocus>
    </div>
    <div class="login-item type">
      <input type="password" name="password" placeholder="password">
    </div>
    <div class="login-item">
      <input type="submit" value="Login">
    </div>
  </form>

  <div class="login-help">
    <p>No account?</p>
    <a href="signup.php">Signup now</a>
  </div>



<?php
  require_once('layouts/footers.php');
?>
