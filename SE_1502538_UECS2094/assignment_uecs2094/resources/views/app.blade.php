<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="/homepage">AAA MOVIE LIBRARY</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="login-register-href"><a href="/loginpage">Login</a></li>
        <li class="login-register-href"><a href="/signuppage">Register</a></li>
        <li class="dropdown username-dropdown" style="display:none;">
          <a href="#" class="dropdown-toggle dropdown-toggle-username" data-toggle="dropdown" role="button" aria-expanded="false">
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="#" onclick="logout()"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
<script type="text/javascript">
var $member_type = sessionStorage.getItem('member_type');
var $username = sessionStorage.getItem('username');

$(document).ready(function(){
    if(sessionStorage.getItem('member_pk') != '' && sessionStorage.getItem('member_pk') != null){
        $(".dropdown-toggle-username").html($username + "<span class='caret'></span>");
        $(".username-dropdown").show();
        $(".login-register-href").hide();
    }
});

 function logout(){
    sessionStorage.clear();
    window.location.href = "/homepage";
 } 
</script>