<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart Home : Amader Adhunik Bari</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="Bootstrap-4/bootstrap.min.css"> -->
   <link rel="icon" type="image/png" href="Login_v1/images/icons/logo.jpg"/>

  <link rel="stylesheet" href="css/style.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="Bootstrap-4/jquery-3.3.1.slim.min.js"></script>   -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- <script src="Bootstrap-4/popper.min.js"></script> -->
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- <script src="Bootstrap-4/bootstrap.min.js"></script> -->

<!--  this for text animate-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  
<style>
    th{
        font-size: 20px;
    }

    #activecolor{
    color: aqua 
    }
    
    .bg-color{
        background-color: darkslategrey;
    }
</style>

</head>
<body>

<!--*********--------- Navbar **********---------->

 <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top font-weight-bold" >
  <!--<a class="navbar-brand" href="index.php"><img src="logo1.png" alt="" style="height: 10%; width: 10%"></a>--->
  
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
<span class="navbar-toggler-icon"></span>
</button>
  
<div class="collapse navbar-collapse" id="collapsibleNavbar">
<!-- ------------ For Navbar Active ------ -->
<?php
include "lib/Session.php";
?>
<?php
    $path = $_SERVER['SCRIPT_FILENAME'];
    $currentpage = basename($path,'.php');
?>
<!-- _________________________________ -->
<ul class="navbar-nav">

    <!-- <li class="nav-item">
      <a class="navbar-brand" id="activecolor" href="#">Home</a>
    </li> -->
<?php
Session::checkSession();
?>
    <li class="nav-item">
        <a <?php if ($currentpage=='index') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php } ?> 
            href="index.php">Home</a>
    </li>
     <?php
      if(Session::get('state') == '1')
      {
     ?>
     <li class="nav-item">
        <a <?php if ($currentpage=='ownerdetails') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php } ?> 
            href="ownerdetails.php">Owner</a>        
    </li>
     <?php 
     }
     elseif(Session::get('state') == '0')
     {
      ?>
     <li class="nav-item">
        <a <?php if ($currentpage=='renterdetails') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php } ?>
            href="renterdetails.php">Renter</a>
    </li>
    <?php
     }

  ?>
    <li class="nav-item">
        <a <?php if ($currentpage=='inbox') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php } ?> 
            href="inbox.php">Inbox</a>
    </li>
     <?php
      if(Session::get('state') == '0')
      {
     ?>
     <li class="nav-item">
         <a <?php if ($currentpage=='profile') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php } ?> 
            href="profile.php">Profile</a>
    </li>
  <?php }else {?>
    <li class="nav-item">
         <a <?php if ($currentpage=='profilerenter') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php } ?> 
            href="profilerenter.php">Profile</a>
    </li><?php } ?>

  <?php
   if(Session::get("state") == '1')
   {
  ?>
     <li class="nav-item">
         <a <?php if ($currentpage=='Payment') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php }?> 
            href="Payment.php">Payment</a>
    </li>
    <?php
      }
      else {
    ?>
    <li class="nav-item">
         <a <?php if ($currentpage=='Total') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php }?> 
            href="Total.php">Receive</a>
    <?php
      }
    ?><?php if(Session::get("state") == '0') {
    ?>
    <li class="nav-item">
         <a <?php if ($currentpage=='uploadedsearch') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php }?> 
            href="uploadedsearch.php">Enlisted</a>
    <?php
      }
    ?>
    <li class="nav-item">
         <a <?php if ($currentpage=='contact') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php } ?> 
            href="contact.php">Contact
        </a>
    </li>
    <!---<?php //if(Session::get("state") == '1') {
    ?>--->
   <li class="nav-item">
        <a <?php if ($currentpage=='notification') { ?> 
                class= "navbar-brand" id='activecolor'  
            <?php }else{ ?> 
                class="navbar-brand text-warning"
            <?php } ?> 
            href="notification.php">Notice</i></a>
    </li><!--<?php //} ?>--->
    <!--<a href="#" target="_blank"><i class="fas fa-bell"></i></a>--->
<!-- ------------------For Logout -------------- -->

<?php
//Session::checkSession();
if(isset($_GET['action']) && $_GET['action']  == 'logout')

{
  Session::destroy();
}
?>
    <li class="nav-item">
        <a href="?action=logout"><button class="btn btn-outline-danger text-uppercase font-weight-bold" type="submit">Logout</button></a>
    </li>
 <!-- _______________ X _______________    -->
  </ul>
</div>

<form class="form-inline p-2" action="/action_page.php">      
       <img src="<?php echo Session::get('image');?>" alt="" height="50px" width="60px">
        <p class="ml-2 pt-2" style="color:whitesmoke">Hello, <strong style="color:burlywood"><?php echo Session::get('name');?></strong></p>

    <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search">
     <button class="btn btn-success" type="submit">Search</button> -->
</form>

</nav>