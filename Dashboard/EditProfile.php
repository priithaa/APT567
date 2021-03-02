<?php session_start();
// echo $_SESSION["type"];
if (!isset($_SESSION["id"]))
	header("location: ../Login/login.php");

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

if ($_SESSION["type"] === "F")
	{require_once "includes/faculty_sql.inc.php"; $row = fetchFacultyInfo($conn, $_SESSION["id"]);}
else if ($_SESSION["type"] === "S")
	{require_once "includes/student_sql.inc.php"; $row = fetchStudentInfo($conn, $_SESSION["id"]);}

 //if (count($_FILES) > 0)
  //   {
  //      if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {


  //      $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
  //      $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

  //      if ($_SESSION["type"] === "S")
    //    {$sql = "UPDATE student_info SET S_pp_type = '$imageProperties['mime']', S_pp = '$imgData' where S_ID = '$_SESSION['id']''";

    //    }
      //  if ($_SESSION["type"] === "F")
        //$sql = 'UPDATE faculty_info SET F_pp_type = $imageProperties["mime"], F_pp  = $imgData where F_ID = $_SESSION["id"]';


      //  $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
        //if (isset($current_id)) {
          //$_GET["update"]="imageSet";
        //}
    //}
//}
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
      <?php $rows = fetchStudentPic($conn, $_SESSION["id"]);
      if(!empty($rows['S_pp']))
      echo '<img src="data:image/jpeg;base64,' . base64_encode($rows['S_pp']) . '" width="200	" height = "200" />';
      else {
        echo
        '<img src="ProfilePicture.png">';
      }?>

    </div>
    <div class="col-md-10">
      <nav class="navbar navbar-expand-md navbar-dark ">
        <h3> <?php if($_SESSION["type"]=="F")
          echo "Welcome ".fetchFacultyName($conn,$_SESSION["id"]);
          else {
              # code...
              echo "Welcome " . fetchStudentName($conn, $_SESSION["id"]);
          }?>

        </h3>
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
            </li
            <li class="nav-item">
              <a class="nav-link" href="../Login/includes/logout.inc.php"> Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

  </div>

</div>


  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row flex-lg-nowrap">
<div class = "EditBody">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <!-- <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                    </div>
                  </div>
                </div> -->
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">

                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php if($_SESSION["type"]=="F")
                      echo fetchFacultyName($conn,$_SESSION["id"]);
                      else {
                          # code...
                          echo fetchStudentName($conn, $_SESSION["id"]);
                      }?></h4>
                    <p class="mb-0"><?php if($_SESSION["type"]=="F")
                      echo $row['F_email'];
                      else {
                          # code...
                          echo  $row['S_email'];
                      }?></p>
                    <div class="mt-2">
                      <!-- <button class="btn btn-primary" type="button">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </button> -->
                         <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
                            <i class="fa fa-fw fa-camera"></i>
                            <label>Change Photo:</label>
                            <br />
                            <input name="userImage" type="file" class="inputFile" />
                            <input type="submit" value="Submit" class="btnSubmit" />
                        </form>

                      <?php if (isset($_GET["update"])) {

                          if ($_GET["update"] == "imageSet")
                            echo "<p class='update'>Photo has been updated successfully</p>";
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
                              <input class="form-control" type="text" name="EditProfileName" placeholder="<?php if($_SESSION["type"]=="F")
                                echo $row['F_name'];
                                else {
                                    echo  $row['S_name'];
                                }?>" value="<?php if($_SESSION["type"]=="F")
                                  echo $row['F_name'];
                                  else {
                                      echo  $row['S_name'];
                                  } ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" type="text" name="EditProfileUsername" placeholder="<?php if($_SESSION["type"]=="F")
                                echo $row['F_ID'];
                                else {
                                    echo  $row['S_ID'];
                                }?>" value="<?php if($_SESSION["type"]=="F")
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
                              <input class="form-control" type="text" name="EditProfileEmail" placeholder="<?php if($_SESSION["type"]=="F")
                                echo $row['F_email'];
                                else {
                                    echo  $row['S_email'];
                                } ?>" value="<?php if($_SESSION["type"]=="F")
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
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
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
                              <input class="form-control" type="password" name="rpwd"></div>
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
