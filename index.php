<?php
include("app/database/user.php");

if (!isset($_SESSION['username'])) {
    $_SESSION['message'] = "You have to log in first";
    header('location: login.php');
}
//VIEW NOTICE
	
$query = "SELECT * FROM notice ORDER BY created_alt DESC";
//execute query 
$result = mysqli_query($conn, $query);

$query = "SELECT * FROM events ORDER BY created_alt DESC";
//execute query 
$res = mysqli_query($conn, $query);

$query = "SELECT * FROM depts";
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
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<!--Google fonts-->
		<link href="https://fonts.googleapis.com/css?family-Candal|Lora" rel="stylesheet">
		<title>Online Notice Board</title>
</head>
<body>
<header>
	    <div class="logo">
		<h1 class="logo-text"><span>Online </span>Notice Board</h1>
		</div>
		  <i class="fa fa-bars menu-toggle"></i>
		  <ul class="nav">
		  <li><a href="index.php">Home</a></li>
		  <li><a href="users/welcome.php">Dashboard</a></li>
		  <li><a href="#">Services</a></li>
			
		  <li>
		  		<a href="#">
		  		  <i class="fa fa-user"></i>
					<?php  if (isset($_SESSION['username'])) : ?>
             
                    <?php echo $_SESSION['username']; ?>
 
                    <?php endif ?>
		  		  <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
		  	    </a>
		  		<ul>
		  	        <li><a href="logout.php" class="logout"> Logout</a></li>
		  	    </ul>
		  	</li>
		  </ul>
	  </header>

	  <!--Admin Page Wrapper-->
	<!--Page Wrapper-->
	<div class="page-wrapper">
       
       <!--Post Slider-->
        <div class="post-slider">
        	<h1 class="slider-title">Upcoming Events</h1>
        	<i class="fas fa-chevron-left prev"></i>
        	<i class="fas fa-chevron-right next"></i>                                    

           	<div class="post-wrapper">
			   <?php
				      if ($res->num_rows > 0){
						  while ($row = $res->fetch_assoc()){
                   ?>
						<div class="post">
           			<img src="<?php echo 'assets/images/'. $row['image']; ?>" alt="" class="slider-image">
           			<div class="post-info">
           				<h3><a href="single_event.php?event_id=<?php echo $row['event_id']?>"><?php echo $row['subject']; ?></a></h3>
           				&nbsp;
           				<i class="far fa-calender"><?php echo date('F j,Y',strtotime($row['created_alt'])); ?></i>

           	        </div>
           	    </div>	
					<?php  }
					  }
				   ?>
           	    

            </div>
<!--//Post Slider-->

<!--Content-->
	<div class="content clearfix">

	<!--Main Content-->
    	<div class="main-content">
    		<h1 class="recent-notice-title"> Recent Notices</h1>
                
			<?php
			 if ($res->num_rows > 0){
                while($row=mysqli_fetch_array($result)){
			     ?>
				<div class="notice">
				   <img src="<?php echo 'assets/images/'. $row['image']; ?>" alt="" class="post-image">
			     	    <div class="post-review">
    				       <h2><a href="single.php?id=<?php echo $row['id']?>"><?php echo $row['subject']; ?></a></h2>
    				         &nbsp;    
						   <i class="far fa-calender"><?php echo date('F j,Y',strtotime($row['created_alt'])); ?></i>
    				          <p class="preview-text">
    				          <?php echo substr($row['description'],0,150) . '...' ?> 
    				          </p>
    				       <a href="single.php?id=<?php echo $row['id']?>" class="btn read-more">Read More</a>
						</div>
				</div>	
					 <?php
					 }

    		    }
    	  ?>
    		
    	</div>
       <!-- //Main Content-->

    	<div class="sidebar">

    	</div>

    </div>
<!-- //Content-->

	</div>
	<!-- //Post Wrapper-->

	<?php include("app/includes/footer.php"); ?>
	
</body>
</html>