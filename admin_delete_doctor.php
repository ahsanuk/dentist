<?php

	session_start();	

	if(!isset($_SESSION['admin_user'])){
		header("Location: admin_login.php");
		die();
	}

	include 'database_connection.php';

	if( $_SERVER['REQUEST_METHOD'] === "POST" ){

		$stmt = $conn->prepare("DELETE FROM doctors WHERE id = ? ");
		$stmt->execute([ $_POST['id'] ]);

		if( $stmt->rowCount() > 0 ){
			$_SESSION['success'] = 1;
			header("Location: admin_delete_doctor.php");
			die();
		}
		else{
			$_SESSION['success'] = 0;
			header("Location: admin_delete_doctor.php");
			die();
		}
	}


	$stmt = $conn->prepare(" SELECT * FROM doctors ");
	$stmt->execute();

	$msg = ""; //initialzi message variable
	// checking session message set if request is successful or not for displaying results
	if( isset($_SESSION['success']) ) {
		// session is set now check if sucess or not i.e. if 1 means success and 0 means error 
		if( $_SESSION['success'] == 1 ){
			// storing the success message variable in $msg
			$msg = "Doctor Account Deleted Successful..";
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
	<title>Admin Dashboard</title>
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
			<h1>Welcome Admin</h1>
		
			<center>
				<h2 style="color: green;"> <?= $msg;  ?> </h2>
			</center>


			<div class="service-list-menu">
				<h2 class="service-list"><u> <a href="" style="color: #847373;">  Delete Doctor Account </a> </u></h2>
				
			</div>
		</center>
			
			</div>

			<!-- dosctor table woth radio button for deleting a perticular doctor -->
		<div style="margin-left: 20%; margin-right: 20%;">
				<form action="" method="post">
					<table>
					  <tr>
					  	<th>select</th>
					    <th>Firstname</th>
					    <th>Lastname</th>
					    <th>email</th>
					  </tr>
					 <?php while( $row =  $stmt->fetch(PDO::FETCH_BOTH) ){  ?>

					  <tr>
					  	<td> <input type="radio" name="id" value="<?= $row['id'] ?>"></td>
					    <td> <?= $row['first_name'] ?>  </td>
					    <td><?= $row['last_name'] ?></td>
					    <td><?= $row['email'] ?></td>
					  </tr>

					<?php  } ?>
					  
					</table>
					<input type="submit" value="Delete Account" style="background-color: #f15858;">
				</form>	
		</div>

	</div>

	<center>
			<a href="admin_dashboard.php"> <h3>Home</h3> </a>
	</center>

</body>
</html>
<?php  unset($_SESSION['success']); ?>