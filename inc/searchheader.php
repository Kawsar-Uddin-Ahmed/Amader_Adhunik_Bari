<!DOCTYPE html>
<html>
<head>
	<title>Smart Home : Amader Adhunik Bari</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
<head>
	<link rel="icon" type="image/png" href="Login_v1/images/icons/logo.jpg"/>
<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<a href="login.php"><img src="logo1.png" alt="Logo"/></a>
				<h2>Smart Home :</h2>
				<h2>Amader Adhunik Bari</h2>
				<p>A smart software</p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="https://www.linkedin.com/home" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="https://www.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
				<a href="login.php"><i class="fa fa-arrow-left"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="searchdetails.php" method="post">
				<input type="text" name="search" required placeholder="Search zone..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
</body>
</head>
<!---It is already in style.css but it is given here for browser those who does not support css file--->
<style>

.contentsection {
  background: #ffffff none repeat scroll 0 0;
  border: 1px solid #ca932f;
  padding: 15px;
}
.maincontent {  
  background: #fef4e5 none repeat scroll 0 0;
  border: 1px solid #ded4c5;
  margin: 10px 6em 10px 7em;
  padding: 1em 4em;
  width: 606px;
  /*float:left;
    margin: 0 15px 15px 0;
    padding: 8px 15px;
    */
}
.samepost {
  font-weight: normal;
  font-size: 16px;
  line-height: 24px;
  text-align: justify;
}
.samepost h2, .about h2 {
  border-bottom: 2px solid #e0d6c7;
  color: #ac7511;
  font-size: 30px;
  margin-bottom: 4px;
  padding: 10px 10px 10px 0;
}
.samepost h2 a{
  color: #ac7511;
  text-decoration: none;
}
.samepost h4,.about h4 {
  font-weight: normal;
  margin-bottom: 10px;
  margin-top: 0;
}
.samepost h4 a, .about h4  a{text-decoration:none;color:#3399FF;}
.samepost img {
  background: #fff none repeat scroll 0 0;
  border: 1px solid #ebb450;
  float: left;
  margin-right: 10px;
  padding: 5px;
  width: 200px;
}
.samepost p {
  font-size: 25px;
  line-height: 23px;
  text-align: justify;
}
.samepost td {
  font-size: 18px;
  line-height: 23px;
  text-align: justify;
}

.pagination{display:block;font-size:20px;margin-top:10px;padding:10x;
             text-align:center;}
.pagination a{
   background : #e6af4b none repeat scroll 0 0;
   border : 1px solid #a7700c;
   border-radius : 3px;
   color: #333;
   margin-left : 2px;
   padding : 2px 10px;
   text-decoration: none;

}
.pagination a:hover{
  background : #be8723 none repeat scroll 0 0 ;
  color:#fff;
  
}
</style>