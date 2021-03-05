<?php
if(isset($_POST['submit_ann']))
{
    session_start();
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';



    createAnnouncement($conn, $_SESSION['Course_ID'], $title, $desc);

  }
  else {
      header("location: ../add_ann_template.php");
      exit();
  }
