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
		<title>User section - User Feedback</title>
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
				<li><a href="../profile/index.php">Update Profile</a></li>
				<li><a href="index.php">Send Feedback</a></li>
	  		</ul>
	  		
	  	</div>
<!-- //Left Sidebar-->

	  	<!--Admin Content-->
	  	<div class="admin-content">

	  		<div class="content">

	  			<h2 class="admin-title">Send Feedback</h2>

				  <?php include("../../app/includes/messages.php");?>

				  <!--starting php code-->
				  <?php
	//ADD USER
	if(isset($_POST['send_feedback'])) {
    
		//receive input values from the form
		$username = $_POST['username'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message= $_POST['message'];
		
		$to_email = $_POST['email'];
	    $headers="From: ".$email;
	    $email_subject = "User Feedback";
	    $email_body ="Username: ".$username."\r\n"."Subject: ".$subject."\r\n"."Message: ".$message;
	    
		mail($to_email,$email_subject,$email_body,$headers);
	
	//form validation
	if (empty($username)) {
		array_push($errors, "Username is required ");  
	}
	else if (empty($email)) {
		array_push($errors, "Email is required ");  
	}
	else if (empty($subject)) {
		array_push($errors, "Subject is required ");  
	}
	else if (empty($message)) {
		array_push($errors, "Message is required ");  
	}

if (count($errors) == 0) {
		$query = "INSERT INTO feedback (username, email, subject, message) 
					  VALUES('$username', '$email','$subject','$message')";
		mysqli_query($conn, $query);
        $_SESSION ['message'] = "Message sent successfully!! "; 
        $_SESSION['type'] = "success";
        header('location: index.php');
}
}
?>
<!--//End of php code-->
	  			<form action="index.php" method="post">
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
			           <label>Subject</label>
			           <input type="text" name="subject" class="text-input" value="<?php echo $subject; ?>">
			        </div>
			        <div>    
			            <label>Message</label>
			            <input type="text" name="message" class="text-input">
		            </div>
		           
	  				<div>
	  					<button type="submit"  name="send_feedback" class="btn btn-big">Send Feedback</button>
	  				</div>
	  				
	  			</form>

	  		</div>
	
	  	</div>
	  	<!-- //Admin Content-->

	  </div>
	  <!-- //Admin Page Wrapper-->

</body>
</html>