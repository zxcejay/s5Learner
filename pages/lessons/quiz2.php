<?php 
require ("../db.php");
$title=$_GET['title'];
$quarter_id=$_GET['quarter_id'];

$q1Class = ($quarter_id == '1') ? 'active' : 'inactive';
$q2Class = ($quarter_id == '2') ? 'active' : 'inactive';
$q3Class = ($quarter_id == '3') ? 'active' : 'inactive';
$q4Class = ($quarter_id == '4') ? 'active' : 'inactive';

$topic_id=$_GET['id'];
if(isset($_POST['submit'])){
  $question = $_POST['question'];
  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];
  $d = $_POST['d'];
  $answer = $_POST['choice'];
  $qid = rand(1000 , 99999 );
  // qid = question id
    $stmt = $conn->prepare("INSERT INTO questions(topic_id,qid, content) VALUES ($topic_id,$qid,'$question') ");
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO choices(qid, _a, _b, _c, _d, answer) 
                VALUES ($qid,'$a','$b','$c','$d','$answer') ");
    $stmt->execute();

    header("Refresh:0");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>S5Learner | Dashboard</title>
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
  <!-- Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/skin-red-light.min.css">

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <link rel="icon" href="../../favicon.ico" type="image/x-icon">
  
</head>
<script type="text/javascript">
  var session_check = localStorage.getItem('user');
  if (!session_check) {
    window.location.href = '../login/login.php';
  }
</script>
<!-- hold-transition skin-blue sidebar-mini -->
<body class="sidebar-mini fixed skin-red-light">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
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

        <li>
          <a href="../../index.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>

        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-book"></i> <span>Lessons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $q1Class; ?>">
              <a href="quarter.php?q=1"><i class="fa fa-arrow-right text-red"></i>Quarter 1</a>
            </li>
            <li class="<?php echo $q2Class; ?>">
              <a href="quarter.php?q=2"><i class="fa fa-arrow-right text-red"></i>Quarter 2</a>
            </li>
            <li class="<?php echo $q3Class; ?>">
              <a href="quarter.php?q=3"><i class="fa fa-arrow-right text-red"></i>Quarter 3</a>
            </li>
            <li class="<?php echo $q4Class; ?>">
              <a href="quarter.php?q=4"><i class="fa fa-arrow-right text-red"></i>Quarter 4</a>
            </li>
          </ul>
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
          <h2>Exercise question for : <?php echo $title; ?></h2>
        </div>
      </div>
<!-- 
      <div class="navbar navbar-default" style="border: 2px solid gray;">
      <h3> &nbsp;&nbsp;Add exercise question for : <?php echo $title; ?></h3>
      </div> -->
      <form method="post">
      <div style="padding-left:15px;">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <br>
              <input type="hidden" class="form-control" id="topic_id" >
              <span>Question</span>
              <input type="text" class="form-control" id="question" name="question" placeholder="Type here .." size="40" required>
            </div>
        </div>
        <br>
        <div class="row" style="margin-bottom: 10px;margin-left: 10px;">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="radio" name="choice" value="a" > A. <input type="text" id="a" name="a" class="form-control" required >
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="radio" name="choice" value="c"> C. <input type="text" id="c" name="c" class="form-control" required>
                </div>
              </div>
            </div>
        </div>

        <div class="row" style="margin-left: 10px;">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="radio" name="choice" value="b"> B. <input type="text" id="b" name="b" class="form-control" required>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <input type="radio" name="choice" value="d"> D. <input type="text" id="d" name="d" class="form-control" required>
                </div>
              </div>
            </div>
        </div>
      <!-- <br>
      <em style="color:gray;">*Please select the answer*</em> -->
      <br><br>
      </div>

      <div style="margin-left: 10px;">
        <input type="submit" name="submit" value="Save" class="btn btn-primary">
        <a href="quarter.php?q=<?php echo $quarter_id; ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
      </div>
      </form>
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="../../bower_components/ckeditor/ckeditor.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('ckeditor')
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()
  })
</script>
<script type="text/javascript">
  $(function(){
    $("#insertUser").load("user.php"); 
  });
</script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
