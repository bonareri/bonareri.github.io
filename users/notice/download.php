<?php
include("../../app/database/connect.php");

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$_SESSION['success'] = "";

   $query = "SELECT FROM notice WHERE id ='$id'";
   //execute query 
   $result = mysqli_query($conn, $query);
   $file = mysqli_fetch_assoc($result);
   $filepath = 'uploads/' . $file['name'];

   if (file_exists($filepath)) {
	   header('Content-Type: application/octet-stream');
	   header('Content-Description: File Transfer');
	   header('Content-Disposition: attachment; filename=' . basename($filepath));
	   header('Expires: 0');
	   header('Cache-Control: must-revalidate');
	   header('Program:public');
	   header('Content-Length:' . filesize('uploads/'.$file['name']));
	   readfile('uploads/'.$file['name']);

	   $newCount = $file['downloads']+1;
	   $updateQuery = "UPDATE notice SET file=$newCount WHERE id=$id";
	   mysqli_query($conn,$updateQuery);
	   exit; 
   }

	
}

?>