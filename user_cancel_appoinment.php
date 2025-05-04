<!-- withe the following code user can cancel the appoinmnet -->
<?php
	
	session_start();	
	// checking the user is logged in or not
	if(!isset($_SESSION['user_first_name'])){
		// session is set redirect to doctor home
        header('Location: appointments.php');
	}	

	
	// here we are including the database file which is contain the database connection
	include 'database_connection.php';
	// checking if request method is post
	if( $_SERVER['REQUEST_METHOD'] === "POST" ){

		// following code is for update the status to cancel as per the perticular user which is realted to that perticular appoinment
		$stmt = $conn->prepare("UPDATE appointments SET status = ? WHERE email = ? ");
		$stmt->execute([ 'CANCEL', $_SESSION['user_email'] ]);

		// checking the affected rows by the last query
		if( $stmt->rowCount() > 0 ){
			// here the status is successfully updated
			$_SESSION['success'] = 1;
			header("Location: user_cancel_appoinment.php");
			die();
		}
		else{
			// no updation perform on the database table
			$_SESSION['success'] = 0;
			header("Location: user_cancel_appoinment.php");
			die();
		}
	}

	// getting the all appoinments from the database table whci is appointments
	$stmt = $conn->prepare(" SELECT * FROM appointments WHERE email = ? ");
	$stmt->execute([ $_SESSION['user_email'] ]);

	$msg = ""; //initialzi message variable
	// checking session message set if request is successful or not for displaying results
	if( isset($_SESSION['success']) ) {
		// session is set now check if sucess or not i.e. if 1 means success and 0 means error 
		if( $_SESSION['success'] == 1 ){
			// storing the success message variable in $msg
			$msg = "Appoinment Request Canceled..";
		}
		else{
			// storing the unsuccess message variable in $msg
			$msg = "Unsuccess Request Try Again";
		}
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
			<h1>Welcome [user name]</h1>
		<!-- alert message code as per the request -->
			<center>
				<h2 style="color: green;"> <?= $msg;  ?> </h2>
			</center>


			<div class="service-list-menu">
				<h2 class="service-list"><u> Cancel Appoinment </u></h2>
				
			</div>
		</center>
			
			</div>

			<!-- dosctor table woth radio button for deleting a perticular doctor -->
		<div style="margin-left: 15%; margin-right: 15%;">
				<form action="" method="post">
					<table>
					  <tr>
					  	<th>select</th>
					    <th>Subject</th>
					    <th>Message</th>
					    <th>Date</th>
					  </tr>
					  <!-- following code is for printing all information from appoinments table -->
					<?php while( $row =  $stmt->fetch(PDO::FETCH_BOTH) ){  ?>

					  <tr>
					  	<td> <input type="radio" name="id" value="<?= $row['id'] ?>"></td>
					    <td> <?= $row['subject'] ?>  </td>
					    <td><?= $row['message'] ?></td>
					    <td><?= $row['_date'] ?></td>
					  </tr>

					<?php  } ?>
					  
					</table>
					<input type="submit" value="Cancel Appoinment" style="background-color: #f15858;">
				</form>	
		</div>

	</div>

	<center>
			<a href="user_appoinment_application.php"> <h3>Home</h3> </a>
	</center>


</body>
</html>
<!-- unset the session succeess index  -->
<?php  unset($_SESSION['success']); ?>