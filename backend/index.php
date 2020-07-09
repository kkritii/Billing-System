<?php include 'includes/header.php';?>
<p><a href="index.php" style="text-decoration: none; padding-left: 10px;">Home</a> &raquo; Dashboard<span style="float: right; a margin-right: 10px;">Welcome <?= ucwords($_SESSION['username']);?>!</span></p>
<div class="content">
	<a href="list_admin.php"><img id="im" src="images/admin.png" width="80px" title="Manage Admin"></a>
	<a href="list_customer.php"><img id="im" src="images/customer.jpg" width="80px" title="Manage Customer"></a>
	<a href="list_item.php"><img id="im" src="images/item.png" width="80px" title="Manage Item"></a>
	<a href="list_order.php"><img id="im" src="images/order.png" width="80px" title="Manage Order"></a>
	<a href="message.php"><img id="im" src="images/message.png" width="80px" title="Manage Message"></a>
	<?php /*for ($i=0; $i < 1; $i++) { 
		?>
		<a href="add_user.php"><img id="im" src="images/add.png" width="80px" title="Add User"></a>
	<?php }*/?>
	<a href="../font/index.php" target="_Blank"><img id="im" src="images/frontend.png" width="80px" title="Visit FrontEnd"></a>
</div>
<?php include 'includes/footer.php';?>