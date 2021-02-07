<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Book Service</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="book_service.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
	<link href='https://fonts.googleapis.com/css?family=Amita' rel='stylesheet'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
</head>
<body>

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
		<p>Book-Service</p>
	</div>
</div>
<div class="icon">
	<img src="images/Book_icon.png"><br>
</div>
<div class="login-form">
	<form>
		<label>Need for help :</label>&nbsp;&nbsp; 
		<select name="help" required>
			<option value="Desktop" selected>Desktop</option>
			<option value="Laptop">Laptop</option>
			<option value="Printer">Printer</option>
		</select><br><br>
		<label>Description about issue :</label><br>&nbsp;&nbsp; <textarea name="Description" rows="5" required></textarea><br><br>
		
		<label>Location :</label>&nbsp;&nbsp; 
		<input type="radio" name="Location_rad" onclick="textFieldDisable()"><label>Use default</label>
		<input type="radio" name="Location_rad" onclick="textFieldEnable()"><label>Add new</label><br><br>
		&nbsp;&nbsp;
		<textarea id="textarea" name="Location" rows="5"></textarea><br><br>
		<label>Date :</label>&nbsp;&nbsp;<input type="date" name="Date">
		<br><br>
		<label>Time :</label>&nbsp;&nbsp;<input type="time" name="Time">
		<br><br>
		<input type="checkbox" name="Time" required>&nbsp;&nbsp;<label>I Agree, Will Pay Billed Amount to Service Engineer</label>
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