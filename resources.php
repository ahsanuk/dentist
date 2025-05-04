<?php

// Name: Ahsan Ul Kabir College Project
	// https://github.com/ahsanuk    
	// https://www.linkedin.com/in/ahsanuk/
	

// $result = $stmt->fetch(PDO::FETCH_ASSOC);

// print_r($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
				table {
				    border-collapse: collapse;
				    width: 70%;
				    margin-left: 15%;
				}

				th, td {
				    text-align: left;
				    padding: 8px;
				}

				tr:nth-child(even){background-color: #f2f2f2}

				th {
				    background-color: #a7a7a7;
				    color: white;
				}
	</style>

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

	<div class="home-image">
			<img src="images/img5.jpg" width="1333" height="330">
			<!-- <div class="image-text">
					Enhancing Life. Excelling in Care.
			</div>  -->
	</div><br>

	<div class="welcome-text">
		<center>
			<h1>Resources</h1>
		</center>

		<div class="service-list-menu">
			<h2 class="service-list"> <u> Children with Special Health Care Needs  </u></h2>
			<h2 class="service-list"> <u> What You Need to Know in an Emergency </u></h2>
			<h2 class="service-list"> <u> When It's Just You in an Emergency  </u></h2>
			<h2 class="service-list"> <u> Heart Transplant Services  </u></h2>
			<h2 class="service-list"> <u> Weight Management  </u></h2>
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