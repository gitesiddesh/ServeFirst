<?php 
    session_start(); 
    if(!isset($_SESSION['username'])){
        ?> <script type="text/javascript">
                alert('You have been LOGGED OUT please LOGIN again.');
            </script>
        <?php 
            echo "<script>location.href='login.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Book AMC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="book_amc.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
</head>
<body>

<div class="Fix-header">
	<div class="button">
		<a href="login.php">PLANS</a>
	</div>
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
		<p>Book-AMC</p>
	</div>
</div>
<div class="icon">
	<img src="images/Book_icon.png"><br>
</div>
<div class="login-form">
	<form method="POST" action="book_amc.php">
		<label>Pick up plan :</label>&nbsp;&nbsp; 
		<select name="plan" required>
			<option value="Plan1" selected>Plan 1</option>
			<option value="Plan2">Plan 2</option>
			<option value="Plan3">Plan 3</option>
		</select><br><br>
		<label>Type of machines :</label>&nbsp;&nbsp; 
		<select name="help" required>
			<option value="Desktop" selected>Desktop</option>
			<option value="Laptop">Laptop</option>
			<option value="Printer">Printer</option>
		</select><br><br>
		<label>Number of Machines :</label>&nbsp;&nbsp;<input type="number" name="Machines" required><br><br>
		
		<label>Location :</label>&nbsp;&nbsp; 
		<input type="radio" name="Location_rad" onclick="textFieldDisable()"><label>Use default</label>
		<input type="radio" name="Location_rad" onclick="textFieldEnable()"><label>Add new</label><br><br>
		&nbsp;&nbsp;
		<textarea id="textarea" name="Location" rows="5"></textarea><br><br>
		<label>Start Date :</label>&nbsp;&nbsp;<input type="date" name="Date">
		<br><br>
		<input type="checkbox" name="agree" required>&nbsp;&nbsp;<label>I Agree, Will Pay Billed Amount Prior to Start Date.</label>
		<br><br>
		<input class="form-button" type="submit" name="submit"><br><br>

	</form>	
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript">
	function textFieldEnable(){
		document.getElementById("textarea").disabled = false;
		document.getElementById("textarea").placeholder="Add new location here..."
	}

	function textFieldDisable(){
		document.getElementById("textarea").disabled = true;
		document.getElementById("textarea").placeholder = "Using default address";
	}
</script>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{

		require_once('phpConn.php');

		$plan = $_POST['plan'];
		$help = $_POST['help']; echo $help;
		$noOfMachines = $_POST['Machines'];
		$add_type = $_POST['Location_rad']; 
		$username = $_SESSION['username']; //echo $username;
		$userType = $_SESSION['userType']; //echo $userType;

		$regnoQuery = pg_query($conn,"select max(regno) from amcservice") or die("Couldn't Execute");
		$regnoFetch = pg_fetch_assoc($regnoQuery);
		$regno = $regnoFetch['max']+1; //echo $regno+1;

		
		if($add_type == "new"){

			$add = $_POST['Location'];
			//echo $add;
		}
		else    
		{
			$addQuery = "select address from corporate where username = '$username'";
			$addQueryResult = pg_query($conn,$addQuery) or die("Couldn't Execute");
			
			$addFetch = pg_fetch_assoc($addQueryResult);
			$add = $addFetch['address'];
				//echo $add;
			
		}   

		$date = $_POST['Date'];


		$todayDate = date("Y-m-d");
		//echo $todayDate;


		if($date < $todayDate)
		{
			?> <script type="text/javascript">
					alert('Invalid Booking date!!!');
				</script>
			<?php die();

		}

		$insert = pg_query($conn,"INSERT INTO amcservice(regno,username,plan,noofmachines,typeofmachine,address,startdate,status,billamount) VALUES($regno,'$username','$plan',$noOfMachines,'$help','$add','$date','pending',0000)") or die("Couldn't Execute");

			?><script type="text/javascript">
				alert("Service Requested Successfully!!!");
			</script><?php
			echo "<script>location.href='corporateHome.php';</script>";
		}

?>