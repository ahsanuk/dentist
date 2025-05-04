<!-- following code is for users can make appoinmnet request to the doctor -->

<?php

	session_start();	
	// checking the user is logged in or not
	if(!isset($_SESSION['user_first_name'])){
		// session is set redirect to doctor home
        header('Location: appointments.php');
	}	


	include 'database_connection.php';
	// following code is for fetching all information from database which is in appoinments table
	// as per the perticular users
	$stmt = $conn->prepare(" SELECT * FROM appointments WHERE email = ? ");
	$stmt->execute([ $_SESSION['user_email'] ]);

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Appoinments List</title>
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
			<h1>Welcome <?= $_SESSION['user_first_name']?> </h1>
		


			<div class="service-list-menu">
				<h2 class="service-list"><u> Appoinment List </u></h2>
				
			</div>
		</center>
			
			</div>

			<!-- dosctor table woth radio button for deleting a perticular doctor -->
		<div style="margin-left: 15%; margin-right: 15%;">
				<form action="" method="post">
					<table>
					  <tr>
					    <th>Subject</th>
					    <th>Message</th>
					    <th>Date</th>
					    <th>Status</th>
					  </tr>
					  
					  <?php while( $row =  $stmt->fetch(PDO::FETCH_BOTH) ){  ?>
					
						  <tr>
						    <td> <?= $row['subject'] ?>  </td>
						    <td><?= $row['message'] ?></td>
						    <td><?= $row['_date'] ?></td>
						  	 <td><?= $row['status'] ?></td>
						  </tr>
					  
					  <?php  } ?>
					</table>
					
				</form>	
		</div>

	</div>

		<center>
			<a href="user_appoinment_application.php"> <h3>Home</h3> </a>
		</center>


</body>
</html>