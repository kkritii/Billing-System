<?php
	if(isset($_POST['submit'])) {
		$u = $_POST['username'];
$f=$_POST['firstname'];
$l=$_POST['lastname'];
$e=$_POST['email'];
$p=$_POST['password'];
$re_p=$_POST['password-re'];
if ($p != $re_p) {
		echo '<script type="text/javascript">alert("Password & Confirm Password don\'t match.");</script>';
	}

	$sql="INSERT INTO `admin`(`username`,`firstname`,`lastname` ,`email`,`password`) VALUES('$u','$f','$l','$e',md5('$'))";

	$conn = mysqli_connect("localhost", "root","", "can");
// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		if (mysqli_query($conn, $sql)) {
			header(`Location:login.php`);
		}
		else{
			echo"Error: ".$sql."<br>". mysqli_error($conn);
			}
			mysqli_close($conn);
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html ; charset=utf-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/logn.css"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play">
	
</head>
<body>
	
	<center>
		<h2>SignUp Khwopa Canteen</h2>
	<div class="signup">
		<form action="" method="POST" name="admin">
			<h2 style="color: #fff">Sign Up</h2>
			<input type="text" name="username" placeholder="Username" required="required" /><br><br>
			<input type="text" name="firstname" placeholder="First Name" required="required"/><br><br>
			<input type="text" name="lastname" placeholder="Last Name" required="required"/><br><br>
				<input type="password" name="password" placeholder="Password" required="required"/><br><br>
			<input type="password" name="password-re" placeholder="Confirm Password" required="required"/><br><br>
			<input type="email" name="email" placeholder="Email address" required="required"/><br><br>
				<a href="login.php"><input type="submit" name="submit" value="Sign Up"></a>		
</form>
</center>
	</div>
</body>
</html>