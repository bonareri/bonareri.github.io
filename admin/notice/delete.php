<?php
session_start();
include("../../app/database/connect.php");

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$_SESSION['success'] = "";

   $query = "DELETE FROM notice WHERE id ='$id'";
   //execute query 
   $result = mysqli_query($conn, $query);

	if($result == TRUE) {
		$_SESSION['message'] =  "Notice Deleted successfully.";
		$_SESSION['type'] = 'success';
		header('location: index.php');
	}else{
		echo "Error:" ;
	}
}

?>