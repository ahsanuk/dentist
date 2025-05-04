<?php
	session_start();	

	if(!isset($_SESSION['admin_user'])){
		header("Location: admin_login.php");
		die();
	}

	include 'database_connection.php';

	if( $_SERVER['REQUEST_METHOD'] === "POST" ){

		$stmt = $conn->prepare("INSERT INTO doctors (first_name, last_name, gender,email, contact, address, password, account_created_date, status) VALUES ( ?,?,?,?,?,?,?,?,? ) ");

		$stmt->execute([ $_POST['first_name'],  $_POST['last_name'], $_POST['gender'],$_POST['email'], $_POST['contact'], $_POST['address'], $_POST['password'], $_POST['account_created_date'], "ACTIVE" ]);

		if( $stmt->rowCount() > 0 ){
			$_SESSION['success'] = 1;
			
			// sending mail to doctors email id about account creation
			mail($_POST['email'],"Your Account is created","Your account is created please login");
			
			header("Location: admin_add_doctor.php");
			die();
		}
		else{
			$_SESSION['success'] = 0;
			header("Location: admin_add_doctor.php");
			die();
		}
	}


$msg = ""; //initialzi message variable
	// checking session message set if request is successful or not for displaying results
	if( isset($_SESSION['success']) ) {
		// session is set now check if sucess or not i.e. if 1 means success and 0 means error 
		if( $_SESSION['success'] == 1 ){
			// storing the success message variable in $msg
			$msg = "Doctor Account Created Successful..";
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
				<h2 class="service-list"><u> <a href="" style="color: #847373;">  Add Doctor Account </a> </u></h2>
				
			</div>
		</center>
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

				    <label for="fname">Address</label>
				    <input type="text" id="fname" name="address" placeholder="Address" required="">

				    <br><br>
				    <label for="fname">Gender</label><br>
				    <input type="radio" name="gender" value="male"> Male<br>
				     <input type="radio" name="gender" value="female"> Female<br>
				     <br>
				    <label for="lname">Choose Password</label>
				    <input type="password" id="lname" name="password" placeholder="password" required="">
				    
				     <br> <br>
				    <label for="lname">Joining Date</label>
				    <input type="date" id="lname" name="account_created_date" placeholder="password" required="">
				   
				    <br> <br> 
				    <input type="submit" value="Register">

				  </form>
			</div>

	</div>

	<center>
			<a href="admin_dashboard.php"> <h3>Home</h3> </a>
	</center>


</body>
</html>
<?php  unset($_SESSION['success']); ?>