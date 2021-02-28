<div class="Fix-header">
	<div class="button">
		<a 
		href="
		<?php 
			if(isset($_SESSION['username'])) 
				echo $_SESSION['redirectPage']; 
			else    
				echo "login.php";
			
		?>">Login</a>
	</div>

	<div class="button">
		<a href="#">Signup</a>
		<div class="drop-button">
			<a style="background-color: rgb(111,111,111);" href="signup_walkin.php"><i class="fas fa-house-user"></i> Walk-In</a>
			<a style="background-color: rgb(111,111,111);" href="signup_corporate.php"><i class="fas fa-briefcase"></i> Corporate</a>
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
			<li style="margin-top: 15px"><a style ="background-color :red" href="#"><i class="fas fa-home"></i> Home</a></li>
			<li class="dropdown" style="margin-top: 15px"><a href="#"><i class="fas fa-tools"></i> Services</a>
				<div class="dropdown-content">
						<a href="#"><i class="fas fa-desktop"></i> Computer</a>
						<a href="#"><i class="fas fa-laptop"></i> Laptop</a>
						<a href="#"><i class="fas fa-print"></i> Printer</a>
				</div>
			</li>
			<li><a href="#"><i class="fab fa-telegram-plane"></i> AMC Services</a></li>
			<li><a href="#"><i class="fas fa-phone"></i> Contact Us</a></li>
			<li><a href="aboutus.php"><i class="fas fa-users"></i>About Us</a></li></h2>
		</ul>
	</div>	
</div>