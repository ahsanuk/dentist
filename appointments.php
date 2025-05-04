<?php
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>

<body>
	<!-- navigation bar -->
	<div class="main-menu">
		<ul>
		 <li><a  href="index.php">Home</a></li>
		  <li><a href="services.php"> Services</a></li>
		  <li><a href="consultation_fees.php">Consultation Fees</a></li>
		  <li><a href="resources.php">Resources</a></li>
		  <li><a href="appointments.php">Appointments</a></li>
		  <li><a href="contact_us.php">Contact Us</a></li>	
		  <li style="float: right;"><a href="staff_section.php"> Staff Section </a></li>	
		</ul>
	</div>
	
		<div class="welcome-text">
			<center>
				<h1>Appointments</h1>
			</center>

			<!-- here is the login form for public section -->
			<div class="fom-div">
				  <form action="user_validation.php" method="post">
				   
				   	

				    <label for="fname">Email</label>
				    <input type="text" id="fname" name="user_email" placeholder="email">

				    <label for="lname">Password</label>
				    <input type="password" id="lname" name="password" placeholder="password">
				    <input type="submit" value="login">
				  </form>
			</div>
			

			<center>
				<h3> <a href="user_registration.php"> Click here for registration </a> </h3>

				<h3> <strong>Username:</strong> swap@mail.com </h3>
				 <h3> <strong>Password:</strong> pass123 </h3>
			</center>


		</div>



	

</body>
</html>