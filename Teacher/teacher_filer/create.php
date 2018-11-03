<?php

// php select option value from database
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "chem_teacher";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$username=$_SESSION['username'];

// mysql select query
$query = "SELECT * FROM `assignments` WHERE teacher_name='$username'";
$query1 = "SELECT * FROM `enrolled_students` WHERE teacher_name='$username'";
$query2 = "SELECT * FROM `enrolled_students` WHERE teacher_name='$username'";
$query3 = "SELECT * FROM `enrolled_students` WHERE teacher_name='$username'";

// for method 1

$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query1);
$result3 = mysqli_query($connect, $query2);
$result4 = mysqli_query($connect, $query3);
?>

<html>
<body style="background-color: #dee8f7">
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
    
    font-size:14;
    font-weight:bold;
}
		</style>
</head>
	<div class="container home">
	
		<?php
			include 'connection.php'; /** calling of connection.php that has the connection code **/
			
			if( isset( $_POST['create'] ) ): /** A trigger that execute after clicking the submit 	button **/
				
				/*** Putting all the data from text into variables **/
				
				$teacher_name = $_POST['teacher_name'];
				$id = $_POST['id']; 
				$name = $_POST['name'];
				$marks = $_POST['marks'];
				$class = $_POST['class'];
				$assignment = $_POST['assignment'];
				$remarks = $_POST['remarks'];
				
				mysql_query("INSERT INTO student_grades(teacher_name,id,name,class,assignment,marks,remarks) 
							VALUES('$teacher_name','$id','$name','$class','$assignment','$marks','$remarks')") 
							or die(mysql_error()); /*** execute the insert sql code **/
							
				echo "<div class='alert alert-info'> Grading Successful. </div>"; /** success message **/
			
			endif;
		?>
		
		
		<form action="" method="POST">
		<?php
		$username=$_SESSION['username'];
		?>
		  			<div class="form-group">
                  <!-- <label>Name</label> -->
                  <input type="text" name="teacher_name" class="form-control" readonly value="<?php echo $username?>" 
				  style="display:none;">
                </div>




			<label> Student ID: </label>

			<select class="span2" name="id">
					
					<?php while($row1 = mysqli_fetch_array($result3)):;?>
                  <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
				  <?php endwhile;?>
				  
				</select>

				<label> Student Name: </label>
				<!-- <input type="text" placeholder="Student Name" class="input-medium" name="name" /> -->
				<select class="span2" name="name">
					
					<?php while($row1 = mysqli_fetch_array($result4)):;?>
                  <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
				  <?php endwhile;?>
				  
				</select>
				<label> Student Marks: </label>
				<input type="text" placeholder="Marks" class="input-medium" name="marks"/>
				
				<label> Class Enrolled: </label>
				<select class="span2" name="class">
					
					<?php while($row1 = mysqli_fetch_array($result2)):;?>
                  <option value="<?php echo $row1[3];?>"><?php echo $row1[3];?></option>
				  <?php endwhile;?>
				  
				</select>

				<label> Assignment Name: </label>
				<select class="span2" name="assignment">
					
					<?php while($row1 = mysqli_fetch_array($result1)):;?>
                  <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
				  <?php endwhile;?>
				  
				</select>


			<label> Remarks: </label>
				<textarea class="span7" name="remarks"></textarea>

			<br />
			<input type="submit" name="create" value="Grade Student" class="btn btn-info" />	
			
		</form>		
	</div>	
</div>
</body>
</html>
