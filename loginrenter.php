
<!DOCTYPE html>
<html lang="en">
<head>
	  <title>Smart Home : Amader Adhunik Bari</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
  <link rel="icon" type="image/png" href="Login_v1/images/icons/logo.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v1/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
<!-------This is for the search engine button------------------->
					<div>
					<a  href="search.php" target="_blank"><button class="btn btn-success btn-lg"><span style='color:white'>Search your home.If you did not it.</span></button>
						</div>
	 <!------------------------------------------------------------------->
					<img src="Login_v1/images/logo1.png" alt="IMG"></a>
                </div>

<?php
include "class/logrenter.php";
/*include "lib/Session.php";
$login = Session::get('login');
if($login == true)
{
	header("Location:index.php");
}*/
?>
                
<?php

$uselog = new logrenter();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$Email= $_POST['email'];
    $Password   = md5($_POST['pass']);
	$renterlog = $uselog->loginrenter($Email,$Password);
}

?>
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Renter Login
                    </span>


					<div class="wrap-input100 validate-input">
						<input class="input100" type="text"  name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
<!-- ------------ show Message -------------- -->

<?php
if(isset($renterlog))
{
	echo $renterlog;
}

?>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
							</button><br><br><br><br>
						<a href="login.php" target="_blank">Owner Login</a>
						</div>
							<div class="container-login100-form-btn">
						<a href = "terms.php">Terms & Conditions </a></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="Login_v1/js/main.js"></script>

</body>
</html>

<!-- ________________________________________ X X X X  ___________________________________________________________ -->



