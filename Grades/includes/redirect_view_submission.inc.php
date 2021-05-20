<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    session_start();
    $_SESSION['Ass_ID'] = $_GET['Ass_ID'];

    if($_SESSION['type']==='F')
        header('location: ../teacher_view_submission.php');
    else
        header('location: ../student_view_submission.php');



    // ass_id-> form insert link-> submit
