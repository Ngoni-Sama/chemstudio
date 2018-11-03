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
  <title>Chem Studio | Chemical Bonding </title>
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
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chemical Bonding <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="ChemBonding_exp.php">Ionic and Covalent bonding</a></li>
                <li><a href="elementRadius_exp.php">Atomic Radius & Ionic Radius</a></li>
              </ul>
            </li>
          </ul>
         
        </div>
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
                  <?php echo $_SESSION['username']; ?> - Student
                    
                  </p>
                </li>
               
                  <li class="user-footer">
                 
                  <div class="pull-right">
                    <a href="chembonding.php?logout='1'" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
    </nav>
  </header>



  <aside class="main-sidebar" style="background: linear-gradient(-95deg,#003c93 1%,#08101c 100%);">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
      
    
      <ul class="sidebar-menu" data-widget="tree">
         
              <a href="#">
            
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>LAB SPACE</a></li>
              
            </ul>

            <style>
              .treeview a:hover{background-color:#022353 !important;}
              a.blue:hover{background-color:#022353 !important;}
              </style>

          </li>
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
              <li><a href="titrations.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Titration</a></li>
              <!-- <li><a href="acid-base.html" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Acid-Base Indicators</a></li> -->
              <li><a href="ChemBonding.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Chemical Bonding</a></li>
              <li><a href="electrolysis.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Electrolysis</a></li>
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
              <li><a href="../../my_assignments.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Assignments</a></li>
              <li><a href="../../upload_assignment.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Upload Assignment</a></li>
              <li><a href="../../my_submissions.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> View Submissions</a></li>
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

            <li><a href="../../my_results.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> General Results</a></li>
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
            <li><a href="periodic_table.php" style="color:#cedffa;"><i class="fa fa-circle-o"></i> Periodic Table</a></li>
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
                    <h3 class="box-title">Theory<br><br> Objectives:</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="box-group" id="accordion">
                      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">   
                             Ionic and Covalent Bonds
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                          <div class="box-body">
                            <b>Ionic bonding</b> is the complete transfer of valence electron(s) between atoms.<br><br>
                            It is a type of chemical bond that generates two oppositely charged ions.<br><br>
                            In ionic bonds, the metal loses electrons to become a positively charged cation, whereas the nonmetal accepts those electrons to become a negatively charged anion.<br>
                            Ionic bonds require an electron donor, often a metal, and an electron acceptor, a nonmetal. <br><br><br>

                            <b>Covalent bonding</b> is the sharing of electrons between atoms.<br><br>
                            This type of bonding occurs between two atoms of the same element or of elements close to each other in the periodic table.<br><br>
                            This bonding occurs primarily between nonmetals; however, it can also be observed between nonmetals and metals. <br><br>
                          </div>
                        </div>
                      </div>
                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                             Ionic and Covalent Radius
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="box-body">
                          The <b>atomic radius</b> is the distance from the atomic nucleus to the outermost stable electron of a neutral atom.<br><br>
                          In practice, the value is obtained by measuring the diameter of an atom and dividing it in half.<br><br>
                          The atomic radius is a term used to describe the size of the atom, but there is no standard definition for this value.<br><br>
                          Atomic radius may actually refer to the ionic radius, as well as the covalent radius, metallic radius, or van der Waals radius.<br><br><br>

                          The <b>ionic radius</b> is half the distance between two gas atoms that are just touching each other.<br><br> 
                          In a neutral atom, the atomic and ionic radius are the same, but many elements exist as anions or cations.<br><br> 
                          If the atom loses its outermost electron (positively charged or cation), the ionic radius is smaller than the atomic radius because the atom loses an electron energy shell.<br><br> 
                          If the atom gains an electron (negatively charged or anion), usually the electron falls into an existing energy shell so the size of the ionic radius and atomic radius are comparable.
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
                              Begin by navigating to the top nav bar<br><br>
                              From the Chemical Bonding drop-down menu, select the practical of your choosing<br><br>
                              Follow the instructions provided within each experiment<br><br>
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
