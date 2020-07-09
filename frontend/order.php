<?php 
error_reporting(0);
if(isset($_POST["submit"])){
    $a=$_POST["name1"];
    $b=$_POST["quantity"];
    $conn=mysqli_connect("localhost","root","","can");
    $sql1 = "SELECT * FROM `food` WHERE `food_id`='$a'";
    $result=mysqli_query($conn,$sql1);
    mysqli_num_rows($result);
    $row1 = mysqli_fetch_assoc($result);

    $v=$row1["price"];
//exit;
    $price = ($b*$v); 
    //echo $price;
    $sql="INSERT into `book` (`user_id`,`food_id`,`quantity`,`status`,`price`) values ('1','$a','$b','1','$price');";
    mysqli_query($conn,$sql);
    //header('location:order.php');
}

require_once("DBConnect.php");
$sql = "SELECT * FROM `food`";
?>
 <!-- Bootstrap Css -->
 <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
    <!-- Custom css -->
<link rel="stylesheet" href="css/style1.css">
<style type="text/css">
    
</style>

<?php include 'includes/header.php';?>
    <!-- About code starts -->
    <section id="about" style="background-image:url('bg.jpg'); background-attachment:fixed; background-size: cover;">
    <!-- about part1 -->
    <div id="about-01" class="text-center">
        <div class="content-box-lg" >
            <div class="container">
                <div class="row">
                    <!-- about left side -->
                    <div class="col-md-3">
                        <div id="about-left" class="text-center">
                            <div class="vertical-heading">
                                <h3> <strong>Non-veg</strong></h3>
                                <table border="0px" cellpadding="15px" cellspacing="0px">
                                   <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price/rate</th> 
                                </tr>
                                <?php
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $i=0;
                                    while($row = mysqli_fetch_assoc($result)) {
                                       if($row["category"]=="non-veg"){ 
                                        ?>
                                        <tr>
                                            <td><?=$row["food_id"];?></td>
                                            <td style="width: 100%"><?= $row["name"];?></td>
                                            <td class="text-center" ><?= $row["price"];?></td>
                                        </tr>
                                        <?php
                                    }  } 
                                }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="about-left" class="text-center">
                            <div class="vertical-heading">
                             <h3> <strong>Veg</strong></h3>
                             <table border="0px" cellpadding="15px" cellspacing="0px">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price/rate</th> 
                                </tr>
                                <?php
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        ++$i;
                                        if($row["category"]=="veg"){ 
                                            ?>
                                            <tr>
                                                <td><?=$row["food_id"];?></td>
                                                <td><?= $row["name"];?></td>
                                                <td class="text-center" ><?= $row["price"];?></td>
                                            </tr>
                                            <?php
                                        }  
                                    } 
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- about ko right side ko lagi -->
                <div class="col-md-3">
                    <div id="about-right" >
                        <div class="vertical-heading">
                           <h3> <strong>Drinks</strong></h3>
                           <table border="0px" cellpadding="15px" cellspacing="0px">
                               <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price/rate</th> 
                            </tr>
                            <?php
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    ++$i;
                                    if($row["category"]=="drink"){ 
                                        ?>
                                        <tr>
                                            <td><?=$row["food_id"];?></td>
                                            <td><?= $row["name"];?></td>
                                            <td class="text-center" ><?= $row["price"];?></td>
                                        </tr>
                                        <?php
                                    }  } 
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="about-right" class="text-center">
                        <div class="vertical-heading">
                            <h3> <strong>Dessert</strong></h3>
                            <table border="0px" cellpadding="15px" cellspacing="0px">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price/rate</th> 
                                </tr>
                            <?php
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    ++$i;
                                    if($row["category"]=="dessert"){ 
                                        ?>
                                        <tr>
                                            <td><?=$row["food_id"];?></td>
                                            <td><?= $row["name"];?></td>
                                            <td class="text-center" ><?= $row["price"];?></td>
                                        </tr>
                                        <?php
                                    }  } 
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
            <hr style="padding: 10px 0px; ">
            <div class="row">
                <!-- about left side -->
                <div class="col-md-6">
                    <div id="about-left">
                        <div class="vertical-heading">
                           <h3 style="font-family: 'Concert One'; padding: 20px 0px;"> <strong>Your Order</strong></h3>
                           <form method="POST" action="" name="form" id="form-order">
                            <label style="color: black;  display: inline-block;">Select Food Item:</label>
                                <select name="name1" required="required">
                                    <option value="0">--</option>
                                    <?php
                                    $conn=mysqli_connect("localhost","root","","can");
                                    $sql = "SELECT * FROM `food` ";
                                    $result = mysqli_query($conn,$sql);
                                    $i = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                        ++$i;
                                        ?>
                                        <option value="<?=$row['food_id']?>"><?=$row['name']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            <br>
                            <label style="color: black;  display: inline-block;">Quantity:<br></label>
                            <input type="number" name="quantity" required="required"><br><br>
                            <input type="submit" name="submit" value="Order">
                            </form>
                        </div>
                    </div>
                 </div>
                <div class="col-md-6">
                    <div id="about-right">
                        <div class="vertical-heading">
                        <h3 style="font-family: 'Concert One'; padding: 20px 0px;"> <strong>Your Bill</strong></h3>
                        </div>
                       <?php
                       $conn=mysqli_connect("localhost","root","","can");
                       $sql = "SELECT * FROM `book` WHERE `status` = 1";
                       $result = mysqli_query($conn,$sql);
                       ?>
                       <div id="table-head">
                        <table cellpadding="10px" cellspacing="0px"  border="1px" align="center" style="color: #000;" class="text-center">
                            <tr>
                                <th>SN.</th>
                                <th>Id</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $i = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                ++$i;
                                ?>

                                <tr>
                                    <td><?=$i?></td>
                                    <td><?= $row['food_id']?></td>
                                    <td><?= $row['quantity']?></td>
                                    <td><?= $row['price']?></td>
                                    <td><a style="color: #f00" onclick="return confirm('Are you sure you want to remove this item?')" href="delete_item.php?id=<?=$row['food_id']?>">&#10008;</a></td>
                                </tr>   
                                <?php
                            }
                            ?>
                        </table>
                        </div>
                        <?php
                        if(mysqli_num_rows($result) == 0){
                            ?>
                            <p style="text-align: center;color: #000;">You have not ordered your Food Yet !!! :)</p>
                        <?php
                        }
                        ?>
                        <form action="bill.php" method="POST">
                            <input style="margin:20px 0px 0px 350px;" type="Submit" name="order" value="Confirm Purchase" onclick="document.getElementById('id01').style.display='block'">
                        </form>

                    </div>

                </div>

            </div>   
</div></div></div>
        </div>                
    </section>
<!-- About code ends -->

<!-- Team section -->



<script src="js/bootstrap/bootstrap.js"></script>
<?php include 'includes/footer.php';?>