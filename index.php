<!DOCTYPE html>
<html>
<?php 
session_start(); 
require_once("connectDB.php");
require_once("loginTools.php");

if(isset($_SESSION['UserID'])){
	load('home.php');
	exit();
}

?>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
  <title>BikeShare</title>
	<meta name="author" content="name">
	<meta name="description" content="description here">
	<meta name="keywords" content="keywords,here">
	<link rel="stylesheet" href="css/stylesheet.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> 
</head>

<body>
	

	<div id="navbar" class="">
		<a class="activenav" href="">Home</a>
		<a href="">Hire</a>
		<a href="">About</a>
		<div>
			<a class="lognav" href="register.php">Register</a>
			<a class="lognav" href="login.php">Login</a>
		</div>
	</div>

	<script src="js/navbar.js"></script>

<form class="searchFunc " action="">
		<input class="searchBox" type="text" placeholder="Where to?" name="search">
	</form>

 <div class="overlay">
  <div class="slideshow">
  <!-- Full-width images with number and caption text -->
  <div class="slides fadein">
    <img src="img/cycedin2.jpg" style="width:100%">
  </div>

  <div class="slides fadein">
    <img src="img/cycedin1.jpg" style="width:100%">
  </div>

  <div class="slides fadein">
    <img src="img/edin3.jpg" style="width:100%">
  </div>
	
</div>
</div>
	<p class="text">Easy to hire Bikes with BikeShare</p>
	
	<script src="js/slideshow.js"></script>
		
	
	<div id="mapCont">
		<div id="map" style="width:100%; height: 100%; margin:auto;"></div>
	</div>
	<script src="js/map.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClwGcC8uXvulxmvs_3GhG5vVT-4m6RwXI&callback=myMap"></script>
	
	<div class="footer"></div>

</body>

</html>