
<?php


 function fetchCourseName($conn,$Course_ID)
 {
     $sql = "SELECT Course_name from course_info where Course_ID = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $Course_ID);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);

    return $rows["Course_name"];

 }


function fetchFacultyName($conn, $F_ID)
{
    $sql = "SELECT F_name from faculty_info where F_ID = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $F_ID);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);

    return $rows["F_name"];
}

function fetchStudentName($conn, $S_ID)
{
    $sql = "SELECT S_name from student_info where S_ID = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $S_ID);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);

    return $rows["S_name"];
}

function fetchClassInfo($conn, $Class_ID)
{
    $sql = "SELECT * from class_info where Class_ID = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $Class_ID);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);

    return $rows;
}


function fetchStudentPic($conn,$sid)
{
    if($_SESSION['type']=="S")
    {
        $sql = "SELECT S_pp FROM student_info WHERE S_ID= ? ;";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../dashboard.php?error=stmtfaileduid");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $sid);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_assoc($resultData);
        // header("Content-type: " . $rows["imageType"]);
        // echo $rows["imageData"];
        mysqli_stmt_close($stmt);
        // $result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
        return $rows["S_pp"];
    }
    else {
        # code...
        $sql = "SELECT F_pp FROM faculty_info WHERE F_ID= ? ;";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../dashboard.php?error=stmtfaileduid");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $sid);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_assoc($resultData);
        // header("Content-type: " . $rows["imageType"]);
        // echo $rows["imageData"];
        mysqli_stmt_close($stmt);
        // $result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
        return $rows["F_pp"];
    }
    
}

function fetchStudentInfo($conn, $sid)
{
    $sql = "SELECT * from student_info where S_ID = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $sid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);

    return $rows;
}

function fetchFacultyInfo($conn, $fid)
{
    $sql = "SELECT * from faculty_info where F_ID = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $fid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);

    return $rows;
}


function emptyInputEditProfile($cpwd,$pwd,$rpwd)
{
    if ( empty($cpwd) || empty($pwd) || empty($rpwd))
        return true;
    return false;
}

function checkCurrentPwd($conn,$id,$cpwd)
{
  $sql = "SELECT Login_password from login_info where Login_ID = ?;";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../EditProfile.php?error=stmtfaileduid");
      exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $id);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  $rows = mysqli_fetch_assoc($resultData);
  mysqli_stmt_close($stmt);
  if($rows['Login_password']!==$cpwd)
  return true;

  return false;
}

function pwdMatch($pwd, $rpwd)
{
    if ($pwd !== $rpwd)
        return true;
    return false;
}

function updatePassword($conn,$id,$pwd)
{
  $sql = "UPDATE login_info SET Login_password = ? where Login_ID = ?;";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../EditProfile.php?error=stmtfaileduid");
      exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $pwd,$id);
  $status = mysqli_stmt_execute($stmt);

  /*echo $status;*/ /* status returns the number of rows affected*/

 if($status==false) /*to check the execution of status check for false*/
 header("location: ../EditProfile.php?error=updateFailed");

 header("location: ../EditProfile.php?update=true");

}
