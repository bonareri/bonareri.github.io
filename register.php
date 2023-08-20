<?php
include('app/database/user.php');
?>

<!DOCTYPE html>
<html>
<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!--Font Awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<!--Custom Styling-->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<!--Google fonts-->
		<link href="https://fonts.googleapis.com/css?family-Candal|Lora" rel="stylesheet">
		<title>Register</title>
</head>
<body>

<header>
	    <div class="logo">
		    <h1 class="logo-text"><span>Online </span>Notice Board</h1>
		  </div>
		  <i class="fa fa-bars menu-toggle"></i>
		  <ul class="nav">
		  	<li><a href="register.php">Sign Up</a></li>
		  	<li><a href="login.php">Login</a></li>
		  </ul>
	  </header>
    
<div class="auth-content">

	<form action="register.php" method="post">
	<?php include('app/database/errors.php'); ?>
		<h2 class="form-title">Register</h2>

			
			<div>
			   <label>Username</label>
			   <input type="text" name="username" class="text-input" value="<?php echo $username ?>">
		    </div>
		    <div>
			    <label>Email</label>
			    <input type="email" name="email" class="text-input" value="<?php echo $email ?>" >
			</div>
			<div>    
			    <label>Password</label>
			    <input type="password" name="password_1" class="text-input" value="<?php echo $password_1 ?>">
		    </div>
		    <div>
			    <label>Confirm Password</label>
			    <input type="password" name="password_2" class="text-input" value="<?php echo $password_2 ?>">
			</div>  
			<div>
			    <label>Select Role</label>
			    <select name="role" class="text-input">
				<option value="">Select Role</option> 
			    <option value="student">Student</option> 
			    <option value="admin">Admin</option> 
            </select>
			</div>  
			<div>
			    <button type="submit" name="reg_user" class="btn btn-big">Register</button>
			</div>
			<p>Alredy a member? <a href="login.php">Sign In</a></p>   
			
	</form>
	
</div>

</body>
</html>