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
		
		<title>Admin section - Update Profile</title>
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
				<li><a href="../users/index.php">Manage Users</a></li>
				<li><a href="index.php">Update Profile</a></li>
				<li><a href="../feedback/index.php">User Feedback</a></li>
	  			
	  		</ul>
	  		
	  	</div>
<!-- //Left Sidebar-->

	  	<!--Admin Content-->
	  	<div class="admin-content">

	  		<div class="content">

	  			<h2 class="admin-title">Update Profile</h2>
				  <?php include("../../app/includes/messages.php");?>

	  			<table>
	  		 	<thead>
				   <tr>
	  		 		<th>SN</th>
	  		 		<th>Username</th>
	  		 		<th>Email</th>
					<th>Action</th>
				   </tr>
	  		 	</thead>
	  		 	<tbody>
				   <?php
                       $currentUser = $_SESSION['username'];
                       $query = "SELECT * FROM users WHERE username = '$currentUser'";

                         //execute query 
                        $results = mysqli_query($conn, $query);
                    if ($results) {
						if ($results->num_rows > 0){
							while ($row = $results->fetch_assoc()){
					 ?>
							  <tr>
							  <td><?php echo $row['user_id']; ?></td>
							  <td><?php echo $row['username']; ?></td>
							  <td><?php echo $row['email']; ?></td>	
				              <td><a href="update.php?user_id=<?php echo $row['user_id']; ?>" class="edit">Edit</a></td>
							  </tr>
  
					  <?php  }
						}
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