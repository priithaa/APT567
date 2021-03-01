<?php session_start();
// echo $_SESSION["type"];
if (!isset($_SESSION["id"]))
	header("location: ../Login/login.php");

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

if ($_SESSION["type"] === "F")
	require_once "includes/faculty_sql.inc.php";
else if ($_SESSION["type"] === "S")
	require_once "includes/student_sql.inc.php";

?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Dashboard
	</title>
	<script src="https://kit.fontawesome.com/ab606e87e4.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/style.css">
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
								<a class="nav-link " href=""> Edit Profile </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../Login/includes/logout.inc.php"> Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>

		</div>

	</div>
	<div class="row">
		<div class="col-sm-9">
			<div class="classes p-8 m-20">
				<div class="row">
					<?php if ($_SESSION["type"] === "S") { ?>
						<?php while ($rows = mysqli_fetch_assoc($resultData)) { // $rows;
						?>
							<div class="col-lg-4 col-md-6">
								<div class="blue-green">
									<h3><a href="../Overview/Overview_template.php?Course_ID=<?php echo $rows["Course_ID"];?>"><?php echo fetchCourseName($conn, $rows["Course_ID"]); ?>
										</a>
									</h3>
									<p><?php echo fetchFacultyName($conn, $rows["F_ID"]); ?>
									</p>
								</div>
							</div>
						<?php }  ?>
						<?php mysqli_stmt_close($stmt); ?>
					<?php } ?>

					<?php if ($_SESSION["type"] === "F") { ?>
						<?php while ($rows = mysqli_fetch_assoc($resultData)) { // $rows;
						?>
							<div class="col-lg-4 col-md-6">
								<div class="blue-green">
									<h3><a href="../Overview/Overview_template.php?Course_ID=<?php echo $rows["Course_ID"];?>"><?php echo fetchCourseName($conn, $rows["Course_ID"]); ?>
										</a>
									</h3>
									<?php $rows = fetchClassInfo($conn, $rows["Class_ID"]); ?>
									<p><?php echo "B.Tech " . $rows["Branch"] . ", " . "Sem: " . $rows["Semester"] . ", Section: " . $rows["Section"]; ?> </p>
								</div>
							</div>
						<?php }  ?>
						<?php mysqli_stmt_close($stmt); ?>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-sm-3" style="background-color: #ffff;">
			<a class="twitter-timeline" data-width="400" data-height="750" data-theme="light" href="https://twitter.com/Banasthali_Vid?ref_src=twsrc%5Etfw"> Tweets by Banasthali_Vid
			</a>

			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
			</script>

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
