<?php 
include('connect.php');
session_start();
	

	// variable declaration
	$username = "";
	$email    = "";
    $password_1 = "";
	$password_2 = "";
	$role ="";
	$errors = array(); 
	$_SESSION['success'] = "";

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		
		// receive all input values from the form
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		$role = $_POST['role'];


		// form validation: ensure that the form is correctly filled
		if (empty($username)) {
			 array_push($errors, "Username is required");
			 }
		else if (!preg_match ("/^[a-zA-Z\s]+$/",$username)) {
				array_push($errors, "Enter username as string only");
			 }
		else if (empty($email)) {
				array_push($errors, "Email is required");
			}
		else if (empty($password_1)) {
				array_push($errors, "Password is required");
			}
				//validate password	 
				else if(strlen($password_1) < 8){
					array_push($errors, "Password must be atleat 8 characters long");
				   return false;
				}
				else if (strpos($password_1, '@') == false && strpos($password_1,'!') == false) {
					array_push($errors, "Please include either @ or ! symbol for password");
					return false;
				 }
				else if ($password_1 != $password_2) {
					array_push($errors, "The two passwords do not match");
				}
		else if (empty($role)) {
				array_push($errors, "Select role");
			}
		
		
			 //validate email	 
		 else if (strpos($email, '@') == false || strpos($email,'.') == false) {
			array_push($errors, "Please enter a valid email");
			return false;
		 }
			 
		

        //check if user already exist
	$user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
	$result = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	//if user exists
	if($user){
	 if($user['username'] === $username){
		array_push($errors, "Username already exist"); 
	 }
	 if($user['email'] === $email){
		array_push($errors, "Email already exist"); 
	 }
}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			unset($_POST['reg_user'], $_POST['password_2']);
			$_POST['admin'] =0;
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password, role) 
					  VALUES('$username', '$email', '$password','$role')";
			mysqli_query($conn, $query);
	
            
			 // Storing username of the logged in user,
            // in the session variable
            $_SESSION['username'] = $username;

			$_SESSION['success'] = "Registration Successful";
			// Page on which the user will be
            // redirected after registration
            header('location: login.php');
		}

	}

	// ... 

//LOGIN User
if(isset($_POST['login_user'])) {

	$email =  $_POST['email'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	
	if(empty($email)) {
		array_push($errors, "Email is required"); 
		}
	else if(empty($password)) { 
	   array_push($errors, "Password is required");
	}
	else if (empty($role)) {
		array_push($errors, "Select role");
	}
	
	if (count($errors) == 0) {
	$password = md5($password);//password encrypt
	$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $results = mysqli_query($conn, $query);

	if (mysqli_num_rows($results) === 1) {
       $row = mysqli_fetch_assoc($results);

		   if ($role == "student") {
			    $_SESSION['username'] = $row['username'];
			    $_SESSION['admin'] = $row['student'];
				$_SESSION['message'] = 'You are now logged in';
		        $_SESSION['type'] = 'success';
				header("Location:users/welcome.php");
		   }else if ($role == "admin") {
			    $_SESSION['username'] = $row['username'];
			    $_SESSION['admin'] = $row['admin'];
				$_SESSION['message'] = 'You are now logged in';
		        $_SESSION['type'] = 'success';
				header('Location: admin/welcome.php');
		   }

}else{
	array_push($errors, "Invalid login details");
}
	}
}




?>