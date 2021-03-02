<?php
if(isset($_POST['submit']))
{
    session_start();
    $cpwd = $_POST["cpwd"];
    $pwd = $_POST["pwd"];
    $rpwd = $_POST["rpwd"];

  //  $_SESSION["id"] = $_POST["id"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputEditProfile($cpwd, $pwd, $rpwd) !== false) {
        header("location: ../EditProfile.php?error=emptyInputEditProfile");
        exit();
    }

    if (checkCurrentPwd($conn,$_SESSION["id"],$cpwd) !== false) {
        header("location: ../EditProfile.php?error=wrongCurrentPassword");
        exit();
    }


    if (pwdMatch($pwd, $rpwd) !== false) {
        header("location: ../EditProfile.php?error=passwordDoesNotMatch");
        exit();
    }

    updatePassword($conn,$_SESSION["id"],$pwd);

}
else {
      header("location: ../EditProfile.php");
      exit();
  }
