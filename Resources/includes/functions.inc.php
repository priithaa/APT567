<?php

    function createResources($conn, $course_id,$week, $title, $desc)
    {
        $sql = "INSERT INTO resources_info(Course_ID, Class_ID, Res_week,Res_title, Res_desc) values(?,?,?,?,?);";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../add_res_template.php?error=stmtfaileduid");
            exit();
        }


        mysqli_stmt_bind_param($stmt, "sssss", $course_id, $_SESSION['Class_ID'],$week, $title, $desc);
        // echo $_SESSION['Class_ID'];
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $url = "../add_res_template.php?title=".$title;
        header('location:'.$url);
    }

    function printResources($conn,$week)
    {
      echo '<div class="faq-singular" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">';
      echo   '<h2 class="faq-question" itemprop="name">'.'Week '.$week.'</h2>';
      echo      '<div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">';
      $sql = "SELECT * from resources_info where Res_week = ?;";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("location: ../add_res_template.php?error=stmtfaileduid");
          exit();
      }


      mysqli_stmt_bind_param($stmt, "i", $week);
      // echo $_SESSION['Class_ID'];
      mysqli_stmt_execute($stmt);
      $resultData = mysqli_stmt_get_result($stmt);

      mysqli_stmt_close($stmt);
      while($row = mysqli_fetch_assoc($resultData))
      {
        
        echo '<div itemprop="">
          <div class="whitebox">
              <div class ="contentbox">
                <div class="row Ann_head">
                  <div class="col sm Ann_title">
                    <h5>
                        <a href="">'.$row["Res_title"].'</a>
                    </h5>
                  </div>
                <div class="col sm Ann-date">
                    <h6>'.$row["Res_date"].'</h6>
                </div>

            </div>
            <div class="row Ann_desc">'.
                $row["Res_desc"]
            .'</div>';
            if($_SESSION['type']==='F')
            {echo '<div class="row Ann_delete">
              <a href="includes/redirect_delete.inc.php?Res_ID='.$row["Res_ID"].'">
            <button>Delete</button>
          </a>
        </div>';}
          echo  '</div>
         </div>
       </div>';


      }



      echo'     </div>
         </div>';
    }


    function deleteAnnouncement($conn,$res_id)
    {
        $sql = "DELETE FROM resources_info where Res_ID=?;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../add_ann_template.php?error=stmtfaileduid");
            exit();
        }


        mysqli_stmt_bind_param($stmt, "i", $res_id);
        // echo $_SESSION['Class_ID'];
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }
