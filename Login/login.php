<!DOCTYPE html>
<html>

<head>
	<title>
		Login Page
	</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Asul&family=Didact+Gothic&family=Lato:wght@300&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/ab606e87e4.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="login_style.css">
</head>

<body>
	<div class="container-fluid row ">
		<div class="col-6">
			<div class="green">
				<h1><a href="#">BV Classroom
					</a>
				</h1>
			</div>
		</div>
		<div class="col-6 ">
			<div class="in">
				<button type="button" class="btn btn-light">
					<a href="create_account.php">
						Create Account
					</a>
				</button>
			</div>


		</div>
	</div>



	<div class="container-fluid blue row">
		<div class="col-lg-6 col-md-12 ">
			<div class="LoginForm">
				<h3>Log In To Your Account</h3>
				<form action="includes/login.inc.php" method="post">
					<div class="error"><?php if (isset($_GET["error"])) {
											if ($_GET["error"] == "emptyInputLogin")
												echo "<p>Please fill all the fields</p>";
										}
										?>
					</div>
					<h6>Enter your College/Email Id</h6>
					<input type="text" name="id">
					<div class="error"><?php if (isset($_GET["error"])) {

											if ($_GET["error"] == "usernotfound")
												echo "<p>User Not Found</p>";
										}
										?>
					</div>
					<br>
					<h6>You are a Teacher/Student</h6>
					<select id="" name="type">
						<option value="F">Teacher</option>
						<option value="S">Student</option>
					</select>
					<br>
					<h6>Enter your Password</h6>
					<input type="password" name="pwd">
					<div class="error"><?php if (isset($_GET["error"])) {

											if ($_GET["error"] == "wrongPassword")
												echo "<p>Incorrect Password</p>";
										}
										?>
					</div>
					<br>
					<button type="submit" name="submit" href="#">
						LOGIN
					</button>
				</form>
				<br>
				<br>
				<!--	<p>
					<a href="#">Forgot Password?</a>
				</p>-->
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="side">
				<p>TAKE YOUR CLASSROOM
					EVERYWHERE....
				</p>
				<div><img src="login_img.png">
				</div>
			</div>

		</div>
	</div>

	<!-- <div class="footer">
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
									</div> -->
</body>

</html>