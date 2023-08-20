<?php
include("../../app/database/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!--Font Awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<!--Custom Styling-->
		<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
		<!--Admin Styling-->
		<link rel="stylesheet" type="text/css" href="../../assets/css/admin.css">
		<!--Google fonts-->
		<link href="https://fonts.googleapis.com/css?family-Candal|Lora" rel="stylesheet">
		<title>Admin section - Add Users</title>
</head>
<body>
<?php include("../../app/includes/adminheader.php"); ?>



	  <!--Admin Page Wrapper-->
	  <div class="admin-wrapper">
	  	
	  	<!--Left Sidebar-->
	  	<div class="left-sidebar">
	  		<ul>
			    <li><a href="../notice/index.php">Manage Notices</a></li>
				<li><a href="../events/index.php">Manage Events</a></li>
				<li><a href="index.php">Manage Users</a></li>
				<li><a href="../profile/index.php">Update Profile</a></li>
				<li><a href="../feedback/index.php">User Feedback</a></li>
	  		</ul>
	  		
	  	</div>
	  	<!-- //Left Sidebar-->

	  	<!--Admin Content-->
	  	<div class="admin-content">

	  		<div class="content">

	  			<h2 class="admin-title">Add User</h2>
				  <!--starting php code-->
				  <?php
	//ADD USER
	if(isset($_POST['add_user'])) {
    
		//receive input values from the form
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 =  $_POST['password_2'];
		$role = $_POST['role'];
		
		//$to_email = $_POST['email'];
	    $headers="From:  Administrator <melodybonareri123@gmail.com>";
	    $email_subject = "User Account Creation";
	    $email_body ="Username ".$username."\r\n"."Your account has been created, login to change your password. 
		Your login credentials are: Username ".$username."\r\n"."Password ".$password_1;
	    
		mail($email,$email_subject,$email_body,$headers);
	//form validation
	if (empty($username)) {
		array_push($errors, "Username is required ");  
	}
	else if (!preg_match ("/^[a-zA-Z\s]+$/",$username)) {
		array_push($errors, "Enter username as string only");
	 }
	else if (empty($email)) {
		array_push($errors, "Email is required ");  
	}
	else if (empty($password_1)) {
		array_push($errors, "Password is required ");  
	}
     else if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
    }
	else if (empty($role)) {
		array_push($errors, "Role is required ");  
	}
	
if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
		$query = "INSERT INTO users (username, email, password, role) 
					  VALUES('$username', '$email', '$password','$role')";
		mysqli_query($conn, $query);
        $_SESSION ['message'] = "User added successfully!! "; 
        $_SESSION['type'] = "success";
        header('location: index.php');
}
}
?>
<!--//End of php code-->
	  			<form action="create.php" method="post">
				  <?php include("../../app/database/errors.php"); ?>
	  				<div>
			          <label>Username</label>
			          <input type="text" name="username" class="text-input" value="<?php echo $username; ?>">
		            </div>
		            <div>
			           <label>Email</label>
			           <input type="email" name="email" class="text-input" value="<?php echo $email; ?>">
			        </div>
			        <div>    
			            <label>Password</label>
			            <input type="password" name="password_1" class="text-input">
		            </div>
		            <div>
			            <label>Confirm Password</label>
			            <input type="password" name="password_2" class="text-input">
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
	  					<button type="submit"  name="add_user" class="btn btn-big">Add User</button>
	  				</div>
	  				
	  			</form>

	  			
	  		</div>
	
	  	</div>
	  	<!-- //Admin Content-->

	  </div>
	  <!-- //Admin Page Wrapper-->

<!--JQuery-->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--Custom Script-->
      <script src="../../js/script.js"></script> 
</body>
</html>