<?php 
error_reporting(0);
if(isset($_POST["order"])){
$conn=mysqli_connect("localhost","root","","can");
$sql1 = "SELECT * FROM `book` WHERE `user_id`= 1 AND `status` = 1";
	$result=mysqli_query($conn,$sql1);	
	mysqli_num_rows($result);

	while($row1 = mysqli_fetch_assoc($result)){
		$total = $total + $row1['price'];
	}
	echo "<script>alert('Your total price is :$total');</script>";	
	$c=0;
$conn=mysqli_connect("localhost","root","","can");
$sql="UPDATE `book` SET `status`= 0 WHERE `user_id`='1' ";
mysqli_query($conn,$sql);
echo "<script>window.location='order.php'</script>";
}
?>
