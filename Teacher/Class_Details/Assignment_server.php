<?php
session_start();

// initializing variables
$type = "";
$class    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'chem_teacher');

// REGISTER USER
if (isset($_POST['create_assignment'])) {
  // receive all input values from the form
  $teacher_name = mysqli_real_escape_string($db, $_POST['teacher_name']);

  $title = mysqli_real_escape_string($db, $_POST['title']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $classroom = mysqli_real_escape_string($db, $_POST['classroom']);
  // $file = mysqli_real_escape_string($db, $_POST['file']);
  $issued_date = mysqli_real_escape_string($db, $_POST['issued_date']);
  $due_date = mysqli_real_escape_string($db, $_POST['due_date']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "*Assignment title is required"); }
  if (empty($type)) { array_push($errors, "*Assignment name is required"); }
  if (empty($classroom)) { array_push($errors, "*Assigned class is required"); }
  // if (empty($file)) { array_push($errors, "*Assignment file is required"); }
  if (empty($issued_date)) { array_push($errors, "*Issued date is required"); }
  if (empty($due_date)) { array_push($errors, "*Due date is required"); }
  

  // first check the database to make sure 
  // an assignment is not uloaded twice
 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO assignments (teacher_name,title, type, classroom, issued_date, due_date) 
  			  VALUES('$teacher_name','$title','$type', '$classroom', '$issued_date', '$due_date')";
  	mysqli_query($db, $query);
  	// $_SESSION['username'] = $username;
  	$_SESSION['success'] = "Welcome to ChemStudio";
  }
}




?>