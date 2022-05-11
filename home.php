<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body onload="startTime()">
<head>
<meta content="en-us" http-equiv="Content-Language"/>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Homework 9 CS 385</title>
</head> 
<body style="background-color: #024fad">
	<!-- Header -->
	<?php include('header.php')?>
	<script type="text/javascript" src="clock.js"></script>

	
	<!-- Main Content Area -->
	<div id="mainContentArea">
		<!-- Prints the clock -->
		<div class = "clock">
			<div id="txt">
			</div>
		</div>
		<div class="centerBorder">
			<div class="border">
				<form method="post">	
					<div>
						<center>
							<input type = "number" placeholder = "ID Number" name = "idNumber" class = "input"><br>
							<input type = "password" placeholder = "Password" name = "password" class = "input">
						</center>
					</div>
					<div>
						<br>
						<center>
							<input type = "submit" class = "button" value = " Clock In " name = "clockIn" formaction = "ProcessLogin.php">
							<input type = "submit" class = "button" value = "Clock Out" name = "clockOut" formaction = "ProcessLogin.php">
						</center>
						<br>
						<center>
							<input type = "submit" class = "button" value = "Login (Admins Only)" name = "Login" formaction = "ProcessLogin.php">
						</center>
					</div>	
				</form>
			</div>
		</div>
	</div>

	<!-- Left image -->
	<div class="leftColumn">
		<div class="centerImage1">
			<img src="ClockIn.png" alt="Description for image" width="350" height="250">
		</div>
	</div>

	<!-- Right image -->
	<div class="rightColumn">
		<div class="centerImage2">
			<img src="ClockOut.png" alt="Description for image" width="350" height="250">
		</div>
	</div>

	<!-- Footer -->
	<?php include('footer.php') ?>
</body>
</html>