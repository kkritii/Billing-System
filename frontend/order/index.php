<?php 
error_reporting(0);
if(isset($_POST["submit"])){
    $a=$_POST["name1"];
    $c=$_POST["category"];
    $n=$_POST["name"];
    $b=$_POST["quantity"];
    $conn=mysqli_connect("localhost","root","","can");
    $sql = "SELECT * FROM `food` WHERE `food_id`='$a'";
   

    $v=$row["price"];
//exit;
    $price = ($b*$v); 
    //echo $price;
    $sql="INSERT into `book` (`user_id`,`food_id`,`category`,`name`,`quantity`,`status`,`price`) values ('1','$a','$c','$n','$b','1','$price');";
    mysqli_query($conn,$sql);
    //header('location:order.php');
}

?>
<style>


    input[type = number],select{
        background-color: #111;
        padding-left: 10px;
        color: #fff;
        padding: 5px 0px 5px 0px;
        text-align: center;
        border-radius: 10px;
        display: inline-block;
        width: 40%; 
    }
    input[type = submit]{
        background-color: #ee1111;
        border-radius: 10px;
        display: inline-block;
        margin-left: 80px;
        padding: 5px;
        width: 40%;
        /*padding: 0px 20px 0px 20px;*/
    }
    input[type = submit]:hover{
        background-color: #ff1111;
        transform: 0.5s ease;

    }
    label
    {
        display: inline-block;
        width: 25%;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- title -->
    <title>order</title>

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
    <!-- Custom css -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body>

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
                                        <th>SN.</th>
                                        <th>Name</th>
                                        <th>Price/rate</th> 
                                    </tr>
                                    <?php
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $i=0;
                                        while($row = mysqli_fetch_assoc($result)) {

                                          if($row["category"]=="non-veg"){ ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?= $row["name"];?></td>
                                                <td class="text-center"><?= $row["price"];?></td>
                                            </tr>
                                            <?php
                                        }   
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
                                        <th>SN.</th>
                                        <th>Name</th>
                                        <th>Price/rate</th> 
                                    </tr>
                                    <?php
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $i=0;
                                        while($row = mysqli_fetch_assoc($result)) {

                                          if($row["category"]=="veg"){ ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?= $row["name"];?></td>
                                                <td class="text-center"><?= $row["price"];?></td>
                                            </tr>
                                            <?php
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
                                        <th>SN.</th>
                                        <th>Name</th>
                                        <th>Price/rate</th> 
                                    </tr>
                                    <?php
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $i=0;
                                        while($row = mysqli_fetch_assoc($result)) {

                                          if($row["category"]=="drink"){ ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?= $row["name"];?></td>
                                                <td class="text-center"><?= $row["price"];?></td>
                                            </tr>
                                            <?php
                                        }   
                                    }
                                    ?>
                                </table>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div id="about-right" class="text-center">
                  <div class="vertical-heading">
                      <h3> <strong>Desert</strong></h3>
                       <table border="0px" cellpadding="15px" cellspacing="0px">
                                       <tr>
                                        <th>SN.</th>
                                        <th>Name</th>
                                        <th>Price/rate</th> 
                                    </tr>
                                    <?php
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $i=0;
                                        while($row = mysqli_fetch_assoc($result)) {

                                          if($row["category"]=="dessert"){ ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?= $row["name"];?></td>
                                                <td class="text-center"><?= $row["price"];?></td>
                                            </tr>
                                            <?php
                                        }   
                                    }
                                    ?>
                                </table>
                  </div>


              </div>

          </div>   

      </div>
      <hr style="padding: 10px 0px;">

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
                        $sql = "SELECT * FROM food";
                        $result = mysqli_query($conn,$sql);
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            ++$i;
                            ?>
                            <option value="<?=$i?>"><?=$row['name']?></option>
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
                <th>Item
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
                    <td><?= $row['name']?></td>
                    <td><?= $row['quantity']?></td>
                    <td><?= $row['price']?></td>
                    <td><a style="color: #f00" onclick="return confirm('Are you sure you want to remove this item?')" href="delete_item.php?id=<?=$row['food_id']?>">&#10008;</a></td>
                </tr>   
                <?php
            }
            ?>
        </div>
    </table>
    <?php
    if(mysqli_num_rows($result) == 0){
        ?>
        <p style="text-align: center;color: #000;">You have not ordered your Food Yet !!! :)</p>
<?php
}
?>      
<form action="order.php" method="POST">
    <input style="margin:20px 0px 0px 350px;" type="Submit" name="order" value="Confirm Purchase">
</form>




</div>

</div>

</div>   

</div>                




</section>
<!-- About code ends -->

<!-- Team section -->



<script src="js/bootstrap/bootstrap.js"></script>

</body>

</html>