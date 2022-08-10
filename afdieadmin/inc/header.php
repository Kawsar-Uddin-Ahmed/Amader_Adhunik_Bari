
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<?php

include "../lib/Session.php";

 Session::checkSession();//This used so that without login you cannot access any page after login cannot go back to the login page
 
?> 
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Control Panel</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="icon" type="../image/png" href="../Login_v1/images/icons/logo.jpg"/>
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">

                    <a href="adminindex.php"><img src="img/logo1.png" alt="Logo" /></a>
				</div>
				<div class="floatleft middle">
					<h1><a href="adminindex.php">Smart Home : Amader Adhunik Bari</a></h1>
					<p>www.aab.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello<?php echo ' '.Session::get("name"); ?></li>
            <!------For logout----------------------------->
                        <?php 
                           if(isset($_GET['action']) && $_GET['action'] == 'logout')
                           {
                             Session::destroy();
                           }
                         ?>
                    <!---------------------------->
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="adminindex.php"><span>Dashboard</span></a> </li>
               <!---<li class="ic-form-style"><a href="contact.php"><span>Contact</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>------>
                <li class="ic-charts"><a href="shiftsearch.php"><span>Pending search engine</span></a></li>
                 <li class="ic-charts"><a href="addzone.php"><span>Adding zone</span></a></li>
                 <li class="ic-charts"><a href="Aftershiftsearch.php"><span>Approved flat</span></a></li>
                 <li class="ic-charts"><a href="userblock.php"><span>Blocked customer</span></a></li>
                 <li class="ic-charts"><a href="pendingowner.php"><span>Pending user</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>

        <div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
               <li><a class="menuitem">Site Option</a>
                    <ul class="submenu">
                        <!---<li><a href="titleslogan.php">Title & Slogan</a></li>
                        <li><a href="social.php">Social Media</a></li>
                        <li><a href="copyright.php">Copyright</a></li>--->
                        
                    </ul>
                </li>
                
                 <!---<li><a class="menuitem">Update Pages</a>
                    <ul class="submenu">
                        <li><a>About Us</a></li>
                        <li><a>Contact Us</a></li>
                    </ul>
                </li>---->
                <li><a class="menuitem">User Option</a>
                    <ul class="submenu">
                        <li><a href="userlist.php">User List</a> </li>
                         <li><a href="zonelist.php">Zone List</a> </li>
                    </ul>
                </li>
                <!--<li><a class="menuitem">Renter Option</a>
                    <ul class="submenu">
                        <li><a href="renterlist.php">Renter List</a> </li>-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
    