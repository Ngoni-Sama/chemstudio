<html>
<body>
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
	<div class="container home">
		<h3> Create New Student </h3>
		
		<?php
			include 'connection.php'; /** calling of connection.php that has the connection code **/
			
			if( isset( $_POST['create'] ) ): /** A trigger that execute after clicking the submit 	button **/
				
				/*** Putting all the data from text into variables **/
				
				$fname = $_POST['fname']; 
				$mname = $_POST['mname'];
				$lname = $_POST['lname'];
				$addr = $_POST['addr'];
				$gender = $_POST['gender'];
				$course = $_POST['course'];
				$year = $_POST['year'];
				$section = $_POST['section'];
				
				mysql_query("INSERT INTO student_record(fname,mname,lname,addr,gender,course,year,section) 
							VALUES('$fname','$mname','$lname','$addr','$gender','$course','$year','$section')") 
							or die(mysql_error()); /*** execute the insert sql code **/
							
				echo "<div class='alert alert-info'> Successfully Saved. </div>"; /** success message **/
			
			endif;
		?>
		
		
		<form action="" method="POST">
			<label> Full Name: </label>
				<input type="text" placeholder="First Name" class="input-medium" name="fname" />
				<input type="text" placeholder="Middle Name" class="input-medium" name="mname" />
				<input type="text" placeholder="Last Name" class="input-medium" name="lname"/>
			<label> Address: </label>
				<textarea class="span7" name="addr"></textarea>
			<label> Gender: </label>
				<select class="span2" name="gender">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			<label> Course you want to enroll: </label>
				<input type="text" placeholder="Enter the complete course name" class="input-xxlarge" name="course" />
			<label> Year and Section </label>
				<input type="text" placeholder="Year" class="input-medium" name="year"/>
				<input type="text" placeholder="Section" class="input-medium" name="section"/>
			<br />
			<input type="submit" name="create" value="Create New Student" class="btn btn-info" />	
			
		</form>		
	</div>	
</div>
</body>
</html>
