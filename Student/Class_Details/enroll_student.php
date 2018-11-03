<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'chem_teacher');

// REGISTER USER
if (isset($_POST['add_student'])) {
  // receive all input values from the form
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $class = mysqli_real_escape_string($db, $_POST['class']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($id)) { array_push($errors, "Student ID is required"); }
  if (empty($name)) { array_push($errors, "Student name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($class)) { array_push($errors, "Class name is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM enrolled_students WHERE name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "Student already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email is Registered");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO enrolled_students (id,name, email, class) 
  			  VALUES('$id','$name', '$email', '$class')";
  	mysqli_query($db, $query);
  	// $_SESSION['username'] = $username;
  	$_SESSION['success'] = "Welcome to ChemStudio";
  }
}



?>