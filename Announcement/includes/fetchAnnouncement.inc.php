<?php
// Select Course_ID, Class_ID(FUNCTION) -> Ann_ID order by date;
    $sql = "Select * from announcements_info where Course_ID=? and Class_ID = ? order by Ann_date DESC;";
    
    $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $_SESSION['Course_ID'], $_SESSION["Class_ID"]);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);


    // while($rows = mysqli_fetch_assoc($resultData))    // $rows;
    // {
    // echo $rows["Course_ID"] . $rows["F_ID"];
    // }