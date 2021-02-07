<?php
    session_start();
    //echo "session started";
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
</head>
<body>
<!--div class="background">
	<img src="images/login-back.jpeg" alt="no background">
</div-->

<div class="Fix-header">
	<div class="button">
		<a href="index.html">Home</a>
	</div>

	<h1 class="lable">
		<i class="material-icons" style="font-size: 2vw">computer</i>
		&nbsp;Serve First..
		<small style="font-size: 1.5vw ;color:rgb(0,8,51)">we care for what you care</small>
	</h1>

	<div class="logo">
		<img src="images/logo.jpg">
	</div>

	<div class="nav">
		<p>LOGIN</p>
	</div>
</div>
<div class="icon">
	<img src="images/login-back.jpeg"><br>
</div>
<div class="login-form">

	<form method="post" action="login.php">

		<label>User Name :</label>&nbsp;&nbsp;<input type="text" name="UserName" required>		<br><br>

		<label>Password :</label>&nbsp;&nbsp;<input type="Password" name="Password" required>		<br><br>

		<label>Account type :</label>&nbsp;&nbsp;

		<input type="radio" name="account" value="Admin">
		<label>Admin</label>

		<input type="radio" name="account" value="Walk-In">
		<label>Walk-In</label>

		<input type="radio" name="account" value="Corporate">
		<label>Corporate</label>
		<br><br>

		<input class="form-button" type="submit" name="submit"><br><br>

	</form>	



		<p> New?&nbsp;Sign Up as </p>
		<a href="signup_walkin.php" class="form-button" style="text-decoration: none;">User</a><br>
		<a href="signup_corporate.php" class="form-button" style="text-decoration: none;">Corporate</a>
	
</div>

<div class="footer">
	<p>
		Copyright <i class="material-icons" style="font-size: 1.3vw">copyright</i>
		PC Care Computing Services &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Made with 
		<i class="material-icons" style="color: red;font-size: 1.3vw">favorite</i>
		in Pune&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
		<a href="#">Contact us</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="aboutus.html">About us</a>
	</p>

</div>

</body>
</html>

<?php

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		require_once('phpConn.php');

		$username = $_POST['UserName'];
		$password = $_POST['Password'];
		$type = $_POST['account'];

		//echo "$username, $password, $type";
        if($type == "Admin")
        {
            $checkUsername = "select 1 from admin where username = '$username'";
            $checkPassword = "select 1 from admin where password = '$password'";

            $usernameResult = pg_query($conn, $checkUsername);
            $passwordResult = pg_query($conn, $checkPassword);

            if(pg_fetch_row($usernameResult)<=0)
            {
                ?><script type="text/javascript">
                alert("Invalid Username!!! Please try again...");
                </script>
                <?php
                //echo "incorrect username";
               // echo pg_fetch_row($usernameResult);
            }
            else
            {
                //echo "correct username";
                //echo pg_fetch_row($usernameResult);
                if(pg_fetch_row($passwordResult)<=0)
                {
                    ?><script type="text/javascript">
                        alert("Invalid Password!!! Please try again...");
                    </script>
                    <?php
                }
                else
                {
                    $_SESSION['username'] = $username;
                    //echo "username =". $_SESSION['username'];

                   /* ?><script type="text/javascript">
                    alert("LOGIN SUCCESSFUL");
                    </script><?php*/
                    echo "<script>location.href='admin.php';</script>";
                }
            }
        }
        else if($type == "Walk-In")
        {
            $checkUsername = "select 1 from walkin where username = '$username'";
            $checkPassword = "select 1 from walkin where password = '$password'";

            $usernameResult = pg_query($conn, $checkUsername);
            $passwordResult = pg_query($conn, $checkPassword);

            if(pg_fetch_row($usernameResult)<=0)
            {
                ?><script type="text/javascript">
                alert("Invalid Username!!! Please try again...");
                </script>
                <?php
            }
            else
            {
                if(pg_fetch_row($passwordResult)<=0)
                {
                    ?><script type="text/javascript">
                        alert("Invalid Password!!! Please try again...");
                    </script>
                    <?php
                }
                else
                {
                    $_SESSION['username'] = $username;

                    echo "<script>location.href='userHome.php';</script>";
                }
            }
        }
        else if($type == "Corporate")
        {
            $checkUsername = "select 1 from corporate where username = '$username'";
            $checkPassword = "select 1 from corporate where password = '$password'";

            $usernameResult = pg_query($conn, $checkUsername);
            $passwordResult = pg_query($conn, $checkPassword);

            if(pg_fetch_row($usernameResult)<=0)
            {
                ?><script type="text/javascript">
                alert("Invalid Username!!! Please try again...");
                </script>
                <?php
            }
            else
            {

                if(pg_fetch_row($passwordResult)<=0)
                {
                    ?><script type="text/javascript">
                        alert("Invalid Password!!! Please try again...");
                    </script>
                    <?php
                }
                else
                {
                    $_SESSION['username'] = $username;

                    echo "<script>location.href='corporateHome.php';</script>";
                }
            }
        }
        else
        {
            ?><script type="text/javascript">
                alert("Please select account type.");
            </script>
            <?php
        }

	}

?>