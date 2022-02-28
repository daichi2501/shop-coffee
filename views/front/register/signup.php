<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="icon" href="./assets/image/NoNameee-01.png" type="image/png" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body style="background-image: url('./assets/image/microsoft.jpg');">
	<div class="form_register container mt-5 mb-5">
		<div class="container">
			<form method="POST" class="pb-4">
				<div class="text-center">
					<img class="logo img-fluid m-auto" src="./assets/image/NoName-01.png">
				</div>
				<div class="d-flex">
					<div class="form-group col-8 pl-0">
						<label for="name">Full Name <span class="text-danger">*</span></label>
						<input type="text" class="form-control" placeholder="Enter your name" name="fullname" required>
					</div>
					<div class="form-group col-4 pr-0">
						<label for="birthday">Birthday <span class="text-danger">*</span></label>
						<input required="birthday" type="date" class="form-control" placeholder="Enter your name" id ="dob" name="dob">
					</div>
				    <!-- <div class="col-5 pr-0 d-flex flex-column">
				    	<label class="mb-3">Gender:</label>
				    	<div>
				    		<div class="pretty p-default p-round">
						        <input type="radio" name="radio1">
						        <div class="state">
						            <label><i class="fas fa-male"></i></label>
						            
						        </div>
						    </div>

						    <div class="pretty p-default p-round">
						        <input type="radio" name="radio1">
						        <div class="state">
						            <label>Female</label>
						            <i class="fas fa-female"></i>
						        </div>
						    </div>

						    <div class="pretty p-default p-round">
						        <input type="radio" name="radio1">
						        <div class="state">
						            <label>Special</label>
						        </div>
						    </div>
				    	</div>
				    </div> -->
				</div>
				<div class="d-flex">
					<div class="form-group col-8 pl-0">
						<label for="email">Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="email">
					</div>
					<div class="form-group col-4 pr-0">
						<label for="phone">Phone <span class="text-danger">*</span></label>
						<input type="text" class="form-control"  placeholder="Enter your phone" name="phone" required>
					</div>
				</div>
				<div class="form-group">
					<label for="address">Address <span class="text-danger">*</span></label>
					<input type="text" class="form-control"  placeholder="Enter your address" name="address" required>
				</div>
				<div class="form-group">
					<label for="username" class="font-weight-bold">User Name <span class="text-danger">*</span></label>
					<input type="text" class="form-control"  placeholder="Enter username" name="username" required>
				</div>
				<div class="form-group">
					<label for="pwd" class="font-weight-bold">Password <span class="text-danger">*</span></label>
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
				</div>
				<div class="form-group">
					<label for="pwd" class="font-weight-bold">Confirm password <span class="text-danger">*</span></label>
					<input type="password" class="form-control" id="pwd" placeholder="Confirm password" name="confirmPassword" required>
				</div>
				<button type="submit" class="btn btn-dark register mt-3">Register</button>
			</form>
		</div>
	</div>
</body>
</html>