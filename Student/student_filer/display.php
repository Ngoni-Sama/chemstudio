<?php
session_start();

?>

<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
	<title>Download Files</title>
	<style type="text/css">
	#wrapper {
	margin: 0 auto;
	float: none;
	width:70%;
}
.header {
	padding:10px 0;
	border-bottom:1px solid #CCC;
}
.title {
	padding: 0 5px 0 0;
	float:left;
	margin:0;
}
.container form input {
	height: 30px;
}
body
{
    
    font-size:14;
    font-weight:bold;
}
		</style>
</head>
<body  align="center" style="background-color:#dee8f7">

<br>
<div class="container home">
<!-- <font face="comic sans ms">
<h3><center> Current Assignments </center> </h3>
</font> -->

 <table class="table table-bordered" style="background-color:#white">
  <thead>
   <tr>
    <th><font face="comic sans ms">Description</font></th>
    <th><font face="comic sans ms">File Type</font></th>
	<th><font face="comic sans ms">Download Files </font></th>
  </tr>
   </thead>
    <tbody>
                        <?php
						$username=$_SESSION['username'];
						
	$link=mysql_connect("localhost","root","");
	mysql_select_db("chem_teacher",$link);
	$q="select count(*) \"total\"  from assignment_files";
	$ros=mysql_query($q,$link);
	$row=(mysql_fetch_array($ros));
	$total=$row['total'];
	$dis=3;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;
	$q="SELECT * FROM assignment_files ORDER BY id ASC limit $k,$dis";
	$ros=mysql_query($q,$link);
	
	while($row=mysql_fetch_array($ros))
	{
		echo '<tr>';
		echo '<td align=center>' . $row['name'];
		echo '<td align=center>' .$row['mime'];
		echo "<td align=center><a title='Click here to download in file.' 
		     href='download.php?id={$row['name']}'>{$row['name']} </a>"; 
		echo '</tr>';
		
	}
	echo '</table>';
	echo  '</tbody>';
	echo '<br/>';
	if($page_cur>1)
	{
	 echo '<a href="display.php?page='.($page_cur-1).'" style="cursor:pointer;color:#007bb6 ;" ><input style="cursor:pointer;background-color:#007bb6;border:1px white solid;border-radius:5px;width:120px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Previous "></a> ';
     }
	else
	{
	  
	  echo '<input style="background-color:#007bb6;border:1px white solid;border-radius:5px;width:120px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Previous "> ';
	  
	}
	for($i=1;$i<$total_page;$i++)
	{
		if($page_cur==$i)
		{
		    
			echo '<input style="background-color:#007bb6 ;border:2px white solid;border-radius:5px;width:30px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value="'.$i.'"> ';
	
		}
		else
		{
		echo '<a href="display.php?page='.$i.'"> <input style="cursor:pointer;background-color:#007bb6 ;border:1px white solid;border-radius:5px;width:30px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value="'.$i.'"> </a> ';
		
		}
	}
	if($page_cur<$total_page)
	{
		
		echo '<a href="display.php?page='.($page_cur+1).'"><input style="cursor:pointer;background-color:#007bb6 ;border:1px white solid;border-radius:5px;width:90px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value=" Next "></a>';
  	  
	}
	else
	{

	 echo '<input style="background-color:#007bb6 ;border:1px white solid;border-radius:5px;width:90px;height:30px;color:white;font-size:15px;font-weight:bold;" type="button" value="   Next "> ';
     }
   
?>

</div>
</body>
</html>								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
                        
						
  

