<?php session_start();
// echo $_SESSION["type"];
if (!isset($_SESSION["id"]))
  header("location: ../Login/login.php");

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

if ($_SESSION["type"] === "F") {
  require_once "includes/faculty_sql.inc.php";
  $row = fetchFacultyInfo($conn, $_SESSION["id"]);
} else if ($_SESSION["type"] === "S") {
  require_once "includes/student_sql.inc.php";
  $row = fetchStudentInfo($conn, $_SESSION["id"]);
}

if (count($_FILES) > 0) {

  $pimage = $_FILES["userImage"]["name"];
  move_uploaded_file($_FILES["userImage"]["tmp_name"], "../../PP_image/" . $_FILES["userImage"]["name"]);

  if ($_SESSION["type"] == "S")
    $sql = "UPDATE student_info set S_pp = ? where S_ID = ?";
  else {
    # code...
    $sql = "UPDATE faculty_info set F_pp = ? where F_ID = ?";
  }
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../dashboard.php?error=stmtfaileduid");
    exit();
  }


  mysqli_stmt_bind_param($stmt, "ss", $pimage, $_SESSION['id']);
  // echo $_SESSION['Class_ID'];
  $result = mysqli_stmt_execute($stmt);
  // echo $result;
  // if ($result!==false)
  // {
  //   echo "yo";
  //   $set = "imageSet";
  // }




  // require_once 'essentials/header.php';
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/style.css">
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="pp">
          <?php $rows = fetchStudentPic($conn, $_SESSION["id"]);
          echo '<img src="../../PP_image/' . htmlentities($rows) . '" width="160" height = "160" />';
          ?>
        </div>

      </div>
      <div class="col-md-10">
        <nav class="navbar navbar-expand-md navbar-dark ">
 
          
            

          <h3 style=" color: white;"> Welcome <br>
            <?php if ($_SESSION["type"] === "F")
 
              echo fetchFacultyName($conn, $_SESSION["id"]);
            else {
              echo fetchStudentName($conn, $_SESSION["id"]);
            } ?>
          </h3>
 
        
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href=""> To-do List </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="dashboard.php"> Dashboard </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Login/includes/logout.inc.php"> Logout</a>
              </li>
            </ul>
          </div> -->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href=""> To-do List </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="dashboard.php"> Dashboard </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../Login/includes/logout.inc.php"> Logout</a>
                </li>
              </ul>
            </div>
 main
        </nav>
      </div>

    </div>

  </div>


  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <div class="row flex-lg-nowrap">
      <div class="EditBody">
        <div class="col">
          <div class="row">
            <div class="col mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="e-profile">
                    <div class="row">
                      <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                        <div class="text-center text-sm-left mb-2 mb-sm-0">

                          <h2 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                            <?php if ($_SESSION["type"] == "F")
                              echo fetchFacultyName($conn, $_SESSION["id"]);
                            else {
                              echo fetchStudentName($conn, $_SESSION["id"]);
                            } ?>
                          </h2>

                          <p class="mb-0">
                            <?php if ($_SESSION["type"] == "F")
                              echo $row['F_email'];
                            else {
                              echo  $row['S_email'];
                            } ?>
                          </p>

                          <div class="mt-2">
                            <br>
                            <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
                              <label>
                                <h3>Change Profile Picture: </h4>
                              </label>
                              <!-- <i class="fa fa-fw fa-camera"></i> -->
                              <br>
                              <input name="userImage" type="file" class="inputFile" />
                              <input type="submit" value="Submit" class="btnSubmit" />
                            </form>
                            <?php if (isset($_GET["update"])) {
                              if ($set === "imageSet")
                                echo "<p class='error'>Photo has been updated successfully</p>";
                              // unset($_GET["update"]);
                            } ?>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="error">
                      <?php if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyInputEditProfile")
                          echo "<p>Please fill all the fields</p>";

                        if ($_GET["error"] == "wrongCurrentPassword")
                          echo "<p>Current Password is not Correct</p>";

                        if ($_GET["error"] == "passwordDoesNotMatch")
                          echo "<p>Both Passwords do not match</p>";

                        if ($_GET["error"] == "updateFailed")
                          echo "<p>Password Update Failed. Please Try Again!</p>";
                      }

                      if (isset($_GET["update"])) {

                        if ($_GET["update"] == "true")
                          echo "<p class='update'>Password has been updated successfully</p>";
                      }
                      ?>
                    </div>
                    <div class="tab-content pt-3">
                      <div class="tab-pane active">
                        <form class="form" action="includes/EditProfile.inc.php" method="post">
                          <div class="row">
                            <div class="col">
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" name="EditProfileName" placeholder="<?php if ($_SESSION["type"] == "F")
                                                                                                                  echo $row['F_name'];
                                                                                                                else {
                                                                                                                  echo  $row['S_name'];
                                                                                                                } ?>" value="<?php if ($_SESSION["type"] == "F")
                                                                                                                                echo $row['F_name'];
                                                                                                                              else {
                                                                                                                                echo  $row['S_name'];
                                                                                                                              } ?>">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="EditProfileUsername" placeholder="<?php if ($_SESSION["type"] == "F")
                                                                                                                      echo $row['F_ID'];
                                                                                                                    else {
                                                                                                                      echo  $row['S_ID'];
                                                                                                                    } ?>" value="<?php if ($_SESSION["type"] == "F")
                                                                                                                                    echo $row['F_ID'];
                                                                                                                                  else {
                                                                                                                                    echo  $row['S_ID'];
                                                                                                                                  } ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="EditProfileEmail" placeholder="<?php if ($_SESSION["type"] == "F")
                                                                                                                    echo $row['F_email'];
                                                                                                                  else {
                                                                                                                    echo  $row['S_email'];
                                                                                                                  } ?>" value="<?php if ($_SESSION["type"] == "F")
                                                                                                                                  echo $row['F_email'];
                                                                                                                                else {
                                                                                                                                  echo  $row['S_email'];
                                                                                                                                } ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-8 mb-3">
                          <br>
                          <div class="mb-2">
                            <h3>Change Password:</h3>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Current Password</label>
                                <input class="form-control" type="password" name="cpwd">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control" type="password" name="pwd">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                <input class="form-control" type="password" name="rpwd">
                              </div>
                            </div>
                          </div>


                        </div>
                      </div>
                      <div class="row">
                        <div class="col d-flex">
                          <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
                        </div>
                      </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>
  </div>

  <footer class="footer">
    <a href="#"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i>
    </a>
    <a href="#"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
    </a>
    <a href="#"><i class="fa fa-phone fa-2x" aria-hidden="true"></i>
    </a>
    <a href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
    </a>
    <p>@Copyright 2021 APT567
    </p>
  </footer>
</body>

</html>