<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Asul&family=Didact+Gothic&family=Lato:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ab606e87e4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="login_style.css">
</head>

<body>

    <div class="container-fluid row">

        <div class="col-6">
            <div class="green">
                <h1><a href="login.php">APT567
                    </a>
                </h1>
            </div>
        </div>

        <!-- <div class="col-6">
                <a href="ftr.html">
                    <button type="button" class="btn btn-light" > Create Account
                    </button>
                </a>
            </div> -->
    </div>

    <div class="createblue">

        <div class="CreateAccountForm">

            <h3>Create Your Account</h3>
            <form action="" method="POST">
                <h6>Enter your Name</h6>
                <input type="text" name="fullName">
                <br>
                <h6>Enter your Student ID</h6>
                <input type="text" name="studentId">
                <br>
                <h6>Enter your Email Id</h6>
                <input type="email" name="Username">
                <br>
                <h6>Enter your Degree</h6>
                <input type="text" name="degree">
                <br>
                <h6>Enter your Branch</h6>
                <select id="" name="branch">
                    <option value="CS">CS</option>
                </select>
                <br>
                <h6>Enter your Semester</h6>
                <!-- <input type="text" name="semester"> -->
                <select id="" name="semester">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
                <br>
                <h6>Enter your Section</h6>
                <!-- <input type="text" name="semester"> -->
                <select id="" name="semester">
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
                <br>
                <h6>Enter your Password</h6>
                <input type="password" name="Password">
                <br>
                <h6>Confirm Password</h6>
                <input type="password" name="ConfirmPassword">
                <br>
                <br>
                <br>
                <button type="submit" name="submit">
                    REGISTER
                </button>
            </form>
            <br>
            <br>
            <!--   <p>
                    <a href="#">Forgot Password?</a>
                </p>-->

            <!-- <img src="" alt=""> -->



        </div>

    </div>






    <script src="" async defer></script>
</body>

</html>