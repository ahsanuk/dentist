<!-- following page is for manage consultation fees -->

<?php
	session_start();

	if(!isset($_SESSION['admin_user'])){
		header("Location: admin_login.php");
		die();
	}

	include 'database_connection.php';
	if( $_SERVER['REQUEST_METHOD'] === "POST" ){
			// request method is post	
			

			$stmt = $conn->prepare("INSERT INTO website_contents (name, fields, value) VALUE ( ? , ?, ?) ");
			$stmt->execute( [ 'services' ,$_POST['service_name'], 'NULL' ] );
			// counting the affected rows
			if( $stmt->rowCount() > 0 ){
				$_SESSION['success'] = 1;
				header("Location: admin_manage_contents_service_add.php");
				die();
			}
			else{
				$_SESSION['success'] = 0;
				header("Location: admin_manage_contents_service_add.php");
				die();	
			}
	}

	

	$msg = ""; //initialzi message variable
	// checking session message set if request is successful or not for displaying results
	if( isset($_SESSION['success']) ) {
		// session is set now check if sucess or not i.e. if 1 means success and 0 means error 
		if( $_SESSION['success'] == 1 ){
			// storing the success message variable in $msg
			$msg = "Added Successful..";
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
					
				
					<center>
						<h2 style="color: green;"> <?= $msg;  ?> </h2>
					</center>

					
			</center>


			<div class="service-list-menu">
				<h2 class="service-list"> 
						<a href="admin_manage_contents_consultation_fees.php" style="color: #847373;"> <u> Manage Services 
						</a> 
				</u></h2>
			</div>


			<div style="margin-left: 5%; margin-right: 5%;">
				
		</div>
			

	</div>

				<div style="margin-left: 20%; margin-right: 20%;">
				  <form action="" method="post">
				    <label for="fname">Service Name</label>
				    <input type="text" id="fname" name="service_name" placeholder="Service Name..">
				    <input style="background-color: #44c38d;" type="submit" value="Add Service">
				  </form>
				</div>

	<center>
		<h3> <a href="admin_dashboard.php"> Home</a> </h3>
	</center>

</body>
</html>
<!-- unset the session succeess index  -->
<?php  unset($_SESSION['success']); ?>