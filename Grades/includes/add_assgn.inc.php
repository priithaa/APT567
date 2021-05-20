<?php
if(isset($_POST['submit_assgn']))
{
    session_start();
    $qpid = $_POST["question_paper_type"];
    $title = $_POST["title"];
    $due_date = $_POST["due_date"];
    $desc = $_POST["desc"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';



    createAssignment($conn, $_SESSION['Course_ID'],$qpid,$due_date,$title, $desc);

  }
  else {
      header("location: ../add_assgn_template.php");
      exit();
  }
