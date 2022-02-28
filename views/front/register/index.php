<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="./assets/image/NoNameee-01.png" type="image/png" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="./assets/css/styleLogin.css">
	
</head>
<body style="background-image: url('./assets/image/microsoft.jpg');">
	<div class="form_login container">
		<div class="container">
			<form method="POST">
				<div class="text-center">
					<img class="logo img-fluid m-auto" src="./assets/image/NoNamee-01.png">
				</div>
				<div class="form-group">
					<i class="fas fa-user"></i>
					<label for="username">User Name:</label>
					<input type="text" class="form-control"  placeholder="Enter username" name="username">
				</div>
				<div class="form-group">
					<i class="fas fa-lock"></i>
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Remember me</label>	
				</div>
				<div class="container-fluid text-center">
					<a href="?controller=register&action=signup">
						<button type="button" class="mt-4 mr-3 signUp btn btn-dark">Sign Up</button>
					</a>
					<button type="submit" class="mt-4 ml-3 signIn btn btn-dark">Sign In</button>
				</div>
				
			</form>
		</div>
	</div>
</body>
