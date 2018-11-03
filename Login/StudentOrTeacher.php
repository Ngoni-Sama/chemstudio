<?php include('student_server.php') ?>
<?php include('teacher_server.php') ?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="image/fav-icon.png">

	<meta charset="utf-8">
	<title>Student or Teacher</title>
  <link rel="stylesheet" type="text/css" href="StudentOrTeacher.css">
  
  <link rel="stylesheet" type="text/css" href="Logo.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!--For the Sign up and Login-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script> 
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" type="text/css" href="flipLogin.css">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

</head>
<body>

	<div id="particles-js"></div>

  <section id="chemstudio" style="margin-left:860%;">
    <span class="chemical-element">
      C
      <div class="desc" role="top-left">6</div>
      <div class="desc" role="bottom-left-1">Carbon</div>
      <div class="desc" role="bottom-left-2">12.011</div>
    </span>

    <span class="title1">
      <h1 id="word">hem</h1>
    </span>

    <br>

    <span class="chemical-element">
      <span class="S">S</span>
      <div class="desc" role="top-left">16</div>
      <div class="desc" role="bottom-left-1">Sulfur</div>
      <div class="desc" role="bottom-left-2">32.066</div>
    </span>

    <span class="title2">
      <h1 id="word">tudio</h1>
    </span>

  </section>


  <div class="mainContainer" >
    <h1 id="who">Who are you?</h1>

    <div class="left" data-toggle="modal" data-target="#sign">
      <div class="teacher">
        <h1>Teacher</h1>
      </div>
      <div class="thumbnailcirc" ><img class="t" src="blackboard.png"/></div>
    </div>

    <div class="right" data-toggle="modal" data-target="#sign2">
      <div class="teacher">
        <h1>Student</h1>
      </div>
      <div class="thumbnailcirc"><img class="s" src="file.png"/></div>
    </div>


    <div class="or">OR</div>

  </div>


  <div class="containerTeacher">
    <div id="sign" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#login" role="tab" data-toggle="tab">Log In</a></li>
                <li><a href="#signup" role="tab" data-toggle="tab">Sign Up</a></li>
              </ul>

              <div class="tab-content">

               <div class="tab-pane fade in active" id="login">
                <div class="box signup text-center">
                  <a href="#" class="btn btn-facebook btn-block btn-lg">Teacher</a>

                  <form  method="POST" action="StudentOrTeacher.php">
                  <?php include('errors.php'); ?>

                    <input type="text" name="username" class="form-control input-lg" placeholder="Username" />
                    <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                    <!-- <a href="#" class="btn btn-linkedin btn-block btn-lg">Log In</a> -->
    	              <button type="submit" class="btn btn-linkedin btn-block btn-lg" name="login_teacher">Login</button>
                  </form>
                  <br />
                </div>
              </div>

              <div class="tab-pane fade" id="signup">
                <div class="box signup text-center">
                  <a href="javascript:void(0)" class="btn btn-facebook btn-block btn-lg">Teacher</a>

                  <form  name="signup" action="StudentOrTeacher.php" method="POST">
                  <?php include('errors.php'); ?>

                    <input type="text" name="username" class="form-control input-lg" placeholder="Username"/>
                    <input type="email" name="email" class="form-control input-lg" placeholder="Email address"/>
                    <input type="password" name="password_1" class="form-control input-lg" placeholder="Password"/>
                    <input type="password" name="password_2" class="form-control input-lg" placeholder="Retype Password"/>
                    <div class="box signup text-center">
                      <!-- <a href="#" type="submit" class="btn btn-linkedin btn-block btn-lg">Sign Up</a> -->
                       <input type="text" name="submit" value="signup" style="display: none;">

                      <button type="submit" class="btn btn-linkedin btn-block btn-lg" name="reg_teacher">Sign Up</button>
                    </form>
                    <br />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="containerStudent">
    <div id="sign2" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content2">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#login2" role="tab" data-toggle="tab">Log In</a></li>
                <li><a href="#signup2" role="tab" data-toggle="tab">Sign Up</a></li>
              </ul>

              <div class="tab-content2">

               <div class="tab-pane2 fade in active" id="login2">
                <div class="box signup text-center">
                  <a href="#" class="btn btn-facebook btn-block btn-lg">Student</a>

                  <form  action="StudentOrTeacher.php" method="POST">
                  <?php include('errors.php'); ?>

                    <input type="text" name="username" class="form-control input-lg" placeholder="Username" />
                    <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                    <!-- <a href="#" class="btn btn-linkedin btn-block btn-lg">Log In</a> -->
                    <!-- <input type="text" name="submit" value="signup" style="display: none;"> -->
    	              <button type="submit" class="btn btn-linkedin btn-block btn-lg" name="login_student">Login</button>
                  </form>
                  <br />
                </div>
              </div>


              <div class="tab-pane2 fade" id="signup2">
                <div class="box signup text-center">
                  <a href="javascript:void(0)" class="btn btn-facebook btn-block btn-lg">Student</a>
                  <form  name="signup" action="StudentOrTeacher.php" method="POST">
                  <?php include('errors.php'); ?>

                    <input type="text" name="username" class="form-control input-lg" placeholder="Username" />
                    <input type="email" name="email" class="form-control input-lg" placeholder="Email address" />
                    <input type="password" name="password_1" class="form-control input-lg" placeholder="Password" />
                    <input type="password" name="password_2" class="form-control input-lg" placeholder="Retype Password" />
                    <div class="box signup text-center">

                      <!-- <a href="#" class="btn btn-linkedin btn-block btn-lg">Sign Up</a> -->
                        <input type="text" name="submit" value="signup" style="display: none;">
                      <button type="submit" class="btn btn-linkedin btn-block btn-lg" name="reg_student">Sign Up</button>
                    </form>
                    <br />
                  </div>
                </div>


              </div>
            </div>

          </div>

        </div>
      </div>
    </div>

  </div>


  <script src="particles.min.js"></script>
  <script src="particles.js"></script>
  <script src="app.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>

  <script type="text/javascript" src="StudentOrTeacher.js"></script>

</body>
</html>