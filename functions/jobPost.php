<?php
  $title = 'nothing';
  if($_POST['jobtitle'] == null || $_POST['jobtitle'] == ''
    ||$_POST['jobdescription'] == '' ||$_POST['jobdescription'] == ''
    ||$_POST['jobcontact'] == '' ||$_POST['jobcontact'] == '') {

    header('location: ../secure/postJob.php');

  }

  //begining of the main else
  else {
    require_once('databaseConnection.php');

    $results = db_connection();

    if ($results['connection_message'] == 'Success') {

            $sql = 'INSERT INTO jobs (user_id, job_title, job_description, job_contact)
                    VALUES ("' .$_POST['userid']. '","'
                    .$_POST['jobtitle'] .'","'
                    .$_POST['jobdescription'] .'","'
                    .$_POST['jobcontact'].'")';

            $stmt = $results['myPDO']->prepare($sql);

            $stmt->execute();

            db_close();

            header("location: ../index.php");
        }
        elseif ($results == 'Failed') {

            echo 'Connection to the database has Failed!';
        }
        else {
            //do nothing
        }
  } //End of the main else

?>
