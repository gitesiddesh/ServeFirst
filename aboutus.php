<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>About Us</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="aboutus.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
</head>
<body>
<div class="background">
	<img src="images/background4.jpg" alt="no background" style="height:100%; width: 100%">
</div>
<div class="Fix-header">
	
	<h1 class="lable">
		<i class="material-icons" style="font-size: 2vw">computer</i>
		&nbsp;PC CARE...
		<small style="font-size: 1.5vw ;color:rgb(0,8,51)">we care for what you care</small>
	</h1>

	<div class="logo">
		<img src="images/logo.png">
	</div>

	<div class="nav">
		<ul><h2>
			<li style="margin-top: 15px"><a href="<?php 
			if(isset($_SESSION['username'])) 
				echo $_SESSION['redirectPage']; 
			else    
				echo "index.php";
			
		?>">Home</a></li>
			<li class="dropdown" style="margin-top: 15px"><a href="#">Services</a>
				<div class="dropdown-content">
						<a href="#">Computer</a>
						<a href="#">Laptop</a>
						<a href="#">Printer</a>
				</div>
			</li>
			<li style="margin-top: 15px"><a href="#">AMC Services</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a style ="background-color :red" href="aboutus.html">About Us</a></li>
		</h2>
		</ul>
	</div>	
</div>
<div class="moto">
	Who we are?
</div>

<div class="content">
	<p>We are a Pune based start-up in computer hardware service industry. We help you to get rid from the computer related issues including software and hardware. We specialized in analysing computer hardware problem and provide you perfect solutions, No matter whether you‘re an individual or organization, our approach to every customer is the same. Our aim is to provide you best and cost effective computer related services at doorstep from experienced and professional hardware engineer. Our approach is to encourage individual users to obtain visit based service to control annual maintenance spending on computer related service. </p>
	<p>We provide doorstep computer repair services across entire pune through our stores located in Hadapsar, Dhanori, Kothrud, Mundhawa, Dhankawadi, Kharadi, Sinhagad Road and 11+ Stores. Our commitment to quality and high standards keeps our customers happy and more importantly - coming back again and again with references. We’ve specialized hardware engineers team who can handle your entire computer problem.</p>
<br><br>
</div>
<div class="moto">
	Our Core Values.
</div>
<div class="content">
	<b>Customer = Satisfaction and Right Value for Money Spend</b>
	<p>Customer should get the right value with respect and superior service. We deeply understand that if our customer is not happy means we failed in our business. We keep customer satisfaction on top priority.</p>
	<p><b>Employee = Customer </b></p>
	<p>Each Employee deserve respect and best value for its efforts towards making customer happy. We dreamt and built this platform with vision to provide jobs for every hand and equal respect to employee and partners with customer. We understand that our employees are backbone of our business and without their support we’re nothing.</p>
<br><br>
</div>

<?php include 'footer.php'; ?>

</body>
</html>