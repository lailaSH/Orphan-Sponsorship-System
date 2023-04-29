<!DOCTYPE html>
<html lang="en">
<head>
	<title>تسجيل الدخول</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('login01/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}
	">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/vendor/animsition/css/animsition.min.css') }}
	">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/vendor/select2/select2.min.css') }}
	">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/vendor/daterangepicker/daterangepicker.css') }}
	">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login01/css/main.css') }}
	">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('login01/images/2.jpg')}}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
تسجيل الحساب				</span>

				<form class="login100-form validate-form p-b-33 p-t-5" method="GET" action="{{ route('MainPage') }}">
					@csrf
					<div class="wrap-input100 validate-input" data-validate = "ادخل اسم المستخدم">
						<input  type="text" class="input100" name="name"  required  placeholder="ادخل اسم المستخدم ">
					</input>
			   
					</div>
					<div class="wrap-input100 validate-input" data-validate="ادخل كلمة المرور">
						<input class="input100 " type="password" name="password"  placeholder="كلمة المرور">
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							تسحيل دخول
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('login01/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login01/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login01/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('login01/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login01/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login01/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('login01/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login01/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login01/js/main.js') }}"></script>

</body>
</html>