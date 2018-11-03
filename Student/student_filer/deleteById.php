<?php 
include "connection.php"; 

$id = $_GET['id']; 

mysql_query("DELETE FROM presentation where id = '$id'"); 

header("Location: delete.php"); 



