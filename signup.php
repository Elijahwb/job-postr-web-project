<?php
    $title = 'Job Postr Signup';

    $type = 'signup page';

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

  <div class="form-area">
    <h2 class="signup-header">Signup</h2>

    <form class="login-form signup" action="functions/validateSignup.php" method="POST">
      <div class="login-item type">
        <input type="text" name="username" placeholder="username" autofocus>
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
      <a href="login.php">Login now</a>
    </div>
  </div>

<?php
  require_once('layouts/footers.php');
?>
