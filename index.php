
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>S5Learner | Dashboard</title>
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
  <!-- Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-red-light.min.css">

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<!-- hold-transition skin-blue sidebar-mini -->
<body class="sidebar-mini fixed skin-red-light">
<div class="wrapper">
<script type="text/javascript">
  var session_check = localStorage.getItem('user');
  if (!session_check) {
    window.location.href = 'pages/login/login.php';
  }
</script>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S5</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>S5</b>Learner</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu" id="insertUser">
        
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="active">
          <a href="index.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Lessons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Quarter 1
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/lessons/quarter.php?q=1&sub=t"><i class="fa fa-circle-o"></i> Topics</a></li>
                <li><a href="pages/lessons/view-quiz.php?q=1&sub=q"><i class="fa fa-circle-o"></i> Quiz</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Quarter 2
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/lessons/quarter.php?q=2&sub=t"><i class="fa fa-circle-o"></i> Topics</a></li>
                <li><a href="pages/lessons/view-quiz.php?q=2&sub=q"><i class="fa fa-circle-o"></i> Quiz</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Quarter 3
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/lessons/quarter.php?q=3&sub=t"><i class="fa fa-circle-o"></i> Topics</a></li>
                <li><a href="pages/lessons/view-quiz.php?q=3&sub=q"><i class="fa fa-circle-o"></i> Quiz</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Quarter 4
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/lessons/quarter.php?q=4&sub=t"><i class="fa fa-circle-o"></i> Topics</a></li>
                <li><a href="pages/lessons/view-quiz.php?q=4&sub=q"><i class="fa fa-circle-o"></i> Quiz</a></li>
              </ul>
            </li>
          </ul>
        </li>

        <li>
          <a href="pages/students/view-students.php">
            <i class="fa fa-user"></i> <span>Students</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">     
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid" style="margin-bottom:0px !important;">
            <div class="box-header with-border">
              
            </div>
            <div class="box-body text-center" style="height:79vh;">
              <p><b>S5Learner: A blended and mobile learning application for grade 5 pupils of Ephesians Christian Academy</b></p>
              <img src="dist/img/logo.jpg" style="width:36%;" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">S5Learner</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script type="text/javascript">
  $(function(){
    $("#insertUser").load("user.php"); 
  });
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
