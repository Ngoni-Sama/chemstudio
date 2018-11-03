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
<link rel="shortcut icon" type="image/png" href="../../image/fav-icon.png">
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

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

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
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
               
              <li class="dropdown">
              <a href="electrolysis_exp.php" >Begin Simulation</a>
              <!-- <ul class="dropdown-menu" role="menu">
                <li><a href="titration_exp.html">Acid-base Titrations</a></li>
                <li><a href="#">Redox Titrations</a></li>
                <li><a href="#">Precipitation Titration</a></li>
                <li class="divider"></li>
                <li><a href="#">Complexometric Titrations<br>(Advanced Level)</a></li>
              </ul> -->
            </li>
             
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                
                <!-- User Account Menu -->
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
                    <!-- The user image in the menu -->
                    <li class="user-header">
                       <p>
                      <?php echo $_SESSION['username']; ?> - Student
                        
                      </p>
    
                    </li>
                    <!-- Menu Body -->
                    
                    <li class="user-footer">
                      
                      <div class="pull-right">
                        <a href="electrolysis.php?logout='1'" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                   
                  </ul>
                </li>
              </ul>
            </div>
            <!-- /.navbar-custom-menu -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </header>



  <aside class="main-sidebar" style="background: linear-gradient(-95deg,#003c93 1%,#08101c 100%);">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
      
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <!-- <li class="header">WORK SPACE</li>
            <li class="active treeview"> -->
              <a href="#">
             <!-- </i> <span>LAB SPACE</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> -->
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>LAB SPACE</a></li>
              
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
              <li><a href="acid-base.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Acid-Base Indicators</a></li>
              <!-- <li><a href="pages/layout/equilibrium.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Equilibrium</a></li> -->
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
            <!-- <h1 style="margin-left:28px;">
              Titration -->
              <!-- <small>Example 2.0</small> -->
            <!-- </h1> -->
            
          </section>

          <!-- Main content -->
          <section class="content">
           
            <div class="row" style="margin-left:10%;">
              <div class="col-md-6">
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Theory<br><br> Objective:</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="box-group" id="accordion">
                      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                To determine the mass of metal deposited at an electrode.
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                          <div class="box-body">
                            <strong><em>Electrolysis</em></strong> is a technique that uses a direct electric current (DC) to drive an otherwise non-spontaneous chemical 
                            reaction. Electrolysis is commercially important as a 
                            stage in the separation of elements from naturally occurring sources such as ores using an electrolytic cell.<br><br>

                            For example determination of copper is the most important application of electrolysis. 
                            The whole process is carried out in an electrolytic cell, which consists of two electrodes an anode 
                            and a cathode with an external electrical energy supply. On Cathode deposition of the metal takes place 
                            due to the reduction of metal, and it is connected to the –ve terminal of the energy source. On Anode oxidation 
                            occurs, and it is connected to the +ve terminal of the energy source.
                          </div>
                        </div>
                      </div>
                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                             Page 2
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="box-body">
                            There are two types Electrolysis methods:<br><br>
 
1. Constant Current Electrolysis:<br><br>
 
In this process the current is kept constant, and potential is increased. 
Here no control of the potential of the working electrode is exercised, and the applied cell potential is 
held at a more or less constant level but provides a large enough current to complete the electrolysis in 
a reasonable length of time. And a fixed amount of the current can be passing between the anode and cathode. 
The limitation of constant current electrolysis is it cannot be used for the separation of ion in a solution 
containing single species.<br><br>
 

2. Constant Potential Electrolysis:<br><br>
 
The simplest way of performing an analytical electrolysis is to maintain the applied cell potential at a constant value. 
This method is used in the separation of the components from a mixture in which the decomposition potentials are not 
widely separated.<br>
For example the determination of copper from an acidic solution (either nitric acid or sulphuric acid solution or 
mixture of two acids) at constant current. Suppose an emf of 2-3 V is applied then the reaction taking place are 
given below:
                             </div>
                        </div>
                      </div>
                      <div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                             Page 3
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="box-body">
                            At cathode:<br><br>
 
                            Cu2+ +  2e-  → Cu<br>
                        
                            2H+ + 2e- →  H2<br><br>
                            At anode:<br>
                             4OH- → O2 + 2H2O + 4e-
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
             

              <div class="row">
                <div class="col-md-6">
                  <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Procedure</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                              Simulation Procedure
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                              1.Select the simulation from the menu "Begin Simulation" above.<br><br>
                              2.Select the solution.<br><br>
                              3.Choose the cathode.<br><br>
                              4.Choose the anode.<br><br>
                              5.Select the voltage.<br><br>
                              6.Select the resistance.<br><br>
                              7.Select the time.<br><br>
                              8.Then click on the start button.<br><br>
                              9.Note the total weight of cathode.<br><br>
                              10.From that the mass of metal deposited should be determined.<br><br>
                               
                              Observations and Calculations:<br><br>
                               
                              
                              Initial weight of the cathode = 10 g<br><br>
                              
                              Final weight of the cathode =.......................g<br><br>
                              
                              Therefore, the amount of metal deposited, m =........g<br><br>
                              
                              Voltage used =....................................V<br><br>
                              
                              Resistance used =............................ohms<br><br>
                              
                              Therefore, the Current, I=.................A<br><br>
                              
                              Time taken for compete deposition, t=.....................sec
                            </div>
                          </div>
                        </div>
                       
                  </div>
                  <!-- /.box -->
                </div>

              </div>
              <!-- /.col -->
            </div>
           
            

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
