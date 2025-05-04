<?php

// Name: Ahsan Ul Kabir College Project
	// https://github.com/ahsanuk    
	// https://www.linkedin.com/in/ahsanuk/

session_start();

if(!isset($_SESSION['admin_user'])){

        header('Location: admin_login.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
</head>
<body>

	<h1>Welcome admin</h1>

	<center> <h3> <a href="admin_logout.php"> Logout </a>  </h3> </center>

</body>
</html>
