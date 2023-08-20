<?php
include("../app/database/connect.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!--Font Awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<!--Custom Styling-->
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
		<!--Admin Styling-->
		<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
		<!--Google fonts-->
		<link href="https://fonts.googleapis.com/css?family-Candal|Lora" rel="stylesheet">
		<title>Admin section - Dashboard</title>
</head>
<body>

<header>
	    <div class="logo">
		    <h1 class="logo-text"><span>Online </span>Notice Board</h1>
		</div>
		  <i class="fa fa-bars menu-toggle"></i>
		  <ul class="nav">
		  <li><a href="welcome.php">Home</a></li>
			
		  <li>
		  		<a href="#">
		  		  <i class="fa fa-user"></i>
					<?php  if (isset($_SESSION['username'])) : ?>
             
                    <?php echo $_SESSION['username']; ?>
 
                    <?php endif ?>
		  		  <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
		  	    </a>
		  		<ul>
		  	        <li><a href="../logout.php" class="logout"> Logout</a></li>
		  	    </ul>
		  	</li>
		  </ul>
	  </header>


	  <!--Admin Page Wrapper-->
	  <div class="admin-wrapper">
	  	
	  	<!--Left Sidebar-->
	  	<div class="left-sidebar">
	  		<ul>
			    <li><a href="../users/notice/index.php">View Notices</a></li>
				<li><a href="../users/events/index.php">View Events</a></li>
				<li><a href="../users/profile/index.php">Update Profile</a></li>
				<li><a href="../users/feedback/index.php">Send Feedback</a></li>
	  		</ul>
	  		
	  	</div>
	  	<!-- //Left Sidebar-->

	  	<!--Admin Content-->
	  	<div class="admin-content">

	  		<div class="content">

                
	  			<h2 class="admin-title">Dashboard</h2>
                  <?php include("../app/includes/messages.php");?>
	  			
	  			
	  		</div>
	
	  	</div>
	  	<!-- //Admin Content-->

	  </div>
	  <!-- //Admin Page Wrapper-->

<!--JQuery-->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--Custom Script-->
      <script src="../js/script.js"></script> 
</body>
</html>