<?php require_once '../Commons/menu_template.php';
      require_once 'includes/functions.inc.php';
      require_once 'includes/fetchSubmissions.inc.php';
?>

<div class="col-sm-9">
        <div class="container">

          <div >

            <div class ="ann_text_section">
                <h4>Add an Assignment</h4>
                <p>A form is a document with spaces in which to write or select, for a series
                  of documents with similar contents. The documents usually have the printed
                  parts in common, except, possibly, for a serial number. Forms, when completed,
                  may be a statement, a request, an order, etc.; a check may be a form.
                </p>
            </div>
            <div>
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
                  echo "<td>" . $row['S_ID'] . "</td>";
                  echo "<td>" . $row['Sub_Date'] . "</td>";
                  echo "<td>" . $row['Sub_link'] . "</td>";
                  echo "<td>" . $row['Sub_marks'] . "</td>";
                echo "</tr>";
                    $count = $count +1;

              }
              echo "</table>";}
              else{
                echo "Nobody has submitted the assignment yet.";
              }
              ?>
            </div>




          </div>
        </div>
      </div>

<?php require_once '../Commons/twitter_template.php' ?>
