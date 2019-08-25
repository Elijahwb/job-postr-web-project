<?php
    $title = 'Job Postr User Profile';

    $type = 'error-page';

    $extracss = 'form';

    session_start();

    if (isset($_SESSION['loggedin'])) {

      $loggedin = $_SESSION['loggedin'];

      require_once('../layouts/headers.php');

      require_once('../content/header.php'); ?>

      <div class="form-area">
        <h2 class="post-job-header">User Profile</h2>
      </div>

      <section class="user-profile-container">

        <div class="side right" id="right-side">
          <h4>Your Posted jobs</h4>
          <div class="user-jobs">
            <?php
              require_once('../functions/getJobs.php');
              require_once('../functions/summarize.php');

              $unique_num = 1;

              $number_jobs = 0;

              foreach ($jobs as $job) {
                if ($job['user_id'] == $_SESSION['userID']) { ?>

                  <div class="job-info userprofile">
                      <h4><?php echo $job['job_title']?></h4>
                      <p class="summary hide" id=<?php echo 'summary-'.$unique_num;?>><?php summarize($job['job_description']);?></p>
                      <div class="more-info" id=<?php echo "more-info-".$unique_num?>>
                        <p class="detailed" id="detailed"><?php echo $job['job_description'];?></p>
                        <p><span class="bold">Contact: </span><?php echo $job['job_contact']?></p>
                      </div>
                      <div class="edit-area">
                        <button class="more edit" id="more-1" type="button" name="button">Edit</button>
                        <button class="more delete" id="more-2" type="button" name="button">Delete</button>
                      </div>
                  </div>
              <?php $number_jobs++;}
                $unique_num++; } ?>
          </div>
        </div>

        <?php
          require_once('../functions/databaseConnection.php');

          $results_user = db_connection();

          if ($results_user['connection_message'] == 'Success') {

                  $sql_user = 'SELECT id, password, phonenumber FROM users WHERE id ="'.$_SESSION['userID'].'"';

                  $stmt_user = $results_user['myPDO']->prepare($sql_user);

                  $stmt_user->execute();

                  $user_prof = $stmt_user->fetchAll();

                  foreach ($user_prof as $profile) {
                    $profile_id = $profile['id'];
                    $profile_pass = $profile['password'];
                    $profile_phone = $profile['phonenumber'];
                  }

                  db_close();
            }
            elseif($results_user == 'Failed') {

                echo 'Connection to the database has Failed!';
            }
            else {
                //do nothing
            }
        ?>
        <div class="side left">
          <h4>User Details</h4>
          <div class="user-details">
            <div class="details-item">
              <p><span class="label">username: </span>
                <span class="user-profile"><?php echo $_SESSION['username'];?></span></p>
              <button type="button" name="button">change</button>
            </div>
            <div class="details-item">
              <p><span class="label">password: </span>
                <span class="user-profile"><?php echo $profile_pass;?></span></p>
              <button type="button" name="button">change</button>
            </div>
            <div class="details-item">
              <p><span class="label">phone-number: </span>
                <span class="user-profile"><?php echo $profile_phone?></span></p>
              <button type="button" name="button">change</button>
            </div>
            <div class="details-item">
              <p><span class="label">Jobs Posted: </span>
                <span class="user-profile"><?php echo $number_jobs?></span></p>
            </div>
          </div>
        </div>

        <div class="scroll-cover"></div>
      </section>

      <section class="change-details hide">
        <form class="login-form change" action="functions/validateLogin.php" method="POST">
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
      </section>


      <script type="text/javascript">
        var postJobError = false;

        document.querySelectorAll('#more-1').forEach(function(button) {

          button.addEventListener('click', function() {
            console.log(this);
            //document.getElementById('right-side').classList.add('fade')
          })
        })

      </script>
    <?php
        require_once('../layouts/footers.php');

      }
        else {
          $loggedin = false;

          header('location: ../index.php');

          session_destroy();

        }
?>
