<?php

include('connect.php');

//initializing variables
$id = "";
$description = "";
$image = "";
$date = "";
$name = "";
$role= "";
$subject = "";
$errors = array();
$_SESSION['success'] = "";




// variable declaration
	$username = "";
	$email    = "";
	$password   = "";
	$errors = array(); 
	$_SESSION['success'] = "";	
	
	  //EDIT USER
  if(isset($_POST['update_profile'])){
	  $id = $_POST['user_id'];
	  $username =  $_POST['username'];
	  $email = $_POST['email'];
	  $password_1 = $_POST['password_1'];
	  $password_2 =  $_POST['password_2'];
	  
	  //form validation
	  if (empty($username)) {
		  array_push($errors, "Username is required ");  
	  }
	  if (empty($email)) {
		  array_push($errors, "Email is required ");  
	  }
	  if (empty($password_1)) {
		  array_push($errors, "Password is required ");  
	  }if ($password_1 != $password_2) {
		  array_push($errors, "The two passwords do not match");
	  }else{
	  $password_1 = md5($password_1);
	  //update query
	  $query = "UPDATE users SET username='$username', email='$email', password='$password_1' WHERE user_id='$id'";
	  $_SESSION ['message'] = "User updated successfully!! "; 
	  $_SESSION['type'] = "success";
  
	  //execute query
	  $results = mysqli_query($conn, $query);
	  
	  header('location: index.php');
	  }
  }
   
   if (isset($_GET['user_id'])){
	  $id = $_GET['user_id'];
  
	 $query = "SELECT * FROM users WHERE user_id ='$id'";
	 //execute query 
	 $result = mysqli_query($conn, $query);
  
  if ($result->num_rows > 0){
  
	while ($row = $result->fetch_assoc())
	{
		$username = $row['username'];
		$email = $row['email'];
		$password = $row['password'];
		$id = $row['user_id'];
	}
  } else{
	  header('location: index.php');
  }
  } 

	//UPDATE Password
	if(isset($_POST['update_password'])){
		$id = $_POST['user_id'];
		$oldpass = $_POST['oldpass'];
	    $newpass = $_POST['newpass'];
	    $conpass = $_POST['conpass'];

		$newpass = md5($newpass);
	   //update query
	   $query = "UPDATE users SET password='$newpass' WHERE user_id='$id'";
   
	   //execute query
	   $results = mysqli_query($conn, $query);
	   $_SESSION ['message'] = "Password updated successfully!! "; 
	   $_SESSION['type'] = "success";
	   header('location: index.php');
	  
   } 
	   if (isset($_GET['user_id'])){
		   $id = $_GET['user_id'];

		  $query = "SELECT * FROM users WHERE user_id ='$id'";
		  //execute query 
		  $result = mysqli_query($conn, $query);
	   
	   if ($result->num_rows > 0){
	   
		 while ($row = $result->fetch_assoc())
		 {
			 $username = $row['username'];
			 $newpass = $row['password'];
			 $id = $row['user_id'];
		 }
	   } else{
		   header('location: index.php');
	   }
	   } 

?>



