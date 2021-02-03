<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Service</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="serviceRequest.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
</head>
<body>
<div class="background">
	<img src="images/background3.png" alt="no background">
</div>

<div class="Fix-header">

	<div class="button">
		<a href="logout.php">Logout</a>
		<div class="drop-button">
		</div>
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
		<p>Admin</p>
	</div>
</div>

<!-------------------------------------------AMC---------------------->

<div class="services-head" style="margin-top: 120px">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;User Details&nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>

<table class="services" border="1">
		<tr>
			<th>User name</th>
			<th>Owner name</th>
			<th>Company</th>
			<th>Email</th>
			<th>Contact no.</th>
			<th>Address</th>
		</tr>

		<tr>
			<td>TCS123</td>
			<td>Ratan Tata</td>
			<td>TCS</td>
			<td>tcs123@gmail.com</td>
			<td>1234567890</td>
			<td>Survey No. 103/A-1/129, Nagar Road, Yerwada, Nyati Tiara, Pune, Maharashtra 411006</td>
		</tr>
</table>

<div class="services-head">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;AMC Service Request&nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>

<table class="services" border="1">
		<tr>
			<th>Sr. no</th>
			<th>Plan</th>
			<th>No. of Machines</th>
			<th>Type of Machine</th>
			<th>Address</th>
			<th>Start Date</th>
			<th>Status</th>
			<th>Bill amount</th>
		</tr>

		<tr>
			<td>1.</td>
			<td>Plan 1</td>
			<td>138</td>
			<td>Printers</td>
			<td>Survey No. 103/A-1/129, Nagar Road, Yerwada, Nyati Tiara, Pune, Maharashtra 411006</td>
			<td>12/12/2020</td>
			<td>
				<form>
					<select>
						<option selected>Pending</option>
						<option>Accepted</option>
						<option>working</option>
						<option>Completed</option>
					</select>
			</td>
			<td>
				<input type="number" name="bill">
			</td>
			<td>
				<input type="submit" name="save" value="Save">
			</form>
			</td>
		</tr>
</table>

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