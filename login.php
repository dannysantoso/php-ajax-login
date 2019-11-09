<title>Login - Cooties</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="login_style.css">
<link rel="stylesheet" type="text/css" href="font.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="login_script.js"></script>

<!------ Include the above in your HEAD tag ---------->
<div class="background"></div>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
										<p id="demo-login1" style="color: red;"></p>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
										<p id="demo-login2" style="color: red;"></p>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button type="button" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login">Log In</button>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username-register" tabindex="1" class="form-control" placeholder="Username">
										<p id="demo1" style="color: red;"></p>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email-register" tabindex="1" class="form-control" placeholder="Email Address">
										<p id="demo2" style="color: red;"></p>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password-register" tabindex="2" class="form-control" placeholder="Password">
										<p id="demo3" style="color: red;"></p>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password-register" tabindex="2" class="form-control" placeholder="Confirm Password">
										<p id="demo4" style="color: red;"></p>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button type="button" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register">Register Now</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function addUser(){

		$.ajax({
			url: 'http://localhost/cake_store/DataManagementController.php',
			type: 'POST',
			data: {
				username: $('#username-register').val(),
				password: $('#password-register').val(),
				confirmpassword: $('#confirm-password-register').val(),
				email: $('#email-register').val()
			},
			dataType: 'json',
			success: function(data){

				if(data == 'success'){

					alert('success');
					window.location.href = 'http://localhost/cake_store/login.php';
					
				}else{
					alert('Gagal Registrasi');
				}
			}
		});
		}

		function loginUser(){

		$.ajax({
			url: 'http://localhost/cake_store/DataManagementController.php',
			type: 'POST',
			data: {
				usernamelogin: $('#username').val(),
				passwordlogin: $('#password').val()
			},
			dataType: 'json',
			success: function(data){

				if(data == 'member'){

					window.location.href = 'http://localhost/cake_store/home.php';	
					
				}else if(data == 'admin'){

					alert('welcome admin');

				}else{

					alert('username dan password salah');

				}
			}
		});
		}
	
	$(document).ready(function(){

			$('#username-register').on('click', function(){
				document.getElementById("demo1").innerHTML = '';
			});
			$('#email-register').on('click', function(){
				document.getElementById("demo2").innerHTML = '';
			});
			$('#password-register').on('click', function(){
				document.getElementById("demo3").innerHTML = '';
			});
			$('#confirm-password-register').on('click', function(){
				document.getElementById("demo4").innerHTML = '';
			});
			
			$('#username').on('click', function(){
				document.getElementById("demo-login1").innerHTML = '';
			});
			$('#password').on('click', function(){
				document.getElementById("demo-login2").innerHTML = '';
			});
	});


	$(document).ready(function(){

			$('#register-submit').on('click', function(){
				

				var $username = $('#username-register').val();
				var $password = $('#password-register').val();
				var $confirmpassword = $('#confirm-password-register').val();
				var $email = $('#email-register').val();
				
				if($username == '' || $username.length < 5){
					document.getElementById("demo1").innerHTML = 'username harus diisi atau lebih dari 5 character';
				}else if($email == '' || $email.length < 5){
					document.getElementById("demo2").innerHTML = 'email harus diisi atau lebih dari 5 character';
				}else if(validateEmail() != true || !($email.endsWith('.com'))){
					document.getElementById("demo2").innerHTML = 'format email tidak sesuai';
				}else if($password == '' || $password.length < 5){
					document.getElementById("demo3").innerHTML = 'password harus diisi atau lebih dari 5 character';
				}else if($confirmpassword == '' || $confirmpassword.length < 5){
					document.getElementById("demo4").innerHTML = 'confirm password harus diisi atau lebih dari 5 character';
				}else if($confirmpassword != $password){
					document.getElementById("demo4").innerHTML = 'password harus sesuai';
				}else{
				 	
						addUser();
					
				}
			});
	});

	$(document).ready(function(){

			$('#login-submit').on('click', function(){
				
				var $username = $('#username').val();
				var $password = $('#password').val();
				
				if($username == '' || $username.length < 5){
					document.getElementById("demo-login1").innerHTML = 'username harus diisi atau lebih dari 5 character';
				}else if($password == '' || $password.length < 5){
					document.getElementById("demo-login2").innerHTML = 'password harus diisi atau lebih dari 5 character';
				}else{
						loginUser();
							
				}
			});
	});

	function validateEmail(){
		var at=0;
		var email = $("#email-register").val();
		for(var i = 0; i<email.size;i++){
			if(email.value.charAt(i)=='@'){
				at = at + 1;
			}		
		}

		if(at > 1){
			return false;
		}else{
			return true;
		}
	}

	

	</script>