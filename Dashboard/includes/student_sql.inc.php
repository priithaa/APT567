<?php
// Select Course_ID, F_ID from class_course where Class_ID =
// id->class_id->(class_course)->course,F_ID->put teachers'name ;
    $sql = "Select Course_ID, F_ID from class_course where Class_ID =
    (Select Class_ID from student_info where S_ID = ?);";
    $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);


    // while($rows = mysqli_fetch_assoc($resultData))    // $rows;
    // {
    // echo $rows["Course_ID"] . $rows["F_ID"];
    // }
    
        