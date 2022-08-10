<!DOCTYPE html>
<html>
<head>
<title>Amader Adhunik Bari Renter Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="Login_v1/images/icons/logo.jpg"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="Sign_Up/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/stylekawsar.css" rel="stylesheet" type="text/css" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>

<?php
/*-----------Connected to user_data.php in class folder----*/
include "class/user_Data.php";

 $logrent = new userdata();
 
 if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit'])){
 $inserting = $logrent->userlogiin($_POST,$_FILES);
 }
?>
<!-- main -->
<div class="main-w3layouts wrapper">
		<h1>Renter Registration Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
			<!----To select the flat_code , flat_no,building_name and show it in the specific registration panel---->
			 <?php
                   if(isset($_GET['uploadid']))
                   {
	                   $uid = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['uploadid']);
	                   $query = $logrent->showselected($uid);
	                   if($query)
	                   {
		                 while($r = $query->fetch_assoc())
		                {

?>
		<form action="" method="post" enctype="multipart/form-data">
      <?php
  if(isset($inserting))
  {
    echo $inserting;
  }
?>  
			<input type="text" name="name" placeholder="name" required=""><br>


				<select name="gender" required="">
					<option>Select gender</option>
                    <option>Male</option>
                    <option>Female</option>
					<!---<?php
                                  /*$gender = $logrent->gender();
                                 if($gender)
                                 {
                                    //$i=0;
                                  
                                while($result = $gender->fetch_assoc())
                                    {
                                        //$i++;

                                ?>
                                    <option value="<?php echo $result['gid']; //$i; ?>"><?php echo $result['gender_name']; ?></option>
                                   <?php } } */?>--->
				</select><br><br>

                <input type="text" name="voterid" placeholder="voterid" minlength="10" maxlength="10" required=""><br>

                <input type="text" name="proff" placeholder="Profession" required=""><br>

                <input type="text" name="company" placeholder="Company" required=""><br>

                <input type="text" name="number" placeholder="Number" required=""><br>

                 <input type="text" name="email" placeholder="Email" required=""><br>

                 <select name="title" required="">
					<option>Select title</option>
                    <option>Renter</option>
					     <!---<?php
                                  /*$Title = $logrent->title();
                                 if($Title)
                                 {
                                    //$i=0;
                                  
                                while($result = $Title->fetch_assoc())
                                    {
                                        //$i++;

                                ?>
                                    <option value="<?php echo $result['title_id']; //$i; ?>"><?php echo $result['title_name']; ?></option>
                                   <?php } } */?>--->
                               </select><br><br>

                    <input type="password" name="pass" placeholder="Password" required=""><br>
                  <input type="text" name="bname" required readonly value="<?php echo $r['bname'];?>"><br>
                  <input type="text" name="flat_no" required readonly value="<?php echo $r['flat_no'];?>"><br>

                      <input type="hidden" name="flat_code" required readonly value="<?php echo $r['flat_code'];?>">

                      <input type="text" name="rent" required readonly value="<?php echo $r['rent'];?>"><br>

                       <input type="text" name="zone_name" required readonly value="<?php echo $r['zone_name'];?>"><br>

                       <input type="text" name="agreement" required readonly value="<?php echo date("Y-m-d",strtotime("+".$r['agreement']."years"));?>"><br>

                      <input type="hidden" name="state" required readonly value="1"><br>

                    <input type="file" name="image" required=""><br>

                    <div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="submit" value="SIGNUP"> 
				</form>
				 <?php } } } ?>
              <a href="zonename.php" target="_blank">
             <div type="button" class="btn btn-primary">Zone</div></a>
				<p>Don't have an Account? <a href="loginrenter.php"> Login Now!</a></p>
			</div>
		</div>

		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 Signup Form. All rights reserved | Design by <a href="#" target="_blank">Kawsar & Avishek</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>






