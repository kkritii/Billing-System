<?php
$item_id = @$_GET['id'];
if (!isset($item_id)) {
	header('Location: list_item.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `food` WHERE food_id='$item_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: list_item.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}