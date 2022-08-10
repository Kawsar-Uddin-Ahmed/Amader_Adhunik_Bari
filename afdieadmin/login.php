<?php

include "../class/adminlogin.php";

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link rel="icon" type="../image/png" href="../Login_v1/images/icons/logo.jpg"/>
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>

<?php
  $log = new adminlogin();
  if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['login']))
  {
  	$username = $_POST['name'];
  	$pass = md5($_POST['password']);

  	$logincheck = $log->logadmin($username,$pass);
  }

?>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>

			<?php
             if(isset($logincheck))
             {
             	echo $logincheck;
             }
			?>
			<div>
				<input type="text" placeholder="Username" required="" name="name"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" name="login" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#" target="_blank">Amader Adhunik Bari</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>