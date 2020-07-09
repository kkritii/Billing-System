<?php
if(isset($_COOKIE["member_login"])){	
	if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $_COOKIE["member_login"];
	echo "<script>window.location='index.php';</script>";
	exit;
}

if(isset($_POST['submit'])){
	// echo "Nepal";exit;
	$u = $_POST['username'];
	$p = md5($_POST['password']);

	$sql = "SELECT * FROM `admin` WHERE (`username`='$u' OR `email`='$u') AND `password`='$p' AND `status`=1 AND `is_verified`=1;";
	//echo $sql;
	require_once('DBConnect.php');
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// echo "Login Successful";exit;
		if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $u;
		$row = mysqli_fetch_assoc($result);
		//echo "<pre>"; print_r($row);exit;
		$_SESSION['u_id'] = $row['id'];
		if(!empty($_POST["remember_me"])) {
				setcookie ("member_login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
			}
		echo "<script>window.location='index.php';</script>";		
        exit; 
	}else{
		echo "<script>alert('Username or Password Incorrect!');</script>";
		echo "<script>window.location='login.php';</script>";
		exit;
	}
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html ; charset=utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/logn.css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play">
	
</head>
<body> <center>
	<div class="signin">
				
			<form action="" method="POST">
				<h2 style="color : white">Log In</h2>
				<input type="text" name="username" id="lf" required="required" placeholder="UserName" autofocus="true"><br>
				<input type="password" name="password"  id="lf" required="required" placeholder="Password"><br><br>
				<input type="checkbox" name="remember_me" id="lf" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
				<label for="lf-me">Remember me</label><br><br><br>
				<input type="submit" name="submit" value="Login" id="lf">
				<br><br>
				Don't have account?<a href="signup.php">&nbsp; Sign Up</a>
			</form>
	
	</div>
</style>
</body>
</html>
