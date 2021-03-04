<?php

    function createAnnouncement($conn, $course_id, $title, $desc)
    {
        $sql = "INSERT INTO announcements_info(Course_ID, Class_ID, Ann_title, Ann_desc) values(?,?,?,?);";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../add_ann_template.php?error=stmtfaileduid");
            exit();
        }


        mysqli_stmt_bind_param($stmt, "ssss", $course_id, $_SESSION['Class_ID'], $title, $desc);
        // echo $_SESSION['Class_ID'];
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);  
        $url = "../add_ann_template.php?Course_ID=".$course_id."&title=".$title;
        header('location:'.$url); 
    }

    function deleteAnnouncement($conn,$ann_id)
    {
        $sql = "DELETE FROM announcements_info where Ann_ID=?;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../add_ann_template.php?error=stmtfaileduid");
            exit();
        }


        mysqli_stmt_bind_param($stmt, "i", $ann_id);
        // echo $_SESSION['Class_ID'];
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);  
        
    }