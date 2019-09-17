<?php 

$qid = $_GET['q'];
$sub = $_GET['sub'];
$q1Class = ($qid == '1') ? 'active treeview' : 'treeview';
$q2Class = ($qid == '2') ? 'active treeview' : 'treeview';
$q3Class = ($qid == '3') ? 'active treeview' : 'treeview';
$q4Class = ($qid == '4') ? 'active treeview' : 'treeview';

$q1Class_1 = ($qid == '1' && $sub == 't') ? 'active' : '';
$q2Class_1 = ($qid == '2' && $sub == 't') ? 'active' : '';
$q3Class_1 = ($qid == '3' && $sub == 't') ? 'active' : '';
$q4Class_1 = ($qid == '4' && $sub == 't') ? 'active' : '';

$q1Class_2 = ($qid == '1' && $sub == 'q') ? 'active' : '';
$q2Class_2 = ($qid == '2' && $sub == 'q') ? 'active' : '';
$q3Class_2 = ($qid == '3' && $sub == 'q') ? 'active' : '';
$q4Class_2 = ($qid == '4' && $sub == 'q') ? 'active' : '';

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
  <script src="custom.js"></script>
  <script type="text/javascript">
  var session_check = localStorage.getItem('user');
  if (!session_check) {
    window.location.href = '../login/login.php';
  }
</script>
  <script>
    function createTopic(){
            var topic_id = $("#topic_id").val();
            var topic_title = $("#topic").val();
            var topic_body = CKEDITOR.instances['ckeditor'].getData();
            var video_link = $("#video_link").val();
            var quarter_id = "<?php echo $qid; ?>";

            if(topic_id){
                var data = JSON.stringify({
                    topic_id: topic_id,
                    title: topic_title,
                    content: topic_body,
                    video_link: video_link
                });

                $.post("http://localhost/s5_api/topic/updateTopic.php",data,
                function(data){
                });
                close_creation();
                    location.reload();
            }
            else{
                var data = JSON.stringify({
                    title: topic_title,
                    content: topic_body,
                    video_link: video_link,
                    quarter_id: quarter_id,
                    status: '0'
                });

                $.post("http://localhost/s5_api/topic/create.php",data,
                function(data){
                    location.reload();
                });

            }
            
        }
  </script>
</head>
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
              <a href="#"><i class="fa fa-circle-o"></i> Quarter 1
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $q1Class_1; ?>"><a href="quarter.php?q=1&sub=t"><i class="fa fa-circle-o"></i> Topics</a></li>
                <li class="<?php echo $q1Class_2; ?>"><a href="view-quiz.php?q=1&sub=q"><i class="fa fa-circle-o"></i> Quiz</a></li>
              </ul>
            </li>

            <li class="<?php echo $q2Class; ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Quarter 2
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $q2Class_1; ?>"><a href="quarter.php?q=2&sub=t"><i class="fa fa-circle-o"></i> Topics</a></li>
                <li class="<?php echo $q2Class_2; ?>"><a href="view-quiz.php?q=2&sub=q"><i class="fa fa-circle-o"></i> Quiz</a></li>
              </ul>
            </li>

            <li class="<?php echo $q3Class; ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Quarter 3
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $q3Class_1; ?>"><a href="quarter.php?q=3&sub=t"><i class="fa fa-circle-o"></i> Topics</a></li>
                <li class="<?php echo $q3Class_2; ?>"><a href="view-quiz.php?q=3&sub=q"><i class="fa fa-circle-o"></i> Quiz</a></li>
              </ul>
            </li>

            <li class="<?php echo $q4Class; ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Quarter 4
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo $q4Class_1; ?>"><a href="quarter.php?q=4&sub=t"><i class="fa fa-circle-o"></i> Topics</a></li>
                <li class="<?php echo $q4Class_2; ?>"><a href="view-quiz.php?q=4&sub=q"><i class="fa fa-circle-o"></i> Quiz</a></li>
              </ul>
            </li>
          </ul>
         
        </li>

        <li>
          <a href="../students/view-students.php">
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
          <h2>Lessons: Quarter <?php echo $qid; ?></h2>
        </div>
      </div>

      <div class="row" id="addNewTopicBtn">
        <div class="col-xs-2">
          <button type="button" style="width:150px;" onclick="creation()"  class="btn btn-block btn-primary">
            <i class="fa fa-pencil-square-o" style="padding-right:5px; "></i>Add topic</button>
        </div>        
      </div>

      <br>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-info" id="creation" style="display: none;">
            <div class="box-header">
              <form>
              <h2 class="box-title">Add topic</h2>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" 
                        class="btn btn-info btn-sm" 
                        onclick="createTopic()"
                        title="Save">
                  <i class="fa fa-save"></i>  Save
                </button>
                <button type="button" 
                        class="btn btn-danger btn-sm" 
                        onclick="close_creation()"
                        data-toggle="tooltip"
                        title="Cancel">
                  <i class="fa fa-times"></i>  Cancel
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <div class="form-group">
                  <label for="topic">Title</label>
                  <input type="hidden" name="topic_id" id="topic_id">
                  <input type="text" name="topic" id="topic" class="form-control" required>
                </div>
                <textarea id="ckeditor" name="ckeditor" rows="10" cols="80"></textarea>
                <br>
                <div class="form-group">
                  <label for="video_link">Video link</label>
                  <input type="text" name="video_link" id="video_link" class="form-control">
                </div>
            </div>
          </form>
          </div>
        </div>
      </div>

      <br>

      <div class="row">

        <div class="col-md-8">

          <?php 
            require ("../db.php");
            $title='';
            $content='';
                $stmt = $conn->prepare("SELECT * from topics WHERE quarter_id = $qid ORDER BY topic_id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $status = $row['status'];
                    $locker = ($status == '1') ? "Lock it ?" : "Unlock It ?";
                     
                    echo "<div class='box box-info'>
                            <div class='box-header with-border'>
                              <h3 class='box-title'>".$row['title']."</h3>
                              <div class='box-tools pull-right'>
                                <div class='btn-group'>
                                  <button type='button' class='btn btn-box-tool dropdown-toggle' data-toggle='dropdown'>
                                    <i class='fa fa-wrench'></i></button>
                                  <ul class='dropdown-menu' role='menu'>
                                    <li><a onclick=updateStatus('".$row['topic_id']."','".$status."')>".$locker."</a></li>
                                    <li><a href='view-exercises.php?q=".$qid."&sub=t&id=".$row['topic_id']."&title=".$row['title']."'>View exercises</a></li>
                                    <li><a href='view-quiz.php?q=".$qid."&sub=q'>View quizzes</a></li>
                                    <li><a onclick=editTopic('".$row['topic_id']."')>View/Edit</a></li>
                                    <li><a onclick=deleteTopic('".$row['topic_id']."')>Delete</a></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>";
                }
            ?>

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
