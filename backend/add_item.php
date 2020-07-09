<?php

if (isset($_POST['add_item'])) {
	// echo "Nepal";exit();
	$n = $_POST['name'];
	$c = $_POST['category'];
	$p = $_POST['price'];


	$sql = "INSERT INTO `food` (`name`, `category`,`price`) VALUES
	('$n', '$c','$p')";
	//echo $sql;
	require_once("DBConnect.php");

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully.";
    header('Location: list_item.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<?php include 'includes/header.php';?>
<p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo;<a href="list_item.php" style="padding-left: 10px;">List_item</a> &raquo; Add Item</p>
		<div class="content">

<h1>Add Item</h1>
<form action="" method="POST" name="item">
<table>
	<tr>
		<td>Food Name:</td>
		<td><input type="text" name="name" placeholder="Enter FoodName" required="required"></td>
	</tr>
	<tr>
		<td>Food-Id:</td>
		<td><input type="text" name="category" placeholder="Enter Category" required="required"></td>
	</tr>
	<tr>
		<td>Price:</td>
		<td><input type="number" name="price" placeholder="Enter Price" required="required"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add_item" value="ADD ITEM"></td>
	</tr>
</table>
</form>
			
		</div>
	<?php include 'includes/footer.php';?>