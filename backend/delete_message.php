<?php
$user_id = @$_GET['id'];
if (!isset($user_id)) {
	header('Location: message.php');
}
require_once('DBConnect.php');
$sql = "DELETE FROM `message` WHERE id='$user_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: message.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}