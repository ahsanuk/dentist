<?php

// Name: Ahsan Ul Kabir College Project
	// https://github.com/ahsanuk    
	// https://www.linkedin.com/in/ahsanuk/
	session_start();

	if(!isset($_SESSION['admin_user'])){
		header("Location: admin_login.php");
		die();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
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
	<!-- background immage of home page -->

	<!-- <div class="home-image">
			<img src="images/home.jpg" width="1333" height="500">
			<div class="image-text">
					Enhancing Life. Excelling in Care.
			</div> 
	</div> -->

	<div class="welcome-text">
		<center>
			<h1>Welcome Admin</h1>
		


			<div class="service-list-menu">
				<h2 class="service-list"> <a href="admin_add_doctor.php" style="color: #847373;"> <u> Add Doctor Account </a> </u></h2>
				<h2 class="service-list"> <a href="admin_delete_doctor.php" style="color: #847373;"> <u> Delete Doctor Account </a> </u></h2> </h2>
				<h2 class="service-list"> <a href="admin_manage_website_contents_dashboard.php" style="color: #847373;"> <u> Manage Wesite Contents </a> </u></h2> </h2>
				<h2 class="service-list"> <a href="logout.php" style="color: #847373;"> <u> Logout </a> </u></h2> </h2>
			</div>


	</div>

	

</body>
</html>