<?php session_start();
// echo $_SESSION["type"];
if (!isset($_SESSION["id"]))
	header("location: ../Login/login.php");

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';


if (isset($_SESSION["Course_ID"]))
	unset($_SESSION["Course_ID"]);

if ($_SESSION["type"] === "F") {
	require_once "includes/faculty_sql.inc.php";
	if (isset($_SESSION["Class_ID"]))
		unset($_SESSION["Class_ID"]);
} else if ($_SESSION["type"] === "S")
	require_once "includes/student_sql.inc.php";

// echo $_SESSION['Class_ID'];

require_once 'essentials/header.php';
?>


<div class="row">
	<div class="col-sm-9">
		<div class="classes p-8 m-20">
			<div class="row">
				<?php if ($_SESSION["type"] === "S") { ?>
					<?php while ($rows = mysqli_fetch_assoc($resultData)) { // $rows;
					?>
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="blue-green">

								<h3><a href="includes/redirect.inc.php?Course_ID=<?php echo $rows["Course_ID"]; ?>">
										<?php echo fetchCourseName($conn, $rows["Course_ID"]); ?>

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

								<h3><a href="includes/redirect.inc.php?Course_ID=<?php echo $rows["Course_ID"]; ?>&Class_ID=<?php echo $rows["Class_ID"]; ?>">
										<?php echo fetchCourseName($conn, $rows["Course_ID"]); ?>

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