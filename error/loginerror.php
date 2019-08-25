<?php
    $title = 'Job Postr Login Error';

    $loggedin = false;

    $type = 'error-page';

    $extracss = 'form';

    require_once('../layouts/headers.php');

    require_once('../content/header.php');
?>
  <h2 class="login-header">Login</h2>

  <p class="login-error">username or password is incorrect</p>

  <form class="login-form" action="../functions/validateLogin.php" method="POST">
    <div class="login-item type">
      <input type="text" name="username" placeholder="username" autofocus>
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
    <a href="../signup.php">Signup now</a>
  </div>

<?php
  require_once('../layouts/footers.php');
?>
