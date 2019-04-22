<?php require 'connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php
// If form submitted, insert values into the database.
	if (isset($_REQUEST['username'])){
	 // removes backslashes
		$username = stripslashes($_REQUEST['username']);
   //escapes special characters in a string
		$username = mysqli_real_escape_string($conn,$username); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
		$trn_date = date("Y-m-d H:i:s");

		$query = "insert into users (username,email,password,trn_date) values('$username','$email','$password','$trn_date')";
		$result = mysqli_query($conn, $query);

		if($result){
			echo "<div class='form'>
			<h3>You are registered successfully.</h3>
			<br>Click here to <a href='login.php'>Login</a></div>";
					}
				}else{
	?>

	<div class="form">
		<div class="form-main-heading"><strong>Admin</strong>LTE</div>
		<form name="registration" action="" method="post">
			<input type="text" name="username" placeholder="Username">
			<input type="email" name="email" placeholder="E-mail">
			<input type="password" name="password" placeholder="Password">
			<input type="checkbox" name="vehicle1" value="Bike" class="checkbox"><span class="remember-me">I agree to the terms</span>
			<input name="submit" type="submit" value="Register">
		</form>		
	</div>				
	<?php } ?>	


</body>
</html>
