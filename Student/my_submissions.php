<?php include('Class_Details/Register_class.php') ?>
<!-- <?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Login/StudentOrTeacher.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../Login/StudentOrTeacher.php");
  }
?> -->

<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" type="image/png" href="image/fav-icon.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chem Studio | Student Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
   <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css"> 
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 

  <style>

     html, body, h1{
      font-family:'Comfortaa', 'Roboto' !important;
     }
   

    .signIn{
  position: relative;
  width: 50%;
  height: 4rem;
  margin: 5rem 2.2rem;
  color: rgb(255, 255, 255);
  background: #2b3d63;
  font-size: 1.5rem;
  border-radius: 3rem;
  cursor: pointer;
  overflow-anchor: inherit;
  margin-top: -6%;
  margin-bottom: 12%;
    }
    .hvr-bubble{
  vertical-align: middle;
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  position: relative;
  transition-duration: 0.3s;
  transition-property: transform;
    }

    /* Set a style for all buttons */
#submit {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 50%;
	font-size:20px;
}
button:hover {
    opacity: 0.8;
}

    #enrolkey, input[type=password] {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 50%; 
  padding-bottom: 0px;
  margin-top: 15%;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: rgb(140, 0, 255);
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
    
  </style>

  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">
  
      <span class="logo-lg"><b>C</b>S</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background: linear-gradient(-45deg, #a8c7f4 1%,#003c93 100%); margin-top:-20px;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle blue" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <a href="index.php" class="navbar-brand"><b>Chem</b>Studio</a>


      <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
           
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               
                <span class="hidden-xs"> 

                  <?php  if (isset($_SESSION['username'])) : ?>
          	      <p> Hey <strong><?php echo $_SESSION['username']; ?></strong> 🧐 Let's Get Practical ⚗️</p>
                  <?php endif ?>

                </span>
              </a>
              <ul class="dropdown-menu">

              <li class="user-header">
                    <p>
                  <?php echo $_SESSION['username']; ?> - Student
                   
                  </p>
                </li>
               
                  <li class="user-footer">
                
                  <div class="pull-right">
                    <a href="my_submissions.php?logout='1'" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
               
              </ul>
            </li>
          </ul>
        </div>

     
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background: linear-gradient(-95deg,#003c93 1%,#08101c 100%);">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
    
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">WORK SPACE</li>
        <li class="active treeview"> -->
          <a href="#">
         
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>LAB SPACE</a></li>

          </ul>

        </li>

        <style>
         .treeview a:hover{background-color:#022353 !important;}
         a.blue:hover{background-color:#022353 !important;}
        </style>

        <li class="treeview margin-top">
          <a href="#">
            <i class="fa fa-hand-pointer-o" style="color: #cedffa;"></i>
            <span style="color:#9ac1ff !important;">Choose Practical</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color:transparent;">
              <li><a href="pages/layout/titrations.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Titration</a></li>
              <!-- <li><a href="pages/layout/acid-base.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Acid-Base Indicators</a></li> -->
              <li><a href="pages/layout/ChemBonding.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Chemical Bonding</a></li>
              <li><a href="pages/layout/electrolysis.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Electrolysis</a></li>
              <!-- <li><a href="pages/layout/saturation.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Saturation</a></li> -->
          </ul>
        </li>

       <li class="treeview margin-top">
          <a href="#">
            <i class="fa fa-hand-pointer-o" style="color: #cedffa;"></i>
            <span style="color:#9ac1ff !important;">Tasks</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color:transparent;">
              <li><a href="my_assignments.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Assignments</a></li>
              <li><a href="upload_assignment.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Upload Assignment</a></li>
              <li><a href="my_submissions.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> View Submissions</a></li>
              <!-- <li><a href="pages/layout/electrolysis.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Electrolysis</a></li>
              <li><a href="pages/layout/saturation.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Saturation</a></li> -->
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop" style="color: #cedffa;"></i>
            <span style="color:#9ac1ff !important;">View Results</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color:transparent;">

            <li><a href="my_results.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> General Results</a></li>
            <!-- <li><a href="pages/UI/timeline.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Teacher's Comments</a></li> -->

          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table" style="color: #dee8f7;"></i> 
            <span style="color:#9ac1ff !important;">Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color:transparent;">
            <li><a href="pages/layout/periodic_table.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Periodic Table</a></li>
          </ul>
        </li>
        
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#dee8f7 !important">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      
    
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="col-md-12">
         
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div >
           
            <!-- /.box-header -->
            <div class="box-body">
              
              
            </div>

            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        </div>

        <p style="margin-top:10px" class="btn btn-linkedin btn-block btn-lg">My Submissions</p>

        <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Assignment Number</th>
                  <th>Assignment Title</th>
                  <th>File Uploaded</th>
                </tr>
                <?php
                $username=$_SESSION['username'];
                    $conn = mysqli_connect("localhost", "root", "", "chem_teacher");
                      // Check connection
                      if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                      } 

                      
                      $sql = "SELECT id, subject, file FROM submissions where topic = '$username'";
                      
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["subject"]
                         . "</td><td>" . $row["file"] . "</td></tr>";
                    }
                    echo "</table>";
                    } else { echo "No current submissions"; }
                    $conn->close();
                ?>
                </thead>
                <tbody>
               
              </table>

              
        <div class="box-body">
             
            </div>

            
            <!-- /.box-body -->
          </div>


        </section>
        
      </div> 
      

    </section>
    
  </div>
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    
  </aside>
 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
