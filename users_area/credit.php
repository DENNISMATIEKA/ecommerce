<?php

include('../include/connect.php');
session_start();
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
    body {
        font-family: Arial, sans-serif;
        background-color:rgba(97, 88, 88, 0.81);
        background-image: url('../images/pay.png');
        background-size: cover; 
        background-repeat: no-repeat;
        background-position: center;
    }
        .container {
            width: 30%;
            margin: auto;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .paypal{
            width: 300px;
            height: 50px;
            align-items: center;
        }
        .paypal2{
            width: 100px;
            height: 50px;
        }
</style>
<body>


<div class="container my-5">
    <h1 class="text-center text-info ">Pay With Card</h1>
    <div class="float">
        <img src="../images/paypal-credit-card-icon-11.png" alt="" class="paypal " >
        <img src="../images/gift.png" alt="" class="paypal2 " >
    </div>
    
    <form action="" method="post" class="text-info">
        <div id="credit-card-fields">
            <label for="card-number">Card Number:</label>
            <input type="text" id="card-number" name="card_number" required="required">

            <label for="card-name">Cardholder Name:</label>
            <input type="text" id="card-name" name="card_name" required="required">
            
            <label for="expiry">Expiry Date:</label>
            <input type="text" id="expiry" name="exp_date" placeholder="YY/MM" required="required">

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required="required">
            <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment" >
        </div>
    </form>
</div>
</body>
</html>


<?php

if (isset($_POST['confirm_payment'])) {
    $card_number=$_POST['card_number'];
    $card_name=$_POST['card_name'];
    $exp_date =$_POST['exp_date'];
    $cvv=$_POST['cvv'];

    // Check if email exists
    $select_query = "Select * from `credit_card` where card_number=$card_number or card_name='$card_name' or exp_date='$exp_date' or cvv=$cvv ";
    $result= mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);

    if ($rows_count>0) {
        echo "<script>alert('Data already exists')</script>";
    } else {
        // Insert new user
        $insert_query="insert into credit_card (card_number, card_name, exp_date, cvv ) values($card_number,'$card_name', '$exp_date', $cvv) ";
        $sql_execute=mysqli_query($con, $insert_query);
        //echo "<script>alert('Login to Email to confirm your payment')</script>";   
        echo "<script>window.open('email.php', '_self')</script>";
    }
}
?>
