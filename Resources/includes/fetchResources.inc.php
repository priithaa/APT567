<?php
    if($_SESSION['type']==='F')
    {
        // Select Course_ID, Class_ID(FUNCTION) -> Ann_ID order by date;
        $sql = "SELECT distinct Res_week from resources_info where Course_ID=? and Class_ID = ? order by Res_week;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../teacher_template.php?error=stmtfaileduid");
        exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['Course_ID'], $_SESSION["Class_ID"]);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);


        /*$current_week = null;
            while ($row = mysqli_fetch_assoc($resultData)) {
              if ($row["Res_week"] != $current_week) {
                $current_week = $row["Res_week"];
                echo "Category #{$current_cat}\n";
              }
              echo $row["productName"] . "\n";
            }*/
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



        $sql = "SELECT distinct Res_week from resources_info where Course_ID=? and Class_ID = ? order by Res_week;";

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
