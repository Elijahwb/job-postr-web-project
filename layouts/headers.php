<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="veiwport" content="with=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <?php //check if its an error page then link the needed css file
    if($type == 'error-page') {?>

      <link rel="stylesheet" href="../css/master.css">

      <link rel="stylesheet" href=<?php echo '../css/'.$extracss.'.css'; ?> >

  <?php } else {?><!--If it's not an error page then do the following-->

      <link rel="stylesheet" href="css/master.css">

      <?php
        if($title == 'Job Postr Homepage') {  $extracss = null;} else {?>

        <link rel="stylesheet" href=<?php echo 'css/'.$extracss.'.css'; ?> >
  <?php }
    }//end of the else
  ?>

  <title>
    <?php echo $title?>
  </title>
</head>

<body id="body">
