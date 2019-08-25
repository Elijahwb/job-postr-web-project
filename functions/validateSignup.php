<?php
//solving the relative path issues
$title = 'nothing';
if($_POST['username'] == null || $_POST['username'] == ''
  ||$_POST['password'] == '' ||$_POST['password'] == ''
  ||$_POST['contact'] == '' ||$_POST['contact'] == '') {

  header('location: ../secure/postJob.php');

}else {
  require_once('databaseConnection.php');

  $results = db_connection();

  if ($results['connection_message'] == 'Success') {

          $sql_one = 'SELECT username FROM users';

          $stmt_one = $results['myPDO']->prepare($sql_one);

          $stmt_one->execute();

          $users = $stmt_one->fetchAll();

          foreach ($users as $user) {
            if($user['username'] == $_POST['username']) {

              $qualified = false;

              header('location: ../error/signuperror.php');

              break;
            }
            else {
              $qualified = true;
            }
          }

          //signup a user if the username is not in the database already
          if($qualified) {
            $sql_two = 'INSERT INTO users (username, password, phonenumber)
                        VALUES ("' .$_POST['username']. '","'
                        .$_POST['password'] .'","'
                        .$_POST['contact'] .'")';

            $stmt_two = $results['myPDO']->prepare($sql_two);

            $stmt_two->execute();
            //user is signed up

            //get the newly signed up user's ID
            $sql_three = 'SELECT id,username FROM users WHERE username ="'.$_POST['username'].'"';

            $stmt_three = $results['myPDO']->prepare($sql_three);

            $stmt_three->execute();

            $newuser = $stmt_three->fetchAll();

            foreach ($newuser as $user) {
              //store the user's ID in the following variable
              $userID = $user['id'];
            }

            //login the new user automatically
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['userID'] = $userID;
            $_SESSION['username'] = $_POST['username'];

            header("location: ../index.php");
          }else {

            header('location: ../error/signuperror.php');

          }

          db_close();
    }
    elseif($results == 'Failed') {

        echo 'Connection to the database has Failed!';
    }
    else {
        //do nothing
    }
  }
?>
