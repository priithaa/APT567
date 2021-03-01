<?php
function fetchCourseInfo($conn,$Course_ID)
{
    $sql = "SELECT * from course_info where Course_ID = ?;";

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

   return $rows;

}
