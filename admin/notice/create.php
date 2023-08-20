
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
		<title>Admin section - Add Notice</title>
</head>
<body>
<?php include("../../app/includes/adminheader.php"); ?>
	  <!--Admin Page Wrapper-->
	  <div class="admin-wrapper">
	  	
	  	<!--Left Sidebar-->
	  	<div class="left-sidebar">
	  		<ul>
			    <li><a href="index.php">Manage Notices</a></li>	  		
	  			<li><a href="../events/index.php">Manage Events</a></li>
				<li><a href="../users/index.php">Manage Users</a></li>
				<li><a href="../profile/index.php">Update Profile</a></li>
				<li><a href="../feedback/index.php">User Feedback</a></li>
	  		</ul>
	  		
	  	</div>
	  	<!-- //Left Sidebar-->

	  	<!--Admin Content-->
	  	<div class="admin-content">

	  		<div class="content">
<?php
			  //ADD NOTICE
if(isset($_POST['add_notice'])) {
	//receive input values from the form
	//escape special characters if any for use in the SQL query
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$file_name = $_FILES['file'];


	if (!empty($_FILES['file']['name'])) {
		$file_name = time().''.$_FILES['file']['name'];
		$destination = "../../assets/uploads/". $file_name;

		$result = move_uploaded_file($_FILES['file']['tmp_name'],$destination);
        
		if ($result) {
			$_POST['file'] = $file_name;
		}else {
			array_push($errors, "Failed to upload file"); 
		}

	}else{
		array_push($errors, "Notice File is required ");  
	}
	
	//form validation
	if(empty($subject)) { array_push($errors, "Subject is required "); }
	if(empty($description)) { array_push($errors, "Description is required"); }

//Add notice if there are no errors
if (count($errors) == 0) {
	
	$query = "INSERT INTO notice (subject, description, file)
	           VALUES('$subject','$description','$file_name')";
			   
	$results = mysqli_query($conn, $query);
        $_SESSION ['message'] = "Notice added successfully!! "; 
        $_SESSION['type'] = "success";
        header('location: index.php');
}
}
?>
	  			<h2 class="admin-title">Add Notice</h2> 

	  			<form action="create.php" method="post" enctype="multipart/form-data">
				  <?php include("../../app/database/errors.php"); ?>
	  				<div>
	  					<label>Subject</label>
	  					<input type="text" name="subject" class="text-input" value="<?php echo $subject; ?>">
	  				</div>
	  				<div>
	  					<label>Description</label>
	  					<textarea name="description" class="text-input"><?php echo $description; ?></textarea>	  					
	  				</div>
					<div>
	  					<label>Upload File</label>
	  					<input type="file" name="file" class="text-input">				
	  				</div>
	  				<div>
	  					<button type="submit" name="add_notice" class="btn btn-big">Add Notice</button>
	  				</div>
	  				
	  			</form>

	  			
	  		</div>
	
	  	</div>
	  	<!-- //Admin Content-->

	  </div>
	  <!-- //Admin Page Wrapper-->

</body>
</html>