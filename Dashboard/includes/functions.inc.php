
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
    $sql = "SELECT S_pp_type , S_pp FROM student_info WHERE S_ID= ? ;" ;

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
    return $rows;
}