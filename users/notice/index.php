<?php
include("../../app/database/connect.php");

//VIEW NOTICE
	
$query = "SELECT * FROM notice ORDER BY created_alt DESC";
//execute query 
$results = mysqli_query($conn, $query);

if (isset($_GET['id'])) {
	$file_id = $_GET['id'];

	$sql = "SELECT * FROM notice WHERE id=$file_id";
	$result = mysqli_query($conn, $sql);

	$file = mysqli_fetch_assoc($result);
	$filepath = '../../assets/uploads/' . $file['file'];

	if (file_exists($filepath)) {
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=" . basename($filepath));
		header("Content-Transfer-Encoding: binary");

		readfile('../../assets/uploads/' . $file['file']);
		exit;
	}
	else {
		echo "file does not exist";
	}
}

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
		<title>User section - View Notices</title>
</head>
<body>
    
<?php include("../../app/includes/userheader.php"); ?>

	  <!--Admin Page Wrapper-->
	  <div class="admin-wrapper">
	  	
<!--Left Sidebar-->
<div class="left-sidebar">
	  		<ul>
	  			<li><a href="index.php">View Notices</a></li>
				<li><a href="../events/index.php">View Events</a></li>
	  			<li><a href="../profile/index.php">Update profile</a></li>
				<li><a href="../feedback/index.php">Send Feedback</a></li>
	  		</ul>
	  		
	  	</div>
<!-- //Left Sidebar-->

	  	<!--Admin Content-->
	  	<div class="admin-content">

	  		<div class="content">

	  			<h2 class="admin-title">View Notices</h2>

	  			<table>
	  		 	<thead>
				   <tr>
	  		 		<th>SN</th>
	  		 		<th>Subject</th>
	  		 		<th>Description</th>
					<th>Files</th>
					<th>Action</th>
					<th>Post Date</th>
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
							<td><a href="index.php?id=<?php echo $row['id']; ?>" class="post">Download</a></td>	
							<td><?php echo date('d-m-y',strtotime($row['created_alt'])); ?></td>
											
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