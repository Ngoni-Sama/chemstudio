<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../../../Login/StudentOrTeacher.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../../../Login/StudentOrTeacher.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="../../image/png" href="image/fav-icon.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chem Studio | Titration </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
   <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 

   <style>
     html, body, h1{
      font-family:'Comfortaa', 'Roboto' !important;
     }
   </style>

  
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top" style="background: linear-gradient(-45deg, #a8c7f4 1%,#003c93 100%);">
        <div class="container">
          <div class="navbar-header">

           <!-- Sidebar toggle button-->
           <a href="#" class="sidebar-toggle blue" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <a href="../../index.php" class="navbar-brand"><b>Chem</b>Studio</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
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
                  <?php echo $_SESSION['username']; ?> - Teacher
                    
                  </p>
                </li>
               
                  <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div> -->
                  <div class="pull-right">
                    <a href="periodic_table.php?logout='1'" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      <!-- /.container-fluid -->
    </nav>
  </header>



  <aside class="main-sidebar" style="background: linear-gradient(-95deg,#003c93 1%,#08101c 100%);">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
      
   
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header">WORK SPACE</li>
            <li class="active treeview"> -->
              <a href="#">
            
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i>LAB SPACE</a></li>
              
            </ul>

            <style>
              .treeview a:hover{background-color:#022353 !important;}
              a.blue:hover{background-color:#022353 !important;}
              </style>

          </li>

         
        <li>
          <a href="../../Create_class.php">
            <i class="fa fa-pencil" style="color: #cedffa;"></i>
            <span style="color:#9ac1ff !important;">Create Class</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        

        <li class="treeview margin-top">
          <a href="#">
            <i class="fa fa-hand-pointer-o" style="color: #cedffa;"></i>
            <span style="color:#9ac1ff !important;">Assignments</span>
            <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color:transparent;">
              <li><a href="../../Create_assignment.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Create Assignment</a></li>
              <li><a href="../../active_assignments.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Active Assignments</a></li>
              <li><a href="../../submitted_assignments.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Submissions</a></li>
              <li><a href="../../student_grading.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Grade Submissions</a></li>
              <!-- <li><a href="pages/layout/saturation.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Saturation</a></li> -->
          </ul>
        </li>

       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop" style="color: #cedffa;"></i>
            <span style="color:#9ac1ff !important;">Manage Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color:transparent;">

            <li><a href="../../add_student.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Add Student</a></li>
            <li><a href="../../view_students.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> View Students</a></li>
            <li><a href="../../view_performance.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> View Performance</a></li>

          </ul>
        </li>
       
         <li class="treeview margin-top">
          <a href="#">
            <i class="fa fa-hand-pointer-o" style="color: #cedffa;"></i>
            <span style="color:#9ac1ff !important;">View Practicals</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color:transparent;">
              <li><a href="titrations.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Titration</a></li>
              <!-- <li><a href="acid-base.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Acid-Base Indicators</a></li> -->
              <!-- <li><a href="pages/layout/equilibrium.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Equilibrium</a></li> -->
              <li><a href="pages/layout/ChemBonding.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Chemical Bonding</a></li>
              <li><a href="electrolysis.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Electrolysis</a></li>

              <li><a href="periodic_table.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Tables</a></li>
          </ul>
        </li>
       
       
        </section>
        <!-- /.sidebar -->
      </aside>



      <!-- Full Width Column -->
      <div class="content-wrapper" style="background-color:#dee8f7 !important">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            
            
          </section>

          <!-- Main content -->
          <section class="content">
            <iframe src="../tables/PeriodicTable/pt.html" style="height:880px;width: 1290px; margin-left: -110px; margin-top: -100px;" allowTransparency="true" scrolling="no" 
            frameborder="0">
            </iframe>
          </section>
          <!-- /.content -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.content-wrapper -->
      
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
  </body>
  </html>
