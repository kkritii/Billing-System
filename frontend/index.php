<?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { 
	echo "<script>window.location='login.php';</script>";
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

	<div class="container">
		<div class="wrapper">
			<div class="overlay"></div>
			<div class="title">
				<h2>Khwopa Canteen</h2>

			</div>
			<?php include 'includes/nav.php';?>
			
			<img class="floaty_img" src="images/fg.jpg"
			style="z-index: 2; ">
			<img class="floaty_img" src="images/fg.jpg" style="position: absolute; left: 10% !important;height: 300px; top: 40%; z-index: 1;animation: none; ">

			<div class="content">
				<div class="st" style="z-index: -1;"></div>
				<div class="st2" style="z-index: -1"></div>
			</div>
			<div id="container1" style="z-index: 100;height: 50vh; width: 100%; /*position: absolute;*/ text-align: center; margin-top: 50px; overflow: hidden; background-color: #f5f5f5;top: 50% " >
			<h1 style="font-family: Cooper Black;">WE SEE FOOD DIFFERENTLY</h1>
			<p>  Khwopa Canteen offers a wide variety of food and other needs from Sunday to Friday on a self-service basis.
			Clean, vibrant and fully air-conditioned, it features a well-appointed lounging area for students and teachers that is conducive for community interaction between and among members of the community. The lounging area is equipped with a purified water dispenser and two modern lavatories with soap dispensers for sanitation and grooming. </p>
			<p>With a wide variety of nutritious foods to choose from, even the budget-tight scholars can now afford to dine in this first-class canteen because the prices were capped with a ceiling.</p>
			</div>
				<?php include 'includes/footer.php';?>
		</div>
	</div>
	
