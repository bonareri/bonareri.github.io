<?php
include("../../app/database/connect.php");

if (isset($_GET['event_id'])){
	$id = $_GET['event_id'];
	$_SESSION['success'] = "";

   $query = "SELECT FROM events WHERE event_id ='$id'";
   //execute query 
   $result = mysqli_query($conn, $query);
   $image = mysqli_fetch_assoc($result);
   $filepath = 'images/' . $image['name'];

   if (file_exists($filepath)) {
	   header('Content-Type: application/octet-stream');
	   header('Content-Description: File Transfer');
	   header('Content-Disposition: attachment; filename=' . basename($filepath));
	   header('Expires: 0');
	   header('Cache-Control: must-revalidate');
	   header('Program:public');
	   header('Content-Length:' . filesize('images/'.$image['image']));
	   readfile('images/'.$image['name']);

	   $newCount = $file['downloads']+1;
	   $updateQuery = "UPDATE events SET file=$newCount WHERE event_id=$id";
	   mysqli_query($conn,$updateQuery);
	   exit; 
   }

	
}

?>