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
		<title>Admin section - Update Notice</title>
</head>
<body>
<?php include("../../app/includes/userheader.php"); ?>

	  <!--Admin Page Wrapper-->
	  <div class="admin-wrapper">
	  	
	  	<!--Left Sidebar-->
		  <div class="left-sidebar">
	  		<ul>
			    <li><a href="../notice/index.php">View Notices</a></li>
				<li><a href="../events/index.php">View Events</a></li>
				<li><a href="index.php">Update Profile</a></li>
	  			
	  		</ul>
	  		
	  	</div>
	  	<!-- //Left Sidebar-->


	  	<!--Admin Content-->
<div class="admin-content">

	  		<div class="content">

<h2 class="admin-title">Update Profile</h2>
 

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
	  					<button type="submit"  name="update_profile" class="btn btn-big">Update Profile</button>
	  				</div>
	  				
	  			</form>


	  			
	  		</div>
	
	  	</div>
          	<!-- //Admin Content-->

     </div>
	  <!-- //Admin Page Wrapper-->

</body>
</html>
  
	  			

