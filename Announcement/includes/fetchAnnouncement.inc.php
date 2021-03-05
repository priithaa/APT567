<?php
    if($_SESSION['type']==='F')
    {
        // Select Course_ID, Class_ID(FUNCTION) -> Ann_ID order by date;
        $sql = "SELECT * from announcements_info where Course_ID=? and Class_ID = ? order by Ann_date DESC;";
    
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['Course_ID'], $_SESSION["Class_ID"]);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
    }
    if($_SESSION['type']==='S')
    {
        // Select Course_ID, Class_ID(FUNCTION) -> Ann_ID order by date;

        $sql = "SELECT Class_ID from student_info where S_ID= ?;";
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_assoc($resultData);
        $classID= $rows["Class_ID"];
        mysqli_stmt_close($stmt);

        
        
        $sql = "SELECT * from announcements_info where Course_ID=? and Class_ID = ? order by Ann_date DESC;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['Course_ID'], $classID );
        mysqli_stmt_execute($stmt);

       

        $resultData = mysqli_stmt_get_result($stmt);

        // echo $resultData;
    }

