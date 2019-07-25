<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
@include('app')
<body>
  <div class="container">
    <form class="col-md-offset-4 col-md-4" id="registerForm">
      <label for="registerForm"><h2>Join Us!</h2></label>
    <div class="row">
      <div class="col-md-12">
        <label for="fullNameTxt">Full Name</label>
        <input type="text" class="form-control" id="fullNameTxt" name="fullNameTxt">
        <label id="required-label-fullname" class="text-danger required-label"></label>
      </div>
      <div class="col-md-12">
        <label for="phoneNoTxt">Phone Number (E.g. 0123456789)</label>
        <input type="text" class="form-control" id="phoneNoTxt" name="phoneNoTxt">
        <label id="required-label-phoneno" class="text-danger required-label"></label>
      </div>
      <div class="col-md-12">
        <label for="usernameTxt">Username</label>
        <input type="text" class="form-control" id="usernameTxt" name="usernameTxt">
        <label id="required-label-username" class="text-danger required-label"></label>
      </div>
      <div class="col-md-12">
        <label for="passwordTxt">Password</label>
        <input type="password" class="form-control" id="passwordTxt" name="passwordTxt">
        <label id="required-label-password" class="text-danger required-label"></label>
      </div>
      <div class="col-md-12">
        <label for="confirmPasswordTxt">Comfirm Password</label>
        <input type="password" class="form-control" id="confirmPasswordTxt" name="confirmPasswordTxt">
        <label id="required-label-confirmpassword" class="text-danger required-label" ></label>
      </div>
    </div>
    <br>
    <input type="button" class="btn btn-primary col-md-12" id="register" value="Register">
  </form>

  </div>
	

</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
  $('#register').click(function(){
    if(validateForm()){
     $.ajax({
        url: '{{ url("/register") }}',
        data: {
          username: $("#usernameTxt").val(),
          password:$("#passwordTxt").val(),
          fullname:$("#fullNameTxt").val(),
          phoneno:$("#phoneNoTxt").val()
        },
        success: function(result){
          alert("Register Succeed!");
          $.ajax({
            url: '{{ url("/login") }}',
            data: {
              username:($("#usernameTxt").val()),
              password:($("#passwordTxt").val()),
            },
            success: function(result){
                sessionStorage.setItem('username',result[0].username);
                sessionStorage.setItem('fullname',result[0].fullname);
                sessionStorage.setItem('phoneno',result[0].phoneno);
                sessionStorage.setItem('member_type',result[0].member_type);
                sessionStorage.setItem('member_pk',result[0].member_pk);
                window.location.href = "{{url('homepage')}}";
            },
            fail: function(){
              console.log('Login Server error');
            }
          });
        },
        fail: function(){
          console.log('Register Server error');
        }
      });
    }
  });
});

//*****************this is validate form function with JavaScript ***************//
function validateForm(){
  var $username = document.getElementById("usernameTxt").value;
  var $fullname = document.getElementById("fullNameTxt").value;
  var $phoneno = document.getElementById("phoneNoTxt").value;
  var $password = document.getElementById("passwordTxt").value;
  var $confirmpassword = document.getElementById("confirmPasswordTxt").value;
  var bool_username, bool_fullname, bool_phoneno, bool_password;
  var total_bool_valid = 0;
  var phoneformat = /^([0][1]\d([0-9]{3}(\d{4}|\d{5})))*$/;

  if($username != null && $username != ''){
    bool_username = 1;
    document.getElementById("required-label-username").innerHTML = "";
  }
  else{
    bool_username = 0;
    document.getElementById("required-label-username").innerHTML = "*Please Enter Username.";
  }

  if($fullname != null && $fullname != ''){
    bool_fullname = 1;
    document.getElementById("required-label-fullname").innerHTML = "";
  }
  else{
    bool_fullname = 0;
    document.getElementById("required-label-fullname").innerHTML = "*Please Enter Full Name.";
  }

  if($phoneno != null && $phoneno != '' && phoneformat.test($phoneno)){
    bool_phoneno = 1;
    document.getElementById("required-label-phoneno").innerHTML = "";
  }
  else{
    bool_phoneno = 0;
    document.getElementById("required-label-phoneno").innerHTML = "*Please Enter Correct Format.";
  }

  if($password != null && $password != ''){
    document.getElementById("required-label-password").innerHTML = "";
    if($password == $confirmpassword){
      bool_password = 1;
      document.getElementById("required-label-confirmpassword").innerHTML = "";
    }
    else{
       bool_password = 0;
       document.getElementById("required-label-confirmpassword").innerHTML = "*Password Is Not Match.";
    }
  }
  else{
    bool_password = 0;
    document.getElementById("required-label-password").innerHTML = "*Please Enter Password.";
  }

  total_bool_valid = bool_username + bool_fullname + bool_phoneno + bool_password;
  if(total_bool_valid == 4){
    return true;
  }
}
//************* validate form function ends *******************//
</script>