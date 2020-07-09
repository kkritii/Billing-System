<?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { 
	echo "<script>window.location='login.php';</script>";
	exit;
}
$p=$_SESSION['username'];
	$conn = mysqli_connect('localhost', 'root','','can');
	if($conn-> connect_error){
		die("Connection failed:". $conn-> connect_error);
	}
	$sql = "SELECT username from `customer` where `username`='$p'";
	$result = $conn-> query($sql);
	if($result-> num_rows ==0){
echo "<script>window.location='login.php';</script>";
	exit;

	}
?>