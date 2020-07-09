<?php
// echo "Nepal";exit();
require_once("DBConnect.php");

$sql = "SELECT * FROM `book` WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
?>

<?php include 'includes/header.php';?>
<p id="breadcrumb"><a href="index.php" style="padding-left: 10px;">Home</a> &raquo; Order</p>
<div class="content">
    <h1>Order List</h1>
    <table border="1" cellspacing="0" cellpadding="20">
        <tr>
            <th>S.N.</th>
            <th>User-Id</th>
            <th>Food-Id</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            $i=0;
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= ++$i;?></td>
                    <td><?= $row["user_id"];?></td>
                    <td><?= $row["food_id"];?></td>
                    <td><?= $row["quantity"];?></td>
                    <td> <a onclick="return confirm('Are you sure you have serve?')" href="delete_order.php?id=<?= $row['food_id'];?>">Served</a></td>
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
