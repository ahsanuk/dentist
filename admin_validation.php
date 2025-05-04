<!-- following file is for admin validation purpose -->

<?php
session_start();

// Name: Ahsan Ul Kabir College Project
	// https://github.com/ahsanuk    
	// https://www.linkedin.com/in/ahsanuk/

// // check if admin session is set or not
if(isset($_SESSION['admin_user'])){
    header("Location: admin_dashboard.php");
    die();
}
// // checking if request method is post
if( $_SERVER['REQUEST_METHOD'] === "POST" ){

	if(isset($_POST['admin_user']) && isset($_POST['password']) ){
		// including database file for database connection
		include 'database_connection.php';

		$stmt = $conn->prepare("SELECT username, password FROM admin WHERE username = ? AND password = ?");
		$stmt->execute([ $_POST['admin_user'] , $_POST['password'] ]);
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		if( $stmt->rowCount() > 0 ){

				$_SESSION['admin_user'] = $_POST['admin_user'];
				header('Location: admin_dashboard.php');
		}
		else{
			header('Location: admin_login.php');
		}
	}
	else{
		header('Location: admin_login.php');
	}


}
// // request method get
else{
	header('Location: admin_login.php');
}
