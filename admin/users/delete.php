<?php
session_start();
include("../../app/database/db.php");

if (isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];

   $query = "DELETE FROM users WHERE user_id ='$user_id'";
   array_push($errors, "Are you sure?");
   //execute query 
   $result = mysqli_query($conn, $query);

	if($result == TRUE) {
		$_SESSION['message'] =  "User Deleted successfully.";
		$_SESSION['type'] = 'success';
		header('location: index.php');
	}else{
		echo "Error:" ;
	}
}

?>