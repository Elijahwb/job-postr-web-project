<?php
    $title = 'Job Postr';

    $type = 'error-page';

    $extracss = 'form';

    session_start();

    if (isset($_SESSION['loggedin'])) {

      $loggedin = $_SESSION['loggedin'];

      require_once('../layouts/headers.php');

      require_once('../content/header.php'); ?>

      <div class="form-area">
        <h2 class="post-job-header">Post Job</h2>

        <form class="login-form signup" action="../functions/jobPost.php" method="POST">
          <div class="login-item type">
            <input type="text" name="jobtitle" placeholder="Job-Title" autofocus>
          </div>
          <div class="login-item type">
            <textarea name="jobdescription" class="job-description" rows="5" cols="30" placeholder="Job-Description"></textarea>
          </div>
          <div class="login-item type">
            <input type="text" name="jobcontact" placeholder="Job-Contact">
          </div>
          <input type="hidden" name="userid" id="user-id" value=<?php echo $_SESSION['userID'];?>>
          <div class="login-item">
            <input type="submit" value="Post Job" id="job-post">
          </div>
        </form>
        <!--
        <div class="signup-help">
          <p>Already have an account?</p>
          <a href="../login.php">Login now</a>
        </div>-->
      </div>

    <?php
        require_once('../layouts/footers.php');

        }
        else {
          $loggedin = false;

          session_destroy();

          header("location: ../error/postjoberror.php");

        }
?>
