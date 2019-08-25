<?php

  if($_POST['username'] == null || $_POST['username'] == '') {

    header('location: ../login.php');

  }

  //begining of the main else
  else {
    require_once('databaseConnection.php');

    $results = db_connection();

    if ($results['connection_message'] == 'Success') {

            $sql = 'SELECT id,username, password FROM users';

            $stmt = $results['myPDO']->prepare($sql);

            $stmt->execute();

            $users = $stmt->fetchAll();

            $error = true;
            foreach ($users as $user) {
              if($user['username'] == $_POST['username'] and $user['password'] == $_POST['password']) {
                $error = false;
                $userID = $user['id'];
                break;
              }
            }

            if ($error) {
              header("location: ../error/loginerror.php");
            }
            else {
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['userID'] = $userID;
              $_SESSION['username'] = $_POST['username'];

              header("location: ../index.php");
            }

            db_close();
        }
        elseif ($results == 'Failed') {

            echo 'Connection to the database has Failed!';
        }
        else {
            //do nothing
        }
  } //End of the main else

?>
