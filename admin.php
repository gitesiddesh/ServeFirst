<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin.css">
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
		<p>Admin Page</p>
	</div>
</div>
<div class="welcome">
	Welcome Admin
	<i class="material-icons" style="font-size: 3vw">person</i>
</div>

<div class="services-head">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;Service Requests&nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>

<table class="services" border="1">
		<tr>
			<th>Sr. no</th>
			<th>User name</th>
			<th>User type</th>
			<th>Request</th>
		</tr>
		<?php

			$conn=pg_connect("host=localhost dbname=sidg user=sidg password=sidg") or die("Couldn't Connect");
			$Name="siddesh";
			$query="select * from customer";
			$Result=pg_query($conn,$query);


			while($row=pg_fetch_assoc($Result)){
				?>

				<tr>
					<td><?php echo$row["reg_no"]; ?></td>
					<?php 
						$_SESSION['session_reg_no'] = $row['reg_no']; 
					?>
					<td><?php echo$row["user_name"]; ?></td>
					<td>Walk-in</td>
					<td>
						<form action=acceptServiceRequest.php method="post">
							<input type="hidden" name="step" value="<?php echo $row["reg_no"];?>" />
							<input type="submit" value="Check">
						</form>
					</td>
				</tr>
				<?php
				}
			?>
			
</table>

<div class="services-head">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;AMC Requests&nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>

<table class="services" border="1">
		<tr>
			<th>Sr. no</th>
			<th>Company</th>
			<th>Plan</th>
			<th>Request</th>
		</tr>
		<tr>
			<td>1.</td>
			<td>TCS</td>
			<td>Plan 1</td>
			<td>
				<form action=acceptAMC.php method="post">
					<input type="hidden" name="step" value="<?php echo $row["reg_no"];?>" />
					<input type="submit" value="Check">
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