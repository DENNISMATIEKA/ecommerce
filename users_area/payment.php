<?php

include('../include/connect.php');
include('../function/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnceeHub</title>
    <!--Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .payment_img{
        width: 100%;
        margin: auto;
        display: block;
    }
    body{
        background-color:rgba(97, 88, 88, 0.81);
        background-image: url('../images/pay.png');
        background-size: cover; 
        background-repeat: no-repeat;
        background-position: center;

    }
</style>
<body>
    <!--php code to acces user id-->
    <?php
    
    $user_ip=getIPAddress();
    $get_user= "Select * from `user_table` where user_ip='$user_ip' ";
    $result=mysqli_query($con, $get_user );
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id']

    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Option</h2>
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-md-12">
            <img src="../images/paypal-credit-card-icon-11.png" alt="" class="payment_img" >
            <!--</div>
            <div class="col-md-6">-->
                <a href="order.php?user_id=<?php   echo $user_id ?>"><h2 class="text-center" >Pay Here</h2></a>
            </div>
        </div>
    </div>
   
</body>
</html>