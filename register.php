<?php
session_start();

// initializing variables
//$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  //$username = $_POST['username']);
  $email = $_POST['email']);
  $password_1 = $_POST['psw']);
  $password_2 = $_POST['psw-repeat']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
 
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
 
  	$query = "INSERT INTO users (email, password) 
  			  VALUES('$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}