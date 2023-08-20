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
		<title>Admin section - Update Users</title>
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

	  			<h2 class="admin-title">Update User</h2>
				  <!--starting php code-->
				  <?php
	//EDIT USER
if(isset($_POST['update_user'])){
	$id = $_POST['user_id'];
	$username =  $_POST['username'];
	$email = $_POST['email'];
	$password_1 = $_POST['password_1'];
	$password_2 =  $_POST['password_2'];
	$role = $_POST['role'];
	$headers="From:  Administrator <melodybonareri123@gmail.com>";
	$email_subject = "User Account Update";
	$email_body ="Username ".$username."\r\n"."Your account has been updated, login to change your password. 
	Your login credentials are: Username ".$username."\r\n"."Password ".$password_1;
	
	mail($email,$email_subject,$email_body,$headers);

	//form validation
	if (empty($username)) {
		array_push($errors, "Username is required ");  
	}
	if (empty($email)) {
		array_push($errors, "Email is required ");  
	}
	else if (empty($role)) {
		array_push($errors, "Role is required ");  
	}
	if (empty($password_1)) {
		array_push($errors, "Password is required ");  
	}if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}else{
    $password_1 = md5($password_1);
	//update query
	$query = "UPDATE users SET username='$username', email='$email', password='$password_1' WHERE user_id='$id'";
	$_SESSION ['message'] = "User updated successfully!! "; 
	$_SESSION['type'] = "success";

	//execute query
	$results = mysqli_query($conn, $query);
	
	header('location: index.php');
	}
}
 
 if (isset($_GET['user_id'])){
	$id = $_GET['user_id'];

   $query = "SELECT * FROM users WHERE user_id ='$id'";
   //execute query 
   $result = mysqli_query($conn, $query);

if ($result->num_rows > 0){

  while ($row = $result->fetch_assoc())
  {
	  $username = $row['username'];
	  $email = $row['email'];
	  $password = $row['password'];
	  $id = $row['user_id'];
  }
} else{
	header('location: index.php');
}
} 
?>
<!--//End of php code-->
	  			<form action="update.php" method="post">
				  <?php include("../../app/database/errors.php"); ?>
				  <input type="hidden" name="user_id" class="text-input" value="<?php echo $id; ?>">
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
	  					<button type="submit"  name="update_user" class="btn btn-big">Update User</button>
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