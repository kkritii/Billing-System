<?php
$customer_id = @$_GET['id'];
if (!isset($customer_id)) {
	header('Location: list_customer.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `customer` WHERE id='$customer_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: list_customer.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}