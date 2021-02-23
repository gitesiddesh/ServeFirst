<?php 

include 'sessionStart.php'; 
include 'phpConn.php';

	if(isset($_POST['regno'])){

		$status=$_POST['status'];
		$bill = $_POST['bill'];
		$regno = $_POST['regno'];
		$qstatus="update service set status='$status' where regno=$regno;";
		$updateQuery = pg_query($conn,$qstatus);

		if(isset($_POST['bill']))
		{
			$qbill ="update service set billamount= $bill where regno=$regno;";
			$updateQuery = pg_query($conn,$qbill);
		}	
	}
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Service</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="acceptServiceRequest.css">
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
<div class="services-head">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;User Details&nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>

<table class="services" border="1">
		<tr>
			<th>User name</th>
			<th>User type</th>
			<th>Email</th>
			<th>Contact no.</th>
			<th>Address</th>
		</tr>

		<?php 
			//include 'phpConn.php';
			//$regno = $_POST['regno'];
			$username = $_POST['username'];
			$usertype = $_POST['usertype'];

			if($usertype == "Walkin")
				$query = pg_query($conn, "select email,contact,address from walkin where username='$username';");
			else
				$query = pg_query($conn, "select email,contact,address from corporate where username='$username';");

			$row = pg_fetch_assoc($query);

			echo "<tr><td>".$username."</td><td>".$usertype."</td><td>".$row['email']."</td><td>".$row['contact']."</td><td>".$row['address']."</td></tr>";
		?>
		
</table>

<div class="services-head">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;Service Request&nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>

<table class="services" border="1">
		<tr>
			<th>Sr. no</th>
			<th>Help for</th>
			<th>Description</th>
			<th>Address</th>
			<th>Date</th>
			<th>Time</th>
			<th>Current Status</th>
			<th>Status</th>
			<th>Current Bill amount</th>
			<th>Bill amount</th>
		</tr>

	<?php

	$query1 = pg_query($conn,"select * from service where username='$username' AND usertype='$usertype';");
	$i = 0;
	while($row=pg_fetch_assoc($query1))
	{

		echo "<tr><td>".$row['regno']."</td><td>".$row['helpfor']."</td><td>".$row['description']."</td><td>".$row['address']."</td><td>".$row['date']."</td><td>".$row['time']."</td><td>".$row['status']."</td>";
		?>
			<td>
				<form method="POST" action="acceptServiceRequest.php">
					<select name= "status">
						<option value="pending" selected>Pending</option>
						<option value="accepted">Accepted</option>
						<option value="in progress">in progress</option>
						<option value="completed">Completed</option>
					</select>
			</td>
			<td>
				<?php echo $row['billamount'];?>
			</td>
			<td>
				<input type="hidden" name="regno" value="<?php echo $row['regno']; ?>">
				<input type="hidden" name="username" value="<?php echo $username; ?>">
				<input type="hidden" name="usertype" value="<?php echo $usertype; ?>">
				<input type="number" name="bill">
			</td>
			<td>
				<input type="submit" name="save" value="Save">
			</form>
			</td>
		</tr>
	<?php
	}
	?>	
</table>

<?php include 'footer.php'; ?>

</body>
</html>
