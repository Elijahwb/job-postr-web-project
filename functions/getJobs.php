<?php
//solving the relative path issues
  if ($title == "Job Postr Error" || $title == 'Job Postr User Profile') {
    require_once('../functions/databaseConnection.php');
  }else {
    require_once('functions/databaseConnection.php');
  }

  $results = db_connection();

  if ($results['connection_message'] == 'Success') {

          $sql = 'SELECT * FROM jobs
          ORDER BY time_created DESC';

          $stmt = $results['myPDO']->prepare($sql);

          $stmt->execute();

          $jobs = $stmt->fetchAll();

          db_close();
    }
    elseif($results == 'Failed') {

        echo 'Connection to the database has Failed!';
    }
    else {
        //do nothing
    }
?>
