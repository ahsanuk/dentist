<?php
	
	session_start();

	if(!isset($_SESSION['doctor_user'])){
		// session is set redirect to doctor home
        header('Location: doctor_login.php');
	}	

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Cancel Appoinment</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/tables.css">
</head>

<body>
	<!-- navigation bar -->
	<div class="main-menu">
		<ul>
		 <li><a  href="index.php">Home</a></li>
		  <li><a href="services.php"> Services</a></li>
		  <li><a href="#contact">Consultation Fees</a></li>
		  <li><a href="#about">Resources</a></li>
		  <li><a href="#about">Appointments</a></li>
		  <li><a href="#about">Contact Us</a></li>	
		  <li style="float: right;"><a href="#about"> Staff Section </a></li>	
		</ul>
	</div>
	<!-- background immage of home page -->

	<!-- <div class="home-image">
			<img src="images/home.jpg" width="1333" height="500">
			<div class="image-text">
					Enhancing Life. Excelling in Care.
			</div> 
	</div> -->

	<div class="welcome-text">
		<center>
			<h1>Welcome Dr. <?= $_SESSION['doctor_name'] ?></h1>
		
			
			<div class="service-list-menu">
				<h2 class="service-list"><u> <a href="doctor_approve_appoinment.php" style="color: #847373;">Approve Appoinment Requests</a> </u></h2>
				
			</div>

			<div class="service-list-menu">
				<h2 class="service-list"><u> <a href="doctor_cancel_appoinment.php" style="color: #847373;">Cancel Appoinment Requests</a> </u></h2>
				
			</div>

			<div class="service-list-menu">
				<h2 class="service-list"><u> <a href="logout.php" style="color: #847373;">Logout</a> </u></h2>
				
			</div>

		</center>
			
	</div>

			<!-- dosctor table woth radio button for deleting a perticular doctor -->
		
</body>
</html>

<!-- unset the session succeess index  -->
<?php  unset($_SESSION['success']); ?>