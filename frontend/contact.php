<!DOCTYPE html>
<html>
<head>
	<title>Khwopa canteen</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="css\form.css">
	<link rel="stylesheet" type="text/css" href="css\style1.css">
	<link rel="stylesheet" type="text/css" href="css\othernav.css">
	<style type="text/css">
		.wrapper{background-image: url('images/contact-us.jpg');background-size: contain;}
		.contact{ width: 25%;margin-left: 50%;position: absolute;margin-top: 33% }
		hr{border-color: orange;opacity: 0.4}
		.contact li{list-style: none;padding: 10px;}
		.footer{ width: 100%; margin-top: 65%;position: absolute; }
		input,textarea,select{visibility:  0.1; margin-top: 5%;}
		i{font-size: 20px; padding-top: 5%;padding-bottom: 5%;}
	</style>

</head>
<body style="background-image: url('images/contact-us.jpg'); background-size: contain; ">
	<div class="wrapper">
		<?php include('includes/header.php');?>


		<?php
		if (isset($_POST['register'])) {
			$n = $_POST['name'];
			$e = $_POST['email'];
			$r = $_POST['message'];
			$ph = $_POST['phone'];

			$sql = "INSERT INTO `message` (`name`, `email`,`message`,`phone`)
			VALUES ('$n', '$e','$r','$ph')";
			$conn = mysqli_connect("localhost", "root","", "can");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			if (mysqli_query($conn, $sql)) {
				echo "<script>window.location='contact.php';</script>";
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
		?>

		<div class="container" style="float: left; opacity: .8">
			<form action="" method="POST">
				<h1>Send Message</h1>
				<hr>
				<p>Please fill in this form to send a message!!!</p>
				Customer-Name<br>
				<input type="text" name="name" placeholder="Customer-Name">
				<br>
				Email<br>
				<input type="text" name="email" placeholder="Email">
				<br>Phone Number<br>
				<input type="number" name="phone" placeholder="Phone Number">
				<br>
				Message<br>
				<textarea name="message" placeholder="Insert Message" cols=38 rows="8"></textarea>
				<input type="submit" name="register" value="Register" style="margin-left: 25%;margin-top: 5%">
			</form>
		</div>
	</div>
	
	<?php include('includes/footer.php');?>

