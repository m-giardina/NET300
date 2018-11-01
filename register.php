<?php
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'phpmyadmin', 'toor', 'chatter');

		$name = $con->real_escape_string($_POST['name']);
		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);

		if ($password != $cPassword)
			$msg = "Please Check Your Passwords!";
		else {
			$hash = password_hash($password, PASSWORD_BCRYPT);
			$con->query("INSERT INTO users (name,email,password) VALUES ('$name', '$email', '$hash')");
			$msg = "You have been registered!";
			header("Location: ./login.php");
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatter - Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel = "stylesheet" type = "text/css" href = "chatterhome.css" />
</head>
<body>
	<div class="topnav">
	    <div class="image">
	        <img src="./background.png" class="responsive">
	        <h1>Chatter Registration</h1>
					<a href="index.php">Home</a>
		  </div>
	</div>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<?php if ($msg != "") echo $msg . "<br><br>"; ?>

				<form method="post" action="register.php">
					<input class="form-control" minlength="3" name="name" placeholder="Name..." required><br>
					<input class="form-control" name="email" type="email" placeholder="Email..." required><br>
					<input class="form-control" minlength="5" name="password" type="password" placeholder="Password..." required><br>
					<input class="form-control" minlength="5" name="cPassword" type="password" placeholder="Confirm Password..." required><br>
					<input class="btn btn-primary" name="submit" type="submit" value="Register..."><br>
				</form>

			</div>
		</div>
	</div>
</body>
</html>
