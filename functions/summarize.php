<?php
  function summarize($para){
    $full_para = str_split($para);

    $summary = '';

    for ($i=0; $i < 68 ; $i++) {
      $summary = $summary . $full_para[$i] . '';
    }

    echo $summary . '...';
  }
?>
