<header class="header" id="header">
    <div class="menu" id="menu">
        <div class="bar"></div>
    </div>

    <div class="header-bg" id="header-bg"></div>

    <?php
    if($loggedin == false) {
        if($type == 'error-page'){?>

          <a class="logo" href="/" id="logo">Jobgate</a>
          <nav class="nav-hide" id="nav">
            <ul>
              <li><a href="../index.php">Jobs</a></li>
              <li><a href="../secure/postJob.php">Post Job</a></li>
              <li><a href="../login.php">Login</a></li>
              <li><a href="../signup.php">Signup</a></li>
            </ul>
          </nav>

        <?php } else {?>

          <a class="logo" href="/" id="logo">Jobgate</a>
          <nav class="nav-hide" id="nav">
            <ul>
              <li><a href="index.php">Jobs</a></li>
              <li><a href="secure/postJob.php">Post Job</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="signup.php">Signup</a></li>
            </ul>
          </nav>
        <?php }
      } elseif($loggedin == true) {
          if($type == 'error-page'){?>

            <a class="logo" href="/" id="logo">Jobgate</a>
            <nav class="nav-hide" id="nav">
              <ul>
                <li class="username"><p><a href='../secure/userprofile.php'><?php echo $_SESSION['username'];?></a></p></li>
                <li><a href="../index.php">Jobs</a></li>
                <li><a href="../secure/postJob.php">Post Job</a></li>
                <li><a href="../functions/logout.php">Logout</a></li>
              </ul>
            </nav>

          <?php } else {?>

            <a class="logo" href="/" id="logo">Jobgate</a>
            <nav class="nav-hide" id="nav">
              <ul>
                <li class="username"><p><a href='secure/userprofile.php'><?php echo $_SESSION['username'];?></a></p></li>
                <li><a href="index.php">Jobs</a></li>
                <li><a href="secure/postJob.php">Post Job</a></li>
                <li><a href="functions/logout.php">Logout</a></li>
              </ul>
            </nav>
          <?php }
        }
        else {
          //do nothing
        }?>
  </header>
