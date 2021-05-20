<?php
  require_once 'dbh.inc.php';
if (isset($_POST['submit'])) {
  $stmt = mysqli_prepare($conn, "UPDATE submit_info SET Sub_marks = ? WHERE S_ID = ?");
  mysqli_stmt_bind_param($stmt, "si", $gr, $id);
  foreach ($_POST['sh_grade'] as $i => $gr) {
      $id = $_POST['sh_id'][$i];
      mysqli_stmt_execute($stmt);
  }

  header('location: ../teacher_view_submission.php');
}

 ?>
