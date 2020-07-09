<?php
// echo "Nepal";exit();
require_once("DBConnect.php");

$sql = "SELECT * FROM `customer` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>

<?php include 'includes/header.php';?>
<p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; Customer</p>
<div class="content">
    <h1>Customer List</h1>
    <table border="1" cellspacing="0" cellpadding="20">
        <tr>
            <th>S.N.</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $i=0;
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $row["username"];?></td>
                    <td><?= $row["firstname"];?></td>
                    <td><?= $row["lastname"];?></td>
                    <td><?= $row["email"];?></td>
                    <td><a href="edit_customer.php?id=<?= $row['id'];?>">Edit</a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_customer.php?id=<?= $row['id'];?>">Delete</a></td>
                </tr>
                <?php
            }   
        } else {
            ?>
            <tr>
                <td colspan="5">No Record(s) found.</td>
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
