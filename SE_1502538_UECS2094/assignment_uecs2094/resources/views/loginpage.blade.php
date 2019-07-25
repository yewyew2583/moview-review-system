<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
@include('app')
<body>
	<form class="col-md-offset-4 col-md-4" id="loginForm">
      	<label for="loginForm"><h2>Sign In</h2></label>
      	<div class="row">
	      <div class="col-md-12">
	      	<label for="usernameTxt">Username</label>
	        <input type="text" class="form-control" id="usernameTxt" name="usernameTxt">
	      </div>
	      <div class="col-md-12">
	      	<label for="passwordTxt">Password</label>
	        <input type="password" class="form-control" id="passwordTxt" name="passwordTxt">
	      </div>
	  	</div>
	  	<div class="text-danger required-label" style="display:none;">
			Please enter the correct username and password!
		</div>
	  	<br>
	  	<input type="button" class="btn btn-primary col-md-12" id="login" value="Login">
	</form>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
  $('#login').click(function(){
  	 $(".required-label").hide();
     $.ajax({
        url: '{{ url("/login") }}',
        data: {
          username:($("#usernameTxt").val()),
          password:($("#passwordTxt").val()),
        },
        success: function(result){
        	if(result.length>0){
        		//*****************Using Local storage to store user data ***************//
        		sessionStorage.setItem('member_pk',result[0].member_pk);
	        	sessionStorage.setItem('username',result[0].username);
	        	sessionStorage.setItem('fullname',result[0].fullname);
	        	sessionStorage.setItem('phoneno',result[0].phoneno);
	        	sessionStorage.setItem('member_type',result[0].member_type);
	        	//*****************Using Local storage to store user data ends***************//
	        	window.location.href = "{{url('homepage')}}";
        	}
        	else{
        		$(".required-label").show();
        	}
        },
        fail: function(){
          console.log('Login Server error');
        }
      });
  });
});
</script>