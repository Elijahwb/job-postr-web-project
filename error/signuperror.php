<?php
    $title = 'Job Postr Signup';

    $loggedin = false;

    $type = 'error-page';

    $extracss = 'form';

    require_once('../layouts/headers.php');

    require_once('../content/header.php');
?>

  <h2 class="signup-header">Signup</h2>

  <form class="login-form signup error" action="../functions/validateSignup.php" method="POST">
    <div class="login-item type">
      <input type="text" name="username" placeholder="username" autofocus>
      <p class="user-exists">sorry username already taken!</p>
    </div>
    <div class="login-item type">
      <input type="password" name="password" placeholder="password">
    </div>
    <div class="login-item type">
      <input type="text" name="contact" placeholder="phone-number">
    </div>
    <div class="login-item">
      <input type="submit" value="Signup">
    </div>
  </form>

  <div class="signup-help">
    <p>Already have an account?</p>
    <a href="../login.php">Login now</a>
  </div>

<?php
  require_once('../layouts/footers.php');
?>
