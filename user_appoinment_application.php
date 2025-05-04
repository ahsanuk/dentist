<?php
session_start();

	// checking the user is logged in or not
	if(!isset($_SESSION['user_first_name'])){
		// session is set redirect to doctor home
        header('Location: appointments.php');
	}	

	// checking request method is post or not
	if( $_SERVER['REQUEST_METHOD'] === "POST" ){
			// request method is post
				include 'database_connection.php';
				$stmt = $conn->prepare("INSERT INTO appointments (first_name, last_name, email, contact, subject, message, _date, status) VALUES (?,?,?,?,?,?,?,?)");

    			$stmt->execute([ $_SESSION['user_first_name'], $_SESSION['user_last_name'], $_SESSION['user_email'], $_SESSION['user_contact'], $_POST['subject'], $_POST['message'], $_POST['date'], 'PENDING' ]);

    			if($stmt->rowCount() > 0){
    					$_SESSION['success'] = 1;
    					header("Location: user_appoinment_application.php");
						die();
    			}
    			else{
	    				$_SESSION['success'] = 0;
	    				header("Location: user_appoinment_application.php");
						die();
    			}
	}

$msg = "";

// checking session message set if request is successfulo or not for displaying results
if( isset($_SESSION['success']) ) {
	// session is set now check if sucess or not i.e. if 1 means success and 0 means error 
	if( $_SESSION['success'] == 1 ){
		// storing the success message variable in $msg
		$msg = "Appoinment Request Submitted..";
	}
	else{
		// storing the unsuccess message variable in $msg
		$msg = "Appoinment Request Submission Error Try Again..";
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
	<link rel="stylesheet" type="text/css" href="css/custom_navigation.css">
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

		
		<a href="user_appoinments_list.php">
			<span  class="custom" style="margin-left: 69%;"> Appoinment list </span>
		</a> 
		<a href="user_cancel_appoinment.php">
			<span  class="custom" style="margin-left: 79%;"> Cancel Appoinment</span>
		</a>
		<a href="logout.php">
			<span  class="custom" style="margin-left: 91%;"> Logout</span>
		</a>
		<div class="welcome-text">
			<center>
				<h1> Welcome <?=$_SESSION['user_first_name']; ?> </h1>

				<center>
			<h2 style="color: green;"> <?= $msg;  ?> </h2>
		</center>

				<h2>Appointment Request</h2>
			</center>

			<!-- here is the login form for public section -->
			<div class="fom-div">
				  <form action="" method="post">    
				    <label for="fname">Subject</label>
				    <input type="text" id="fname" name="subject" placeholder="Subject" required="">

				    <label for="fname">Message</label><br>
				    <textarea rows="7" cols="65" name="message" placeholder="type message" required=""></textarea><br>

				    <label for="fname">Appoinment Date</label>
				    <input type="date" id="fname" name="date" placeholder="email" required="">
				    <input type="submit" value="Request Appoinment">
				  </form>
			</div>

		</div>



	

</body>
</html>
<!-- unset the session succeess index  -->
<?php  unset($_SESSION['success']); ?>