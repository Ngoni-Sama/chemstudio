<?php
//connect mysql database
$host = "localhost";
$user = "root";
$pass = "";
$db = "chem_teacher";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));
?>