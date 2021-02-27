<?php

if(isset($_POST['submit']))
{
    session_start();
    $name = $_POST["fullName"];
    $sid = $_POST["studentId"];
    $email = $_POST["email"];
    $branch = $_POST["branch"];
    $semester = $_POST["semester"];
    $section = $_POST["section"];
    $pwd = $_POST["Password"];
    $rpwd = $_POST["ConfirmPassword"];

    $_SESSION["fullName"] = $_POST["fullName"];
    $_SESSION["studentId"] = $_POST["studentId"];
    $_SESSION["email"] = $_POST["email"];





    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputSignup($name, $sid, $email, $pwd, $rpwd) !== false) {
        header("location: ../create_account.php?error=emptyInputSignup");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../create_account.php?error=invalidName");
        exit();
    }

    if(invalidStudentID($sid)!==false)
    {
        header("location: ../create_account.php?error=invalidStudentID");
        exit();
    }


    if (invalidEmail($email) !== false) {
        header("location: ../create_account.php?error=invalidEmail");
        exit();
    }

    if (checkBanasthaliEmail($email) !== false) {
        header("location: ../create_account.php?error=checkBanasthaliEmail");
        exit();
    }


    if (pwdMatch($pwd, $rpwd) !== false) {
        header("location: ../create_account.php?error=pwdMatch");
        exit();
    }

    if (uidExists($conn, $sid, $email) !== false) {
        header("location: ../create_account.php?error=uidExists");
        exit();
    }

    createUser($conn, $name, $sid, $email, $branch, $semester, $section, $pwd);
}
else {
    header("location: ../signup.php");
    exit();
}
