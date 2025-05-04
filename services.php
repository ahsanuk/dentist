<?php

// Name: Ahsan Ul Kabir College Project
	// https://github.com/ahsanuk    
	// https://www.linkedin.com/in/ahsanuk/
	
	include 'database_connection.php';

	$stmt = $conn->prepare(" SELECT * FROM website_contents WHERE name = 'services' ");
	$stmt->execute( );
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
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

	<div class="">
			<img src="images/medical.png" width="1333" height="300">
		<!-- 	<div class="image-text">
					Enhancing Life. Excelling in Care.
			</div>  -->
	</div>

	<div class="welcome-text">
		<center>
			<h1>Services</h1>
		</center>

			<div class="service-list-menu">
				<h2 class="service-list"> <u> Emergency Contraception </u></h2>
				<h2 class="service-list"> <u> Laboratory </u></h2>
				<h2 class="service-list"> <u> Ostheopathic Manipulation Therapy  </u></h2>
				<h2 class="service-list"> <u> Urgent Medical Concerns  </u></h2>
				<h2 class="service-list"> <u> Weight Management  </u></h2>
			</div> 

			<div class="service-list-menu">
				<?php while( $row =  $stmt->fetch(PDO::FETCH_ASSOC) ){  ?>
					
					<h2 class="service-list"> <u> <?= $row['fields'] ?> </u></h2>
					  
				<?php  } ?>	  
			</div>


			


	</div>
	<br><br><br>

<!-- Footer Section -->
<div class="footer" style=" bottom: 0; background-color: #f1f1f1; text-align: center; padding: 10px;">
<p>&copy; <?php echo date("Y"); ?> Dentist Management System. PHP Application developed by Ahsan Ul Kabir for College project in 2017</p>
<p>Github <a href="https://github.com/ahsanuk">Link</a> &nbsp;&nbsp;&nbsp; Linkedin <a href="https://www.linkedin.com/in/ahsanuk/">Link</a></p>
</div>


</body>
</html>