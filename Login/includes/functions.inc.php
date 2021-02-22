
<?php


function emptyInputSignup($name,$sid,$email,$pwd,$rpwd)
{
    if (empty($name) || empty($sid) || empty($email) || empty($pwd) || empty($rpwd))
        return true;
    return false;
}


function invalidName($name)
{
    if (!preg_match("/^[a-zA-Z]+(\s[a-zA-Z]+)?$/", $name))
        return true;
    return false;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        return true;
    return false;
}

function invalidStudentID($sid)
{
    if(strlen($sid)!=10)
        return true;
    return false;
}

function checkBanasthaliEmail($email)
{
    $word = "@banasthali.in";
    if(strpos($email,$word)==false)
        return true;
    return false;
}

function pwdMatch($pwd, $rpwd)
{
    if ($pwd !== $rpwd)
        return true;
    return false;
}


function uidExists($conn, $sid, $email)
{
    $sql = "SELECT * FROM student_info  WHERE S_ID = ? OR S_email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfaileduid");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ss", $sid, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);


    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    mysqli_stmt_close($stmt);
    return false;
}



function createUser($conn, $name,$sid,$email,$branch,$semester,$section,$pwd)
{
    // Code snippets for class id fetching.
    $sql = "SELECT Class_ID FROM class_info  WHERE Semester = ? AND Branch = ? AND Section = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfaileduid");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sss", $semester, $branch,$section);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);


    $row = mysqli_fetch_assoc($resultData);

    $class_id = $row["Class_ID"];
    mysqli_stmt_close($stmt);
    // Fetched the corresponding class id using prepared sql statements.
    
    $type = "S";
    // Detremining which user the login table has.
    $sql = "INSERT INTO student_info VALUES (?,?,?,?);";
    $sql_login = "INSERT INTO login_info values(?,?,?,?);";

    // for filling info in login table.
    $stmt1 = mysqli_stmt_init($conn);
    $stmt_login = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql)) {
        header("location: ../signup.php?error=stmtfailedfinal");
        exit();
    }

    if (!mysqli_stmt_prepare($stmt_login, $sql_login)) {
        header("location: ../signup.php?error=stmtfailedfinal");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    // protects the password

    mysqli_stmt_bind_param($stmt1, "ssss", $sid, $name, $email, $class_id);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);

    mysqli_stmt_bind_param($stmt_login, "ssss",$sid,$email,$hashedPwd,$type);
    mysqli_stmt_execute($stmt_login);
    mysqli_stmt_close($stmt_login);


    header("location: ../create_account.php?error=none");
    exit();
}


function emptyInputLogin($username, $pwd)
{

    if (empty($username) || empty($pwd))
        return true;
    return false;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);

    // two parameter of the same type coz we always check with either username and email also the script has an OR.
    if ($uidExists === false) {
        header("location:../login.php?error=usernotfound");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];

    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location:../login.php?error=usernotfound");
        exit();
    } elseif ($checkPwd === true) {
        session_start();
        $_SESSION["usersid"] = $uidExists["usersID"];
        $_SESSION["usersuid"] = $uidExists["usersUid"];

        header("location: ../index.php");

        exit();
    }
}
