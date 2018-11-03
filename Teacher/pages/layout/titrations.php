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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Titration type <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="titration_exp.php">Acid-base Titrations</a></li>
                <li><a href="hardness_exp.php">Water Hardness Titration</a></li>
                <!-- <li><a href="#">Precipitation Titration</a></li> -->
                <li class="divider"></li>
                <!-- <li><a href="#">Complexometric Titrations<br>(Advanced Level)</a></li> -->
              </ul>
            </li>
          </ul>
         
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
                    <a href="titrations.php?logout='1'" class="btn btn-default btn-flat">Sign out</a>
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
                             
                             1. To prepare a standard solution of sodium carbonate.<br><br>
                             2. To determine the strength of a given solution of hydrochloric
                             acid by titrating it against standard sodium carbonate solution.
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                          <div class="box-body">
                            What is Titration?<br><br>
One of the important methods in Quantitative Analysis is Volumetric Analysis, a commonly used laboratory technique. It is used to determine the unknown concentration of a sample by measuring its volume. This process is also called titration. In a titration, a solution of unknown concentration is reacted with a solution of known concentration. The solution taken in the burette is called the titrant and the solution taken in the conical flask is called the analyte.

What does the end point of a titration mean?<br><br>
The endpoint of a titration is the point at which the reaction between the titrant and the analyte becomes complete. Generally the endpoint of a titration is determined using indicators.

What is a standard solution?<br><br>
A solution of known concentration is called the standard solution. A standard solution can be prepared by dissolving a known quantity of the substance in a definite volume of the solvent. The substance used to prepare the standard solution can be classified into two types.

1. Primary standard<br><br>
A primary standard has the following features:<br><br>

It is highly pure and cheaply available.<br><br>
It is highly soluble in water.<br><br>
It is neither deliquescent nor hygroscopic.<br><br>
It is highly stable.<br><br>
Oxalic acid, Mohr's salt, potassium dichromate are some examples of primary standards.<br><br>
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
                            2. Secondary standard<br><br>
                            Substances whose standard solutions cannot be prepared directly are called secondary standards.
                            
                            Some examples are sodium hydroxide and potassium permanganate.
                            
                            How do we express the concentration of a solution?<br><br>
                            The concentration of a solution can be expressed in the following ways.
                            
                            Normality: It is defined as the number of gram equivalent of solute dissolved in one litre of the solution. It is denoted by the letter 'N'.
                    
                            Molarity: It is defined as the number of gram moles of solute dissolved in one litre of the solution. It is denoted by the letter 'M'.
                        
                            Molality: It is defined as the number of moles of the solute dissolved in 1Kg of the solvent. It is denoted by the letter 'm'.
                           
                            What does Acid-Base titration mean?<br><br>
                            Titration can be classified into various types depending upon the chemical reactions occurring during titration. One of the commonly known titrations is the Acid-Base titration. It is a method used to determine the strength of an acid or alkali and this type of titration is based on the neutralisation reaction. In this reaction, acids and bases react to form salt and water.
                           
                            What is an indicator?<br><br>
                            An indicator is a chemical substance that undergoes a colour change at the endpoint. The endpoint of an acid-base titration can be determined using acid-base indicators. Acid Base indicators are either weak organic acids or weak organic bases. The colour change of an indicator depends on the pH of the medium. The un-ionized form of an indicator has one colour, but its ionized form has a different colour.
                            
                            For example, consider the indicator phenolphthalein, whose ionization can be written as,
                            
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
What are the different types of Acid-Base titrations?<br><br>
Acid-base titration can be classified into the following types.<br><br>

Strong acid-Strong base titration:In this type, a strong acid is titrated against a strong base. Both the acid and base are of equal strength, so at the endpoint, the pH will be neutral. The indicators used are phenolphthalein and methyl orange.
<br><br>
Example: Titration of HCl Vs NaOH<br><br>
Strong acid-weak base titration: In this type, strong acid reacts with a weak base to form an acidic solution. So the pH of the solution is less than 7 Methyl orange is the indicator used to determine the endpoint.
<br><br>
Example: Titration of HCl Vs NH4OH<br><br>
Strong base-weak acid titration: Here a strong base reacts with a weak acid to form a basic solution. So the pH of the solution is >7. In this type phenolphthalein is a suitable indicator for the determination of the end point.
<br><br>
Example: Titration of CH3COOH Vs NaOH<br><br>
Weak acid-weak base titration: This type of titration is not very practical. Here both the acid and base are very weak so they do not ionize completely. So, it is difficult to determine the pH range around the end point and it is difficult to choose a suitable indicator for this type of titration.
<br><br>
Example: Titration of CH3COOH Vs NH4OH
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
                              Begin by selecting the type of titration from the 'Titration type' drop down list.<br><br>
                              Select the titrant from the 'Titrant' drop dowm list.<br><br>
                              Adjust the speed of the drops using the slider.<br><br>
                              Select the titrate from the 'Titrate' drop down list.<br><br>
                              Use the slider to select the molarity of the titrate.<br><br>
                              Use the slider to select the volume of the titrate.<br><br>
                              You can choose the indicator corresponding to each titration from the 'Indicators' drop down list.<br><br>
                              Click on the 'Start' button or on the 'Nozzle' of the burette to start the titration.<br><br>
                              You can see the volume of the titrant used for titration by clicking on the 'Show the volume of titrant' check box.<br><br>
                              To stop the titration either click on the 'Stop' button or click on the 'Nozzle' of the burette.<br><br>
                              Find out the number of moles of the titrant (n1) and that of the titrate (n2) 
                              from the chemical equation and enter the values in the respective text boxes and verify the values.<br><br>
                              Calculate the molarity of the titrant using the given equation and enter the value in the corresponding
                               text box and verify the value.<br><br>
                              The molar mass of the titrant is shown on the side menu.<br><br>
                              Calculate the strength of the given titrant (in g/lit) and enter the value in the 
                              corresponding text box and verify the result.<br><br>
                              To redo the experiment click the 'Reset' button.<br><br>
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
