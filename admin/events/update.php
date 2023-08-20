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
		<title>Admin section - Update Events</title>
</head>
<body>
<?php include("../../app/includes/adminheader.php"); ?>
   
	  <!--Admin Page Wrapper-->
	  <div class="admin-wrapper">
	  	
	  	<!--Left Sidebar-->
	  	<div class="left-sidebar">
	  		<ul>
	  		    <li><a href="../notice/index.php">Manage Notices</a></li>	  		
	  			<li><a href="index.php">Manage Events</a></li>
				<li><a href="../users/index.php">Manage Users</a></li>
				<li><a href="../profile/index.php">Update Profile</a></li>
				<li><a href="../feedback/index.php">User Feedback</a></li>
	  		</ul>
	  		
	  	</div>
	  	<!-- //Left Sidebar-->


	  	<!--Admin Content-->
<div class="admin-content">

	  		<div class="content">

<h2 class="admin-title">Update Events</h2>
 <!--starting php code-->
 <?php
//EDIT NOTICE
if(isset($_POST['update_event'])){
	$id = $_POST['event_id'];
	$subject =  $_POST['subject'];
	$description = $_POST['description'];
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

if (count($errors) == 0) {
	
	$query = "UPDATE events SET subject='$subject', description='$description',
	 file='$file_name' WHERE event_id='$id'";
			   
	$results = mysqli_query($conn, $query);
        $_SESSION ['message'] = "Event updated successfully!! "; 
        $_SESSION['type'] = "success";
        header('location: index.php');
}
}

 if (isset($_GET['event_id'])){
	$id = $_GET['event_id'];

   $query = "SELECT * FROM events WHERE event_id ='$id'";
   //execute query 
   $result = mysqli_query($conn, $query);

if ($result->num_rows > 0){

  while ($row = $result->fetch_assoc())
  {
	  $subject = $row['subject'];
	  $description = $row['description'];

	  $id = $row['event_id'];
  }
} else{
	header('location: index.php');
}
}


?>
<!--//End of php code-->


	  			<form action="update.php" method="post" enctype="multipart/form-data">
				  <?php include("../../app/database/errors.php"); ?>
				  <input type="hidden" name="event_id" value="<?php echo $id; ?>">
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
	  					<button type="submit" name="update_event" class="btn btn-big">Update Event</button>
	  				</div>
	  				
	  			</form>

	  			
	  		</div>
	
	  	</div>
          	<!-- //Admin Content-->

     </div>
	  <!-- //Admin Page Wrapper-->

</body>
</html>
  
	  			

