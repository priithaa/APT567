<?php
if(isset($_POST['submit_res']))
{
    session_start();
    $week = $_POST["week"];
    $title = $_POST["title"];
    $desc = $_POST["desc"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';



    createResources($conn, $_SESSION['Course_ID'],$week, $title, $desc);

  }
  else {
      header("location: ../add_ann_template.php");
      exit();
  }
