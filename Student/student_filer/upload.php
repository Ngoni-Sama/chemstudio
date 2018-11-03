<?php
session_start();
// php select option value from database

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

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
        <?php
			if(!empty($_POST))
			{
				$con = mysql_connect("localhost","root","");
				if (!$con)
					echo('Could not connect: ' . mysql_error());
				else
				{
					if (file_exists("download/" . $_FILES["file"]["name"]))
					{
						echo '<script language="javascript">alert(" Sorry!! Filename Already Exists...")</script>';
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"download/" . $_FILES["file"]["name"]) ;
						mysql_select_db("chem_teacher", $con);
						$sql = "INSERT INTO submissions(subject,topic,file,teacher_name) VALUES ('" . $_POST["sub"] ."','" . $_POST["pre"] . "','" . 
							  $_FILES["file"]["name"] ."','" . $_POST["teacher_name"] . "');";
						if (!mysql_query($sql,$con))
							echo('Error : ' . mysql_error());
						else
							echo '<script language="javascript">alert("Upload Successful")</script>';
						}
				}
				mysql_close($con);
			}
        ?>
    </head>
     <body>
	   <div class="container home">
      <br>
		<!-- <h3><center> UPLOAD FILE PAGE </center> </h3> </font> -->

		<form id="form3" enctype="multipart/form-data" method="post" action="upload.php">
		<?php
		$username=$_SESSION['username'];
		?>
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
                    <td>	<select class="span2" name="sub">
					
					<?php while($row1 = mysqli_fetch_array($result1)):;?>
                  <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
				  <?php endwhile;?>
				  
				</select>
							</td>
				</tr>
			
                <tr>
                    <!-- <td valign="top" align="left">Username:</td> -->
                    <!-- <td valign="top" align="left"> -->
					<input type="text" name="pre" value="<?php echo $username?>" readonly cols="50" rows="10" id="pre" 
					style="display:none;" class="input-medium" required>
					<!-- </td> -->
				</tr>
		
                <tr>
                    <td><label for="file">File:</label></td>
                    <td><input type="file" name="file" id="file" 
                        title="Click here to select file to upload." required /></td>
                </tr>
                <tr>
                  
				   <td colspan="2" align="center">		    
				   <input type="submit" class="btn btn-primary" name="upload" id="upload" 
				   title="Click here to upload the file." value="Upload File" /> </td>
                </tr>
            </table>
        </form>
		</div>
    </body>
</html>
