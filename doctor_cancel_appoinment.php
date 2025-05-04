<?php
	
	session_start();
	if(!isset($_SESSION['doctor_user'])){
		// session is set redirect to doctor home
        header('Location: doctor_login.php');
	}	

	include 'database_connection.php';
	if( $_SERVER['REQUEST_METHOD'] === "POST" ){
			// request method is post	
			

			$stmt = $conn->prepare(" UPDATE appointments SET status = 'CANCEL' WHERE id = ?");
			$stmt->execute( [ $_POST['id'] ] );
			// counting the affected rows
			if( $stmt->rowCount() > 0 ){
				$_SESSION['success'] = 1;
				header("Location: doctor_cancel_appoinment.php");
				die();
			}
			else{
				$_SESSION['success'] = 0;
				header("Location: doctor_cancel_appoinment.php");
				die();	
			}
	}

	$stmt = $conn->prepare(" SELECT * FROM appointments ");
	$stmt->execute();

	$msg = ""; //initialzi message variable
	// checking session message set if request is successful or not for displaying results
	if( isset($_SESSION['success']) ) {
		// session is set now check if sucess or not i.e. if 1 means success and 0 means error 
		if( $_SESSION['success'] == 1 ){
			// storing the success message variable in $msg
			$msg = "Request Successful..";
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
		
			<center>
				<h2 style="color: green;"> <?= $msg;  ?> </h2>
			</center>

			<div class="service-list-menu">
				<h2 class="service-list"><u> <a href="" style="color: #847373;">Appoinment Requests</a> </u></h2>
				
			</div>
		</center>
			
			</div>

			<!-- dosctor table woth radio button for deleting a perticular doctor -->
		<div style="margin-left: 5%; margin-right: 5%;">
				<form action="" method="post">
					<table>
					  <tr>
					  	<th>select</th>
					    <th>First Name</th>
					    <th>Last</th>
					    <th>Email</th>
					    <th>Contact</th>
					    <th>Subject</th>
					    <th>Message</th>
					    <th>Date</th>
					    <th>Status</th>
					  </tr>
					  <!-- following code is for fetch the information from row  -->
					 <?php while( $row =  $stmt->fetch(PDO::FETCH_BOTH) ){  ?>
					
						 <tr>
						  	<td><input type="radio" name="id" value="<?= $row['id']; ?>"></td>
						    <td><?= $row['first_name']; ?></td>
						    <td><?= $row['last_name']; ?></td>
						    <td><?= $row['email']; ?></td>
						    <td><?= $row['contact']; ?></td>
						    <td> <?= $row['subject']; ?>  </td>
						    <td><?= $row['message']; ?></td>
						    <td><?= $row['_date']; ?></td>
						    <td><?= $row['status']; ?></td>
						 </tr>
					  
					  <?php  } ?>
					  
					</table>
					<input type="submit" value="Cancel Appoinment" name="cancel_appoinment" style="background-color: #f15858;">
				</form>	
		</div>

	</div>
	<br>
	<center>
	 	<h2> <a href="doctor_appoinment_operation.php"> Home </a> </h2>
	 </center>

</body>
</html>

<!-- unset the session succeess index  -->
<?php  unset($_SESSION['success']); ?>