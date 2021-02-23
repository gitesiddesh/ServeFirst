<?php include 'sessionStart.php'; ?>
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
	<a href="#">Profile</a>
		<div class="drop-button">
			<a style="background-color: rgb(111,111,111);" href="book_amc.php">Edit Profile</a>
			<a style="background-color: rgb(111,111,111);" href="logout.php">Logout</a>
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
	Welcome <?php echo $_SESSION['username']; ?>
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
			<th>No of Requests</th>
			<th>Details</th>
		</tr>
		<?php

			include 'phpConn.php';
			
			$query=pg_query($conn,"select COUNT(USERNAME) AS COUNT,username,usertype from service group by username,usertype;");
			$i=0;
			while($row=pg_fetch_assoc($query)){

				echo "<tr><td>".++$i."</td><td>".$row['username']."</td><td>".$row['usertype']."</td><td>".$row['count']."</td>";
				
				?><td>
					<form action="acceptServiceRequest.php" method = "post">
						<!--input type = "hidden" name = "regno" value="<?/*php echo $row['regno'];*/?>"-->
						<input type = "hidden" name = "username" value="<?php echo $row['username'];?>">
						<input type = "hidden" name = "usertype" value="<?php echo $row['usertype'];?>">
						<input type = "submit" name="check" value = "Check"> 
					</form>
					</td> </tr> 
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
			<th>Username</th>
			<th>No of Requests</th>
			<th>Request</th>
		</tr>
		<?php

			$query=pg_query($conn,"select COUNT(USERNAME) AS COUNT,username from amcservice group by username;");
			$i=0;
			while($row=pg_fetch_assoc($query)){
				
				echo "<tr><td>".++$i."</td><td>".$row['username']."</td><td>".$row['count']."</td>";
				
				?><td>
					<form action="acceptAMC.php" method = "post">
						<input type = "hidden" name = "username" value="<?php echo $row['username'];?>">
						<input type = "submit" value = "Check"> 
					</form>
					</td> </tr> 
				<?php
			}
		?>
			
</table>

<?php include 'footer.php'; ?>

</body>
</html>