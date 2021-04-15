<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    session_start();
    $_SESSION['Ass_ID'] = $_GET['Ass_ID'];

    header('location: ../submit_assgn_template.php');



    // ass_id-> form insert link-> submit