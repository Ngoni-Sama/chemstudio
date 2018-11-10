<?php
include_once 'dbconnect.php';
session_start();

$username=$_SESSION['username'];

// fetch files
$sql = "select * from submissions WHERE teacher_name='$username'";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload View & Download</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>
<body>
<br/>
<div class="container">
    
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover" style="width:800px; margin-right:250px; background-color:#dee8f7">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Student Name</th>
                        <th>Assignment Name</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['topic']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['file']; ?></td>
                    <td><a href="uploads/<?php echo $row['file']; ?>" target="_blank">View</a></td>
                    <td><a href="uploads/<?php echo $row['file']; ?>" download>Download</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>