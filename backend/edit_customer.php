<?php
$customer_id = @$_GET['id'];
if (!isset($customer_id)) {
	header('Location: list_customer.php');
}
require_once("DBConnect.php");
$sql = "SELECT * FROM `customer` WHERE `id`='$customer_id' Limit 0, 10";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);
// echo "<pre>"; print_r($prev_data);exit;


if (isset($_POST['add_customer'])) {
	$customer_id = $_GET['id'];
	$u = $_POST['username'];
	$f=$_POST['firstname'];
	$l=$_POST['lastname'];
	$e = $_POST['email'];


	$sql = "UPDATE `customer` SET `username`='$u',`firstname`='$f',`lastname`='$l', `email`='$e' WHERE `id`='$customer_id';";
	// echo $sql;exit;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "can";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
    header('Location: list_customer.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<?php include 'includes/header.php';?>
		<p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; <a href="list_customer.php">Customer</a> &raquo; Update</p>
		<div class="content">

<h2>Update Customer# <?= $prev_data['id'];?></h2>
<form action="" method="POST" name="customer">
<table>
	<tr>
		<td>Username:</td>
		<td><input type="text" name="username" placeholder="Enter Username" required="required" value="<?= $prev_data['username'];?>"></td>
	</tr>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="firstname" placeholder="Enter Username" required="required" value="<?= $prev_data['firstname'];?>"></td>
	</tr>
	<tr>
		<td>Last Name:</td>
		<td><input type="text" name="lastname" placeholder="Enter Username" required="required" value="<?= $prev_data['lastname'];?>"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email" required="required" value="<?= $prev_data['email'];?>"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add_customer" value="UPDATE"></td>
	</tr>
</table>
</form>
			
		</div>
	<?php include 'includes/footer.php';?>