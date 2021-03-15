<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    deleteAssignment($conn, $_GET['Ass_ID']);
    header('location: ../teacher_template.php');
?>
