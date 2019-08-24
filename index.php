<?php
    $title = 'Job Postr Homepage';

    $type = 'official';

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

<section class="container">
    <div class="container-content" id="container-content">
      <h1 class="jobs-main-title">All Jobs</h1>

      <div class="container-jobs">

      <?php
        require_once('functions/getJobs.php');
        require_once('functions/summarize.php');

        $unique_num = 1;

        foreach ($jobs as $job) {?>
          <div class="job-container">
          <div class="blank"></div>
          <div class="job-info">
              <h3><?php echo $job['job_title']?></h3>
              <p class="summary" id=<?php echo 'summary-'.$unique_num;?>><?php summarize($job['job_description']);?></p>
              <div class="more-info hide" id=<?php echo "more-info-".$unique_num?>>
                <p class="detailed" id="detailed"><?php echo $job['job_description'];?></p><br>
                <p><span class="bold">Contact: </span><?php echo $job['job_contact']?></p>
              </div>
              <button class="more" id="more" type="button" name="button">more...</button>
          </div>
          </div>

      <?php $unique_num++; } ?>
      </div>
    </div>

</section>

<script type="text/javascript">
  var postJobError = false;
</script>

<?php
  require_once('layouts/footers.php');
?>
