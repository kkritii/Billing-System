<?php
$admin_id = @$_GET['id'];
if (!isset($admin_id)) {
	header('Location: list_admin.php');
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `admin` WHERE id='$admin_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    header('Location: list_admin.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}