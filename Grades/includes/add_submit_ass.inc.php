<?php
if(isset($_POST['submit_ass']))
{
session_start();

$desc = $_POST["desc"];


require_once 'dbh.inc.php';
require_once 'functions.inc.php';

submitLinkAssignment($conn, $desc, $_POST["sub_title"]);

// header('Location:../submit_assgn_template.php');

}
else {
header("location: ../submit_assgn_template.php");
exit();
}

