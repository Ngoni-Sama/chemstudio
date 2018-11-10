<?php
session_start();

// initializing variables
$name = "";
$description    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'chem_teacher');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $subject = mysqli_real_escape_string($db, $_POST['subject']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $teacher_name = mysqli_real_escape_string($db, $_POST['teacher_name']);

  $query = "INSERT INTO submissions (subject, topic,teacher_name) 
  VALUES('$subject', '$username', '$teacher_name')";
mysqli_query($db, $query);

}

?>
