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
	<title>Corporate</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="corporateHome.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
</head>
<body>
<div class="background">
	<img src="images/corporate_background.jpeg" style="height: 100%; width: 100%" alt="no background">
</div>
<div class="Fix-header">

	<div class="button">
		<a href="#">Profile</a>
		<div class="drop-button">
			<a style="background-color: rgb(111,111,111);" href="book_amc.php">Edit Profile</a>
			<a style="background-color: rgb(111,111,111);" href="logout.php">Logout</a>
		</div>
	</div>

	<div class="button">
		<a href="#">Book</a>
		<div class="drop-button">
			<a style="background-color: rgb(111,111,111);" href="book_amc.php">AMC</a>
			<a style="background-color: rgb(111,111,111);" href="book_service.php">Single Service</a>
		</div>
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
		<ul><h2>
			<li style="margin-top: 15px"><a style ="background-color :red" href="corporateHome.php" >Home</a></li>
			<li class="dropdown" style="margin-top: 15px"><a href="#">Services</a>
				<div class="dropdown-content">
						<a href="#">Computer</a>
						<a href="#">Laptop</a>
						<a href="#">Printer</a>
				</div>
			</li>
			<li style="margin-top: 15px"><a href="#">AMC Services</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href="aboutus.php">About Us</a></li></h2>
	</div>	
</div>
<div class="welcome">
Welcome <?php echo $_SESSION['username']; ?>
</div>
<div class="services-head">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;Your Service Requests&nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>
<table class="services" border="1">
		<tr>
			<th>Sr. no</th>
			<th>Help For</th>
			<th>Description</th>
			<th>Date</th>
			<th>Time</th>
			<th>Status</th>
		</tr>
		<?php
			require_once('phpConn.php');
			$username = $_SESSION['username'];
			$userType = $_SESSION['userType'];
			$query="select helpfor,description,date,time,status from service where username='$username' AND usertype='$userType' AND (status='pending' OR status='accepted')";
			$Result=pg_query($conn,$query);
			$i=0;
			while($row=pg_fetch_assoc($Result)){
				echo "<tr><td>".++$i."</td><td>".$row['helpfor']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$row['time']."</td><td>".$row['status']."</td></tr>";
			}
			
		?>
</table>

<div class="services-head">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;Active AMC &nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>
<table class="services" border="1">
		<tr>
			<th>Sr. no</th>
			<th>Plan</th>
			<th>No. of Machines</th>
			<th>Type of Machine</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>status</th>
			<th>Bill</th>
		</tr>
		<?php
			
			$query="select regno,plan,noofmachines,typeofmachine,startdate,status from amcservice where username='$username' AND (status='pending')";
			$Result=pg_query($conn,$query);
			$i=0;
			while($row=pg_fetch_assoc($Result)){

				$date = strtotime($row['startdate']);

				if($row['plan']=='Plan1')
					$Date = strtotime('+1 years',$date);
				else if($row['plan']=='Plan2')
					$Date = strtotime('+2 years',$date);
				else if($row['plan']=='Plan3')
					$Date = strtotime('+3 years',$date);

				$endDate = date('Y-m-d',$Date);
				echo "<tr><td>".++$i."</td><td>".$row['plan']."</td><td>".$row['noofmachines']."</td><td>".$row['typeofmachine']."</td><td>".$row['startdate']."</td><td>".$endDate."</td><td>".$row['status']."</td>";
				?><td>
					<form action="bill.php" method = "post">
						<input type = "hidden" name = "regno" value="<?php echo $row['regno'];?>">
						<input type = "submit" value = "Generate"> 
					</form>
					</td> </tr> 
				<?php
			}
			
		?>
		
</table>

<div class="services-head">
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
	&nbsp;&nbsp;Service History&nbsp;&nbsp;
	<i class="material-icons" style="font-size: 2.5vw">build_circle</i>
</div>
<table class="services" border="1">
		<tr>
			<th>Sr. no</th>
			<th>Help For</th>
			<th>Description</th>
			<th>Date</th>
			<th>Time</th>
			<th>Status</th>
			<th>Bill</th>
		</tr>

		<?php
		
			$query="select regno,helpfor,description,date,time,status from service where username='$username' AND usertype='$userType' AND (status='completed')";
			$Result=pg_query($conn,$query);
			$i=0;
			while($row=pg_fetch_assoc($Result)){
				echo "<tr><td>".++$i."</td><td>".$row['helpfor']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$row['time']."</td><td>".$row['status']."</td>";
				
				?><td>
					<form action="bill.php" method = "post">
						<input type = "hidden" name = "regno" value="<?php echo $row['regno'];?>">
						<input type = "submit" value = "Generate"> 
					</form>
					</td> </tr> 
				<?php
			}
			pg_close($conn);
		?>
		
</table>

<?php include 'footer.php'; ?>

</body>
</html>