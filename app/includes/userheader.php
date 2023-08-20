<?php
session_start();
?>
<header>
	    <div class="logo">
		    <h1 class="logo-text"><span>User </span>Dashboard</h1>
		</div>
		  <i class="fa fa-bars menu-toggle"></i>
		  <ul class="nav">
		  <li><a href="../welcome.php">Home</a></li>
			
		  <li>
		  		<a href="#">
		  		  <i class="fa fa-user"></i>
					<?php  if (isset($_SESSION['username'])) : ?>
             
                    <?php echo $_SESSION['username']; ?>
 
                    <?php endif ?>
		  		  <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
		  	    </a>
		  		<ul>
		  	        <li><a href="../../logout.php" class="logout"> Logout</a></li>
		  	    </ul>
		  	</li>
		  </ul>
	  </header>

