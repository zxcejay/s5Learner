<?php 
require ("../db.php");
// $title=$_GET['title'];

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
  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];
  $d = $_POST['d'];
  $answer = $_POST['choice'];
  $quizID = "QZ-" .rand(1000 , 99999 );
  if($_POST['edit'] == '1') {
    $quiz_id = $_POST['quiz_id'];
    $stmt = $conn->prepare("UPDATE quizzes 
                            SET quizBody = '$question' 
                            WHERE quizID = '$quiz_id' ");
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE choices 
                            SET _a = '$a',
                                _b = '$b',
                               _c =  '$c',
                                _d = '$d',
                                answer = '$answer'
                            WHERE referenceID = '$quiz_id' ");
    $stmt->execute();
  } else {
    $stmt = $conn->prepare("INSERT INTO quizzes(quizID,quarterID, quizBody) VALUES ('$quizID',$qid,'$question') ");
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO choices(referenceID, _a, _b, _c, _d, answer) 
                VALUES ('$quizID','$a','$b','$c','$d','$answer') ");
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

  <link rel="icon" href="../../favicon.ico" type="image/x-icon">
  
</head>
<script type="text/javascript">
  var session_check = localStorage.getItem('user');
  if (!session_check) {
    window.location.href = '../login/login.php';
  }

  function edit(val) {
    console.log("_"+val);
    $.get("http://localhost/s5_api/questions/getQuiz.php?quiz_id=" + val,
            function(data){
                console.log(data[0]);
                document.getElementById("_"+data[0].answer).setAttribute("checked", "true");
                $("#a").val(data[0].a);
                $("#b").val(data[0].b);
                $("#c").val(data[0].c);
                $("#d").val(data[0].d);
                $("#question").val(data[0].quizQuestion);
                $("#edit").val('1');
                $("#quiz_id").val(val);
                $("#myModal").modal();
            });
  }

  function _delete(val) {
    var del = confirm("Are you sure want to delete ?");
      if (del) {
        console.log(val);
        $.get("http://localhost/s5_api/questions/deleteQuiz.php?quiz_id="+val,
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

      <div class="row">
        <div class="col-md-12">
          <h2>Quizzes for Quarter <?php echo $qid; ?></h2>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-2">
          <button type="button" style="width:150px;" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-primary">
            <i class="fa fa-pencil-square-o" style="padding-right:5px; "></i>Add quiz</button>
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
                        <input type="text" class="form-control" id="question" name="question" placeholder="Type here .." size="40" required>
                      </div>
                  </div><br>
                  <div class="row" style="margin-bottom: 10px;margin-left: 5px;margin-right: 5px;">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input type="radio" name="choice" value="a" id="_a"> A. <input type="text" id="a" name="a" class="form-control" required >
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input type="radio" name="choice" value="c" id="_c"> C. <input type="text" id="c" name="c" class="form-control" required>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="row" style="margin-left: 5px;margin-right: 5px;">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input type="radio" name="choice" value="b" id="_b"> B. <input type="text" id="b" name="b" class="form-control" required>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input type="radio" name="choice" value="d" id="_d"> D. <input type="text" id="d" name="d" class="form-control" required>
                          </div>
                        </div>
                      </div>
                  </div><br><br>
                </div>

              
              </div>
              <!-- End modal body -->
              <div class="modal-footer">
                <input type="hidden" name="edit" id="edit" value="0">
                <input type="hidden" name="quiz_id" id="quiz_id" value="0">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                <a href="quarter.php?q=<?php echo $quarter_id; ?>">
                  <button type="button" class="btn btn-danger" onclick="cancel()" >Cancel</button>
                </a>
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              </div>
            </div>
            </form>
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
                  SELECT q.quizID as quizID,q.id as id,q.quizBody as question, c._a as a,c._b as b,c._c as c,c._d as d, c.answer as answer from quizzes q 
                  LEFT JOIN choices c ON q.quizID = c.referenceID
                  WHERE q.quarterID = $qid  ORDER BY q.id");
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "  <tr>
                              <td>".$row['question']."</td>
                              <td>
                                <span>".$row['answer']."</span>
                              </td>
                              <td>
                                <span class='badge bg-yellow' style='cursor: pointer;' 
                                onclick=edit('".$row['quizID']."')>Edit</span>&nbsp;
                                <span class='badge bg-red' style='cursor: pointer;' 
                                onclick=_delete('".$row['quizID']."')>Delete</span>
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
