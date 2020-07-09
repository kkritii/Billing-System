<div style="width: 90%;border-radius: 5px;padding-left: 5%;padding-right: 5%;margin-left: 5%;">

<?php
$conn = mysqli_connect("localhost","root", "", "can");
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `message` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
?>
<?php include 'includes/header.php';?>
<p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; Message</p>
<div class="content">
	<h1>Message List</h1>
	<table border="1" cellspacing="0" cellpadding="20" width="100%">
		<tr>
			<th>S.N.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Message</th>
			<th>Action</th>
		</tr>
		<?php
		if (mysqli_num_rows($result) > 0) {

			$i=0;
			while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";

				?>
				<tr>
					<td><?= ++$i;?></td>
					<td><?= $row["name"];?></td>
					<td><?= $row["email"];?></td>
					<td><?= $row["phone"];?></td>
					<td><?= $row["message"];?></td>
					<td><a style="color: #F00;" onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_message.php?id=<?= $row['id'];?>">&#10008;</a></td>
				</tr>
				<?php
			}	
		} else {
			?>
			<tr>
				<td colspan="3">No Record(s) found.</td>
			</tr>
			<?php
		}
		?>
		<?php 
		mysqli_close($conn);
		?>
	</table>
</div>
<?php include 'includes/footer.php';?>