<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="signup_corporate.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
</head>
<body>

<div class="Fix-header">
	<div class="button">
		<a href="index.php">Home</a>
	</div>

	<h1 class="lable">
		<i class="material-icons" style="font-size: 2vw">computer</i>
		&nbsp;Serve First...
		<small style="font-size: 1.5vw ;color:rgb(0,8,51)">we care for what you care</small>
	</h1>

	<div class="logo">
		<img src="images/logo.jpg">
	</div>

	<div class="nav">
		<p>Walk-in Sign Up</p>
	</div>
</div>
<div class="icon">
	<img src="images/Add User.jpeg"><br>
</div>
<div class="login-form">
	<form method="post" action="signup_walkin.php">
		<label>Full Name :</label>&nbsp;&nbsp;<input type="text" name="Name" pattern="^[A-Za-z\s]+" title="Only letters" required>
		<br><br>
		<label>Email :</label>&nbsp;&nbsp;
		<input type="Email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br><br>
		<label>Contact No. :</label>&nbsp;&nbsp;+91
		<input type="text" name="Contact" pattern="[0-9]{10}" required><br><br>
		<label>Location :</label>&nbsp;&nbsp; 
		<textarea name="Location" rows="5" required></textarea><br><br>
		<label>User Name :</label>&nbsp;&nbsp;
		<input type="text" name="UserName">
		<br><br>
		<label>Password :</label>&nbsp;&nbsp;
		<input type="Password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>
		<label>Re-Enter Password :</label>&nbsp;&nbsp;
		<input type="Password" name="RePassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>
		<input class="form-button" type="submit" name="submit"><br><br>
	</form>	
</div>

<?php include 'footer.php'; ?>

</body>
</html>
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){	
		
		require_once("phpConn.php"); 
		$fullname=$_POST['Name'];
		$email=$_POST['Email'];
		$contact=$_POST['Contact'];
		$address=$_POST['Location'];
		$username=$_POST['UserName'];
		$password=$_POST['Password'];
		$repassword=$_POST['RePassword'];

		$emailVal="select 1 from walkin where email='$email'";
		$emailValResult=pg_query($conn,$emailVal);
		

		$usernameVal="select 1 from walkin where username='$username'";
		$usernameValResult=pg_query($conn,$usernameVal);
		

		if(pg_fetch_row($emailValResult)>0)
		{
				?><script type="text/javascript">
					alert("Email already Registred!!!");
			    </script><?php
		}
		else if(pg_fetch_row($usernameValResult)>0)
		{
			?><script type="text/javascript">
					alert("User Name already taken!!! Try another..");
			</script><?php
		}
		else if($password != $repassword)
		{
			?><script type="text/javascript">
					alert("Password do not match!!! Retry...");
				</script><?php
		}
		else
		{
			$insert= "INSERT INTO walkin(username,password,fullname,email,contact,address) 
						VALUES ('$username','$password','$fullname','$email','$contact','$address')";
			
			$insertResult= pg_query($conn,$insert) or die("Couldn't Execute");

			?><script type="text/javascript">
				alert("SIGNUP SUCCESSFUL");
			</script><?php
			echo "<script>location.href='login.php';</script>";
		}
	}
	
?>