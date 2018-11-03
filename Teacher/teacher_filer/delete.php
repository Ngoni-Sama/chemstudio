<?php
session_start();
?>

<link rel="stylesheet" href="css/bootstrap.min.css" />
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
    
    font-size:12;
    font-weight:bold;
		background-color:#dee8f7;
}


		</style>
<div class="container home">
		<h3> Available Classes</h3>
		<?php include "connection.php" ?>
		<table class="table table-bordered">
              <thead>
                <tr>
                  <th width="60px"> No</th>
				  				<th>Class Name</th>
                  <th>Class Description</th>
               	  <th> Action </th>
                </tr>
              </thead>
              <tbody>
				<?php 
				$username=$_SESSION['username'];
			    $no=1;
				$result = mysql_query("SELECT * FROM register_class WHERE teacher_name='$username'");
				while($data = mysql_fetch_object($result) ):
			  ?>
                <tr>
				  <td><?php echo $no;?></td>
                  <td><?php echo $data->class_name ?></td>
                  <td><?php echo $data->description?></td>
				  <td>
				 <a href="deleteById.php?id=<?php echo $data->id ?> ">
				<button class="btn btn-danger" title="Click here to erase file."> Delete </button>
					</a>
					

				  </td>
                </tr>
			  <?php
				$no++;
				endwhile;
			  ?>
              </tbody>
		</table>
</div>	
</div>
</body>
</html>
