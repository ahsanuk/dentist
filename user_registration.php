<?php

// Name: Ahsan Ul Kabir College Project
	// https://github.com/ahsanuk    
	// https://www.linkedin.com/in/ahsanuk/
	
session_start();	

	include 'database_connection.php';

	if(isset($_SESSION['user_first_name'])){
		// session is set redirect to doctor home
        header('Location: user_appoinment_application.php');
	}	


	if( $_SERVER['REQUEST_METHOD'] === "POST" ){

		$stmt = $conn->prepare("INSERT INTO user (first_name, last_name, gender,email, contact, address, password) VALUES ( ?,?,?,?,?,?,? ) ");

		$stmt->execute([ $_POST['first_name'],  $_POST['last_name'], $_POST['gender'],$_POST['email'], $_POST['contact'], $_POST['address'], $_POST['password'] ]);

		if( $stmt->rowCount() > 0 ){
			$_SESSION['success'] = 1;

			// account creation mail to patient email address 
			mail($_POST['email'],"Your Account is created","Your account is created please login and thanks for connecting with us");

			header("Location: user_registration.php");
			die();
		}
		else{
			$_SESSION['success'] = 0;
			header("Location: user_registration.php");
			die();
		}
	}

$msg = ""; //initialzi message variable
	// checking session message set if request is successful or not for displaying results
	if( isset($_SESSION['success']) ) {
		// session is set now check if sucess or not i.e. if 1 means success and 0 means error 
		if( $_SESSION['success'] == 1 ){
			// storing the success message variable in $msg
			$msg = "Account Created Successful..";
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

		<center>
				<h2 style="color: green;"> <?= $msg;  ?> </h2>
		</center>

			<!-- here is the login form for public section -->
			<div class="fom-div">
				  <form action="" method="post">
				    
				    <label for="fname">First name</label>
				    <input type="text" id="fname" name="first_name" placeholder="First name" required="">

				    <label for="fname">Last name</label>
				    <input type="text" id="fname" name="last_name" placeholder="Last name" required="">

				    <label for="fname">Email</label>
				    <input type="email" id="fname" name="email" placeholder="email" required="">

				    <label for="fname">Contact</label>
				    <input type="number" id="fname" name="contact" placeholder="Contact" required="">
				    <br><br>
				    <label for="fname">Gender</label><br>
				    <input type="radio" name="gender" value="male" checked=""> Male<br>
				     <input type="radio" name="gender" value="female"> Female<br>
				     <br>

				     <label for="fname">Address</label>
				    <input type="text" id="fname" name="address" placeholder="Address" required="">

				    <label for="lname">Choose Password</label>
				    <input type="password" id="lname" name="password" placeholder="password" required="">
				    <input type="submit" value="Register">
				  </form>
			</div>
			

			<center>
				<h3> <a href="appointments.php"> Click here for Log In </a> </h3>
			</center>


		</div>



	

</body>
</html>
<?php  unset($_SESSION['success']); ?>