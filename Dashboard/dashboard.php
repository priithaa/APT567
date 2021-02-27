<?php session_start();
// echo $_SESSION["type"];
if (!isset($_SESSION["id"]))
	header("location: ../Login/login.php");

require_once 'includes/dbh.inc.php';

if ($_SESSION["type"] === "F")
	echo "hi";
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
			<div class="col-3"><img src="ProfilePicture.png">
			</div>
			<div class="col-4">
				<?php
				if (isset($_SESSION["id"])) {

					echo "<h3> Welcome " . $_SESSION["id"] . "!</h3>";
				}
				?>
				<p> <a class="nav-item nav-link" href="#" style="color: #FFFFFF">Edit Profile
					</a>
					<a class="nav-item nav-link" href="#" style="color: #FFFFFF">To-Do List
					</a>
				</p>
			</div>
			<div class="col-5">

				<a href="../Login/includes/logout.inc.php"> <button type="button" class="btn btn-light">Log Out</button> </a>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-sm-9">
			<div class="classes p-8 m-20">
				<div class="row">
					<?php while($rows = mysqli_fetch_assoc($resultData))   { // $rows;?>
					<div class="col-lg-4 col-md-6">
						<div class="blue-green">
							<h3><a href=""><?php echo $rows["Course_ID"];?> 
								</a>
							</h3>
							<p><?php echo $rows["F_ID"];?> 
							</p>
						</div>
					</div>
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