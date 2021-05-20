<?php
function qpType($conn)
{
  $sql = "SELECT * from question_paper_type;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../add_res_template.php?error=stmtfaileduid");
      exit();
  }

  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);

  while($row = mysqli_fetch_assoc($resultData))
  {
    echo '<option value='.$row['QP_ID'].'>'.$row['QP_name'].'</option>';


  }

  mysqli_stmt_close($stmt);

}

function createAssignment($conn, $course_id,$qpid,$due_date, $title, $desc)
{
  echo "hi";
    $sql = "INSERT INTO question_paper_info( Class_ID,Course_ID,QP_ID,QP_link,QP_due_date,QP_title) values(?,?,?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add_assgn_template.php?error=stmtfaileduid");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssssss",  $_SESSION['Class_ID'],$course_id,$qpid, $desc,$due_date,$title);
    // echo $_SESSION['Class_ID'];
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $url = "../add_assgn_template.php?title=".$title;
    header('location:'.$url);
}
function fetchqpName($conn,$qpid)
{



  $sql = "SELECT * from question_paper_type where QP_ID=? ;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../add_res_template.php?error=stmtfaileduid");
      exit();
  }

  mysqli_stmt_bind_param($stmt, "s",$qpid);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);

  $row = mysqli_fetch_assoc($resultData);

  return $row;

}
function printAssignment($conn,$qpid)
{
  if($_SESSION["type"]==='S')
  {
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
  $classID= $rows['Class_ID'];
  mysqli_stmt_close($stmt);
  }

  $rows = fetchqpName($conn,$qpid);
  echo '<div class="faq-singular" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">';
  echo   '<h2 class="faq-question" itemprop="name">'.$rows["QP_name"].'</h2>';
  echo      '<div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">';

  $sql = "SELECT * from question_paper_info where QP_ID = ? and Class_ID=? and Course_ID=? ;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../add_res_template.php?error=stmtfaileduid");
      exit();
  }

  if($_SESSION['type']==='F')
  mysqli_stmt_bind_param($stmt, "iss", $qpid,$_SESSION['Class_ID'],$_SESSION['Course_ID']);

  if($_SESSION['type']==='S')
  mysqli_stmt_bind_param($stmt, "iss", $qpid,$classID,$_SESSION['Course_ID']);
  // echo $_SESSION['Class_ID'];
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);

  mysqli_stmt_close($stmt);
  while($row = mysqli_fetch_assoc($resultData))
  {
    // echo $row["Ass_ID"];
    echo '<div itemprop="">
      <div class="whitebox">
          <div class ="contentbox">
            <div class="row Ann_head">
              <div class="col sm Ann_title">
                <h5>
                    <a href="">'.$row["QP_title"].'</a>
                </h5>
              </div>
            <div class="col sm Ann-date">
                <h6> Due date: '.$row["QP_due_date"].'</h6>
            </div>
            <div class="col sm Ann-date">
                <h6> Max marks: '.$rows["QP_max_marks"].'</h6>
            </div>

        </div>
        <div class="row Ann_desc">'.
            $row["QP_link"]
        .'</div>';
        if($_SESSION['type']==='F')
        {echo '<div class="row Ann_delete">
          <div>
          <a href="../Grades/includes/redirect_view_submission.inc.php?Ass_ID='.$row["Ass_ID"].'">
          <button class="Submission">View Submission</button>
          </a>
          <a href="includes/redirect_delete.inc.php?Ass_ID='.$row["Ass_ID"].'">
            <button>Delete</button>
          </a>
          </div>
    </div>';} //add function here which will check if the given sid and ass_id already exists in submit_info then disable submit button
    if ($_SESSION['type'] === 'S')
    {
      $check = checkSubmission($conn,$row["Ass_ID"]);
      if($check === null)
      {
        echo '<div class="row Ann_delete">
          <div>
          <a href="../Grades/includes/redirect_view_submission.inc.php?Ass_ID='.$row["Ass_ID"].'">
          <button class="Submission">View Submission</button>
          </a>
          <a href="includes/redirect_submit.inc.php?Ass_ID='.$row["Ass_ID"].'">
            <button>Submit</button>
          </a>
          </div>
         </div>';
      }
      else
      {
        echo '<div class="row Ann_delete">
            <span>Submitted on '.$check['Sub_Date'].'</span>
            <div>
          <a href="../Grades/includes/redirect_view_submission.inc.php?Ass_ID='.$row["Ass_ID"].'">
          <button class="Submission">View Submission</button>
          </a>
             <button class="btn btn-secondary" disabled>Submit</button>
             </div>
         </div>';
      }
//class="btn btn-secondary btn-lg"

    }
      echo  '</div>
     </div>
   </div>';


  }



  echo'     </div>
     </div>';
}


function deleteAssignment($conn,$ass_id)
{
    $sql = "DELETE FROM question_paper_info where Ass_ID=?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add_assgn_template.php?error=stmtfaileduid");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "i", $ass_id);
    // echo $_SESSION['Class_ID'];
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}

function getAssignmentDetails($conn, $ass_id)
{
  $sql = "Select * from question_paper_info where Ass_ID=?;";

  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../submit_assgn_template.php?error=stmtfaileduid");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "i", $ass_id);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);
  $row = mysqli_fetch_assoc($resultData);
  return $row;
}

function submitLinkAssignment($conn, $link, $title)
{
  $sql = "Insert into submit_info(S_ID, Ass_ID,Sub_link) values (?,?,?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../submit_assgn_template.php?error=stmtfaileduid");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "sis", $_SESSION["id"], $_SESSION["Ass_ID"],$link);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  $url = "../student_template.php?title=" . $title;
  header('location:' . $url);

}

function checkSubmission($conn,$ass_id)
{
  $sql = "Select * from submit_info where S_ID = ? and Ass_ID = ?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../submit_assgn_template.php?error=stmtfaileduid");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "si", $_SESSION["id"], $ass_id);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);
  if (isset($resultData))
  { $row = mysqli_fetch_assoc($resultData);
    return $row;

  }
  return false;
}
