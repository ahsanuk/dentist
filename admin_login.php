<?php

// Name: Ahsan Ul Kabir College Project
	// https://github.com/ahsanuk    
	// https://www.linkedin.com/in/ahsanuk/

session_start();

if(isset($_SESSION['admin_user'])){
    header("Location: admin_dashboard.php");
    die();
}



?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="form.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">
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


 <div style="margin-left: 30%; margin-right: 30%;">
        
        <center><h2>Admin Form</h2></center>

        <form action="admin_validation.php" method="post">
          

          <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="admin_user" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
                
            <button type="submit">Login</button>
            <input type="checkbox" checked="checked"> Remember me </input>
            <h3> <strong>Username:</strong> admin </h3>
            <h3> <strong>Password:</strong> admin </h3>
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn"><a href="staff_section.php">Cancel</a></button>
            <span class="psw">Forgot <a href="#">password?</a></span> 
          </div>
        </form>

</div>
</body>
</html>
