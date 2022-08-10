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
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
<!-- //web font -->
</head>
<body>

<div class="main-w3layouts wrapper">
		<h1>Flat Code and Flat Name</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
<?php
include "lib/database.php";

$db = new database();

$q = "SELECT * FROM zone_name";
$qq = $db->select($q);
?>    
           <table style="width:100%">
           <tbody>
           <tr>
            <th>Serial</th>
            <th>Zone</th>
            </tr>
            <?php
              $q = "SELECT * FROM zone_name";
              $qq = $db->select($q);
             if($qq)
               {
                $i = 1;
               while($res = $qq->fetch_assoc())
               {
            ?>    
            <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $res['zonename'];?></td>
            </tr>
            <?php

} }

?>
            </tbody>
        </table>


<br><br>
<!---<a href="userregistration.php">
<div type="button" class="btn btn-primary">Back</div></a>----><br><br>
</div>
		</div>

		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 Signup Form. All rights reserved | Design by <a href="#" target="_blank">Kawsar</a></p>
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




