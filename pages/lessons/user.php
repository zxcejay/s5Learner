<script type="text/javascript">
var username = localStorage.getItem('username');
$("#userSpan").text(username);
$("#userSpan1").text(username);
  function logout() {
    localStorage.removeItem('user');
    localStorage.removeItem('username');
    localStorage.removeItem('password');
    window.location.href = '../../index.php';
  }
</script>
<ul class="nav navbar-nav">
  
<li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span id="userSpan" style="text-transform:capitalize;" class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                <span id="userSpan1" style="text-transform:capitalize;"></span> - Teacher
                  <!-- <small>Member since Nov. 2018</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Settings</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Info</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a onclick="logout()" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
</ul>