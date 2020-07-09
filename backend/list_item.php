<?php
// echo "Nepal";exit();
require_once("DBConnect.php");

$sql = "SELECT * FROM `food` WHERE 1 Limit 0, 30";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Display</title>
	<style type="text/css">
		.A
		{
			width: 100px;
			padding: 5px;
			margin-left: 100px;
			background-color: grey;
		}
		.B
		{
			width: 100px;
			margin-top: 15px;
			padding: 5px;
			margin-left: 100px;
			background-color: grey;
		}
	</style>
</head>
<?php include 'includes/header.php';?>
<p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; Item</p>
<body><center>
	<h2>List of Food Items</h2>
	<a href="add_item.php"><img src="images/add.png" style=" margin-left: 300px;" height="30px">Add Item</a> 
	<table cellpadding="10" cellspacing="0" border="1">
		<tr>
			<th>S.N.</th>
			<th>Food/Drink</th>
			<th>Category</th>
			<th>Price - Rate</th>
			<th>Action</th>
		</tr>
		<?php
		if (mysqli_num_rows($result) > 0) {
			$i=0;
			while($row = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					<td><?= ++$i;?></td>
					<td><?= $row["name"];?></td>
					<td><?= $row["category"];?></td>
					<td><?= $row["price"];?></td>
					<td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_item.php?id=<?= $row['food_id'];?>">Delete</a></td>
				</tr>
				<?php
			}   
		} else {
			?>
			<tr>
				<td colspan="4">No Record(s) found.</td>
			</tr>
			<?php
		}
		?>
		<?php 
		mysqli_close($conn);
		?>
	</div>
</table>
</div>
</center>
<?php include 'includes/footer.php';?>