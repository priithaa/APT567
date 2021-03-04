<?php
session_start(); 
$_SESSION['Class_ID']=$_GET['Class_ID'];
// echo $_SESSION['Class_ID'];
header('location: ../../Overview/Overview_template.php?Course_ID='.$_GET["Course_ID"]);
?>