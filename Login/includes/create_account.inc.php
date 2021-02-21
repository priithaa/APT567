<?php

    if(isset($_POST['submit']))
    {
        $name = $_POST["fullName"];
        $sid = $_POST["studentId"];
        $email = $_POST["email"];
        $branch = $_POST["branch"];
        $semester = $_POST["semester"];
        $section = $_POST["section"];
        $pwd = $_POST["Password"];
        $rpwd = $_POST["ConfirmPassword"];

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

    // createUser($conn, $name, $email, $username, $pwd);
} 
else {
    header("location: ../signup.php");
    exit();
}