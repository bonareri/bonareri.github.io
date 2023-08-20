<?php
include("../../app/database/db.php");
//VIEW NOTICE
	
$query = "SELECT * FROM notice ORDER BY created_alt DESC";
//execute query 
$results = mysqli_query($conn, $query);

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
		<title>Admin section - Manage Notices</title>
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
	  		<div class="button-group">
	  			<a href="create.php" class="btn btn-big">Add Notice</a>
	  			<a href="index.php" class="btn btn-big">Manage Notice</a>
	  		</div>

	  		<div class="content">

	  			<h2 class="admin-title">Manage Notice</h2>
				  <?php include("../../app/includes/messages.php");?>
				  
	  			<table>
	  		 	<thead>
				   <tr>
	  		 		<th>SN</th>
	  		 		<th>Subject</th>
	  		 		<th>Description</th>
					<th>Files</th>
					<th>Post Date</th>

	  		 		<th colspan="2">Action</th>
				   </tr>
	  		 	</thead>
	  		 	<tbody>
				   <?php
				     $count = 1;
				      if ($results->num_rows > 0){
						  while ($row = $results->fetch_assoc()){
                   ?>
							<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo $row['subject']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo $row['file']; ?></td>
							<td><?php echo date('d-m-y',strtotime($row['created_alt'])); ?></td>
							<td><a href="update.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a></td>
							<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a></td>					
						    </tr>

					<?php   $count++;}
					  }
				   ?>
	  		 	
	  		 	</tbody>
	  		 </table>

	  		</div>
	
	  	</div>
	  	<!-- //Admin Content-->

	  </div>
	  <!-- //Admin Page Wrapper-->

</body>
</html>