<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    deleteAnnouncement($conn, $_GET['Res_ID']);
    header('location: ../teacher_template.php');
?>
