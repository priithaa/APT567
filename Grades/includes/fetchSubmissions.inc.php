<?php
    if($_SESSION['type']==='F')
    {
        // Select Course_ID, Class_ID(FUNCTION) -> Ann_ID order by date;
        $sql = "SELECT * from submit_info where Ass_ID=?;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../teacher_template.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $_SESSION['Ass_ID']);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
    }


    if($_SESSION['type']==='S')
    {
        // Select Course_ID, Class_ID(FUNCTION) -> Ann_ID order by date;
        $sql = "SELECT * from submit_info where Ass_ID=? and S_ID=?;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../student_template.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "is", $_SESSION['Ass_ID'] , $_SESSION['id']);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
    }
