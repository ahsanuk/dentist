<!-- following file is for user validation purpose -->

<?php
session_start();

// // check if user session is set or not
if(isset($_SESSION['user'])){
		// session is set redirect to user home
        header('Location: appointments.php');
}
// // checking if request method is post
if( $_SERVER['REQUEST_METHOD'] === "POST" ){

	if(isset($_POST['user_email']) && isset($_POST['password']) ){
		// including database file for database connection
		include 'database_connection.php';

		$stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
		$stmt->execute([ $_POST['user_email'] , $_POST['password'] ]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC); 
		if( $stmt->rowCount() > 0 ){			
				$_SESSION['user'] = $result['first_name'];
				$_SESSION['user_first_name'] = $result['first_name'];
				$_SESSION['user_last_name'] = $result['last_name'];
				$_SESSION['user_email'] = $result['email'];
				$_SESSION['user_contact'] = $result['contact'];
				header('Location: user_appoinment_application.php');
				die();
		}
		else{
				header('Location: appointments.php');
				die();
		}
	}
	else{
			header('Location: appointments.php');
			die();
	}


}
// // request method get
else{
	header('Location: appointments.php');
}
