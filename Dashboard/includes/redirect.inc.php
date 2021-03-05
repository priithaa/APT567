<?php
    session_start(); 
    if($_SESSION['type']==='F')
        $_SESSION['Class_ID']=$_GET['Class_ID'];
    $_SESSION['Course_ID']=$_GET['Course_ID'];
    // echo $_SESSION['Class_ID'];
    header('location: ../../Overview/Overview_template.php');
