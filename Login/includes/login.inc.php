<?php
if(isset($_POST['submit']))
{
    session_start();
    $id = $_POST["id"];
    $type = $_POST["type"];
    $pwd = $_POST["pwd"];

  //  $_SESSION["id"] = $_POST["id"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';



    if (emptyInputLogin($id, $pwd) !== false) {
        header("location: ../login.php?error=emptyInputLogin");
        exit();
    }

    /*if(invalidEmail($email) === false){
        //email is valid
        echo "Email valid";
        if(checkBanasthaliEmail($email) !==false)
        {
          header("location: ../login.php?error=checkBanasthaliEmail");
          exit();
        }


    }
    else if (invalidStudentID($sid) !==false){
      //student id is not valid
      header("location: ../login.php?error=invalidStudentID");
      exit();
    }
    else if(invalidStudentID($sid) !==false && invalidEmail($email) !== false){
      header("location: ../login.php?error=invalidStudent");
      exit();
    }*/


    loginUser($conn, $id, $pwd, $type);

  }
  else {
      header("location: ../Login/login.php");
      exit();
  }
