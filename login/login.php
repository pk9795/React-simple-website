<?php 

session_start();
require 'connect.php'; 

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<?php 
	// If form submitted, insert values into the database.
	if (isset($_POST['username'])){

		// removes backslashes
		$username = stripslashes($_REQUEST['username']);
   		//escapes special characters in a string
		$username = mysqli_real_escape_string($conn,$username); 
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
	

		$query = "SELECT * FROM users WHERE username='$username'
		and password='$password'";
		
		$result = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($result);

		if($rows == 1){
			$_SESSION['username'] = $username;

			// redirect user to index.php
			header("location:index.php");
		}else{
			echo "<div class='form'>
			<h3>Username/password is incorrect.</h3>
			<br/>Click here to <a href='login.php'>Login</a></div>";
		}
	}else{
		?>
		<div class="form">
			<div class="form-main-heading"><strong>Admin</strong>LTE</div>
			<form action="" method="post" name="login">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				 <input type="checkbox" name="vehicle1" value="Bike" class="checkbox"><span class="remember-me">Remember Me</span>
				<input name="submit" type="submit" value="Login">
			</form>
			<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
		</div>
	<?php } ?>


</body>
</html>