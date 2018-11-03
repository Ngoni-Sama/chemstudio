<?php 
include "connection.php"; 

$id = $_GET['id']; 

mysql_query("DELETE FROM register_class where id = '$id'"); 

header("Location: delete.php"); 


