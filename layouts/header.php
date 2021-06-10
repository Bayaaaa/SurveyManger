<!DOCTYPE html>
<html lang="en">
<head>
  <title>Survey Manager</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- include lang file -->
  <?php
    if(isset($_SESSION['lang'])){
        if($_SESSION['lang'] == 'ar'){
          include "../lang/ar.php";
          echo '<link rel="stylesheet" href="../' . $css . 'bootstrap-ar.css">';
        } else {
          include "../lang/en.php";
          echo '<link rel="stylesheet" href="../' . $css . 'bootstrap-en.css">';
        }
    } else {
          include "../lang/en.php";
          echo '<link rel="stylesheet" href="../' . $css . 'bootstrap-en.css">';
    }
  ?>
  
  <!-- Include Bootstrap Library -->
  <script src="<?php echo "../" . $js . 'jquery.js'; ?>"></script>
  <script src="<?php echo "../" . $js . 'bootstrap.js'; ?>"></script>


  <!-- include fontawesome lib -->
  <link rel="stylesheet" href="<?php echo "../" . $css . 'font-awesome.min.css'; ?>">
  
  <!-- include Custom Style -->
  <link rel="stylesheet" type="text/css" href="<?php echo "../" . $css . 'style.css'; ?>">

</head>
<body>