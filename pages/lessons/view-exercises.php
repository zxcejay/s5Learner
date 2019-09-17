<?php 
require ("../db.php");
$title=$_GET['title'];
$topic_id=$_GET['id'];

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

if(isset($_POST['submit'])){
  $question = $_POST['question'];
  $answer = $_POST['choice'];
  $randomID = "EX-". rand(1000 , 99999 );
  if($_POST['edit'] == '1') {
    $exercise_id = $_POST['exercise_id'];
    $stmt = $conn->prepare("UPDATE exercises 
                            SET exerciseBody = '$question' 
                            WHERE exerciseID = '$exercise_id' ");
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE choices 
                            SET  answer = '$answer'
                            WHERE referenceID = '$exercise_id' ");
    $stmt->execute();
  } else {
    $stmt = $conn->prepare("INSERT INTO exercises(exerciseID,quarterID,topicID,exerciseBody) 
      VALUES ('$randomID',$qid,$topic_id,'$question') ");
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO choices(referenceID,answer) 
                VALUES ('$randomID','$answer') ");
    $stmt->execute();
  }

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

  function edit(val) {
    $.get("http://localhost/s5_api/questions/getExercise.php?exercise_id=" + val,
            function(data){
                $("#choice").val(data[0].answer);
                $("#question").val(data[0].exerciseQuestion);
                $("#edit").val('1');
                $("#exercise_id").val(val);
                $("#myModal").modal();
            });
  }

  function _delete(val) {
    var del = confirm("Are you sure want to delete ?");
      if (del) {
        console.log(val);
        $.get("http://localhost/s5_api/questions/deleteExercise.php?exercise_id="+val,
                function(data){
                    console.log(data);
                    location.reload();
                });
      } else {

      }
  }

  function cancel() {
    location.reload();
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
      <br>
      <div class="row">
        <div class="col-md-12">
          <span style="font-size: 24px;font-weight: bold;">Exercises for Topic: </span>
          <span style="font-size: 24px;"><?php echo $title; ?></span>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-2">
          <button type="button" style="width:150px;" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-primary">
            <i class="fa fa-pencil-square-o" style="padding-right:5px; "></i>Add exercise</button>
        </div>        
      </div><br>

      <div id="modal-container">
        <!-- <button type="button" class="btn btn-info btn-lg" >Open Modal</button> -->
        <!-- Modal dialog -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Quiz for Q<?php echo $qid; ?></h4>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
              <form method="post">

                <div style="padding-left:5px;">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="hidden" class="form-control" id="topic_id" >
                        <span>Question</span>
                        <input type="text" class="form-control" id="question" name="question" placeholder="Question here .." size="40" required>
                      </div>
                  </div><br>

                  <div class="row" style="margin-left: 0px;">
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <span>Answer</span>
                            <input type="text" id="choice" name="choice" placeholder="Answer here" class="form-control" required >
                          </div>
                      </div>
                  </div>
                  
                  <br><br>
                </div>
              </div>
              <!-- End modal body -->
              <div class="modal-footer">
                <input type="hidden" name="edit" id="edit" value="0">
                <input type="hidden" name="exercise_id" id="exercise_id" value="0">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                <a href="quarter.php?q=<?php echo $quarter_id; ?>">
                  <button type="button" class="btn btn-danger" onclick="cancel()">Cancel</button>
                </a>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              </div>
              </form>
            </div>
            <!-- End modal -->
          </div>
        </div>
        <!-- End modal dialog -->
      </div>

      <br>
      <div class="box-body col-md-8" style="background-color: white;">
        <table class="table table-bordered">
                <tr>
                  <th>Questions</th>
                  <th>Answer</th>
                  <th style='width: 112px;text-align: center;'>*</th>
                </tr>
        <?php 
            require ("../db.php");
            $title='';
            $content='';
                $stmt = $conn->prepare("
                  SELECT e.exerciseID as exerciseID,e.id as id,e.exerciseBody as question,c.answer as answer from exercises e 
                  LEFT JOIN choices c ON e.exerciseID = c.referenceID
                  WHERE e.quarterID = $qid AND e.topicID = $topic_id  ORDER BY e.id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "  <tr>
                              <td>".$row['question']."</td>
                              <td>
                                <span>".$row['answer']."</span>
                              </td>
                              <td>
                                <span class='badge bg-yellow' style='cursor: pointer;' 
                                onclick=edit('".$row['exerciseID']."')>Edit</span>&nbsp;
                                <span class='badge bg-red' style='cursor: pointer;' 
                                onclick=_delete('".$row['exerciseID']."')>Delete</span>
                              </td>
                            </tr>
                    ";
                }
            ?>
        </table>
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
<script>
  $.widget.bridge('uibutton', $.ui.button);
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
