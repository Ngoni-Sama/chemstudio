<?php include('filing.php') ?>

<?php
include_once 'dbconnect.php';
//include 'uploads.php';
//session_start();
// fetch files
$sql = "select filename from tbl_files";
$result = mysqli_query($con, $sql);


$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "chem_teacher";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `assignments`";
$query1 = "SELECT * FROM `login`";

// for method 1

$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query1);


?>




<?php

$db = mysqli_connect('localhost', 'root', '', 'chem_teacher');
if (isset($_POST['submit'])) {
$teacher_name = mysqli_real_escape_string($db, $_POST['teacher_name']);
$subject = mysqli_real_escape_string($db, $_POST['subject']);
$username = mysqli_real_escape_string($db, $_POST['username']);

$query = "INSERT INTO submissions (subject,teacher_name,topic) 
VALUES('$subject', '$teacher_name', '$username')";
    mysqli_query($db, $query);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload View & Download</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>
<body style="background-color:#dee8f7">
<br/>
<div class="container" >
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
        <form action="uploads.php" method="post" enctype="multipart/form-data">
            <legend>Select File to Upload:</legend>
            <div class="form-group">
            
                <input type="file" name="file1" />
            </div>

            <div class="form-group">


            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="btn btn-info"/>
            </div>
            <?php if(isset($_GET['st'])) { ?>
                <div class="alert alert-success text-center">
                <?php if ($_GET['st'] == 'success') {
                        echo "File Uploaded Successfully!";
                    }
                    else
                    {
                        echo 'Invalid File Extension!';
                    } ?>
                </div>
            <?php } ?>

             <table class="table table-bordered">        

			  <tr>
                    <td>	<label for="teacher_name">Teacher's Name: </label>	</td>
                    <td>	<select class="span2" name="teacher_name">
					
					<?php while($row1 = mysqli_fetch_array($result2)):;?>
                  <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
				  <?php endwhile;?>
				  
				</select>
							</td>
				</tr>


                <tr>
                    <td>	<label for="sub">Assignment Title: </label>	</td>
                    <td>	<select class="span2" name="subject">
					
					<?php while($row1 = mysqli_fetch_array($result1)):;?>
                  <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
				  <?php endwhile;?>
				  
				</select>
							</td>
				</tr>

                
            <?php
		$username=$_SESSION['username'];
		?>

                <tr>
                    <!-- <td valign="top" align="left">Username:</td> -->
                    <!-- <td valign="top" align="left"> -->
					<input type="text" name="username" value="<?php echo $username?>" readonly cols="50" rows="10" id="pre" 
					style="display:none;" class="input-medium" required>
					<!-- </td> -->
				</tr>




        </form>
        </div>
    </div>
    
   
</div>
</body>
</html>