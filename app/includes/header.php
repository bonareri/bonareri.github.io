<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])){

?>
<header>
	    <div class="logo">
		    <h1 class="logo-text"><span>Online </span>Notice Board</h1>
		  </div>
		  <i class="fa fa-bars menu-toggle"></i>
		  <ul class="nav">
		  	<li><a href="index.php">Home</a></li>
		  	<li><a href="#">About</a></li>
		  	<li><a href="#">Services</a></li>
		  	<li>
		  		<a href="#">
		  		  <i class="fa fa-user"></i>
					Welcome, <?php echo $_SESSION['username']; ?>
		  		  <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
		  	    </a>
		  		<ul>
		  			<li><a href="#">Dashboard</a></li>
		  	    <li><a href="logout.php" class="logout">Logout</a></li>
		  	    </ul>
		  	</li>
		  </ul>
	  </header>
	  <?php
				}else{
					header("Location: index.php");
					exit();
				}
      ?>		  		