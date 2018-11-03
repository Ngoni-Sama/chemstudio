<?php 
include "connection.php"; 

$id = $_GET['id']; 

mysql_query("DELETE FROM enrolled_students where id = '$id'"); 

header("Location: student_delete.php"); 



