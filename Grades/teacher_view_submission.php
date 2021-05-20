<?php require_once '../Commons/menu_template.php';
      require_once 'includes/functions.inc.php';
      require_once 'includes/fetchSubmissions.inc.php';
?>

<div class="col-sm-9">
        <div class="container">

          <div >

            <div class ="ann_text_section">
                <h4>Submissions</h4>
                <p>Grades in a tabular format.
                </p>
            </div>
            <div>
              <form action="includes/SubmitGrades.inc.php" method="post">
              <?php if(mysqli_num_rows($resultData) > 0)
                      {echo "<table class='table'>
                            <thead>";
                      echo "<tr>";
                        echo "<th>Row Number</th>";
                        echo "<th>Student ID</th>";
                        echo "<th>Submission Date</th>";
                        echo "<th>Submission Link</th>";
                        echo "<th>Marks</th>";
                        echo "</tr>";
                        echo "</thead>
                              <tbody>";
                        $count = 1;
              ?>
              <?php while($row = mysqli_fetch_assoc($resultData))
              {

                echo "<tr>";
                  echo "<th scope='row'>".$count."</th>";
                  echo "<td>".$row["S_ID"]."<input type='hidden' name='sh_id[]' value=".$row["S_ID"]."></td>";
                  echo "<td>" . $row['Sub_Date'] . "</td>";
                  echo "<td>" . $row['Sub_link'] . "</td>";
                  echo "<td><input type='text' name='sh_grade[]' value=".$row["Sub_marks"]."></td>";
                echo "</tr>";
                    $count = $count +1;

              }
              echo "</table>";
              echo "<button type='submit' name='submit'>Submit</button>";

              
            
            }
              else{
                echo "Nobody has submitted the assignment yet.";
              }
              ?>
          </form>
              
            </div>




          </div>
        </div>
      </div>

<?php require_once '../Commons/twitter_template.php' ?>
