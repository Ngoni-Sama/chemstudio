<?php
session_start();

// initializing variables
$name = "";
$description    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'chem_teacher');

// REGISTER USER
if (isset($_POST['create_class'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "* Class name is required"); }
  if (empty($description)) { array_push($errors, "* Class description is required"); }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM register_class WHERE class_name='$name' OR description='$description' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['class_name'] === $name) {
      array_push($errors, "Class already exists");
    }

    if ($user['description'] === $description) {
      array_push($errors, "Description already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	
  	$query = "INSERT INTO register_class (class_name, description) 
  			  VALUES('$name', '$description')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "Success";
  }
}





if(isset($_POST['delete_student']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `enrolled_students` WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

?>