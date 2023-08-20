<?php
session_start();
include("../../app/database/connect.php");

if (isset($_GET['event_id'])){
	$id = $_GET['event_id'];

   $query = "DELETE FROM events WHERE event_id ='$id'";
   //execute query 
   $result = mysqli_query($conn, $query);

	if($result == TRUE) {
		$_SESSION['message'] =  "Event Deleted successfully.";
		$_SESSION['type'] = 'success';
		header('location: index.php');
	}else{
		echo "Error:" ;
	}
}

?>