<!-- following file is for doctor validation purpose -->

<?php
session_start();

// // check if doctor session is set or not
if(isset($_SESSION['doctor_user'])){
		// session is set redirect to doctor home
        header('Location: doctor_appoinment_operation.php');
}
// // checking if request method is post
if( $_SERVER['REQUEST_METHOD'] === "POST" ){

	if(isset($_POST['doctor_user']) && isset($_POST['password']) ){
		// including database file for database connection
		include 'database_connection.php';

		$stmt = $conn->prepare("SELECT * FROM doctors WHERE email = ? AND password = ?");
		$stmt->execute([ $_POST['doctor_user'] , $_POST['password'] ]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC); 

		if( $stmt->rowCount() > 0 ){
			// email and password is matched with request parameter so authentication is successful
				$_SESSION['doctor_user'] = $_POST['doctor_user'];
				$_SESSION['doctor_name'] = $result['first_name'];
				header('Location: doctor_appoinment_operation.php');
		}
		else{
			// authentication fail
			header('Location: doctor_login.php');
		}
	}
	else{
		// request parameter not set properly 
		header('Location: doctor_login.php');
	}


}
// // request method get
else{
	header('Location: doctor_login.php');
}