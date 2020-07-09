<?php
$food_id = @$_GET['id'];
echo "$food_id";
if (!isset($food_id)) {
	header('Location: order.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `book` WHERE `food_id`='$food_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: order.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}