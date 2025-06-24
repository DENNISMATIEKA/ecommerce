<?php

include('../include/connect.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id=$_GET['order_id'];
    $select_data="Select * from `user_order` where order_id=$order_id ";
    $result=mysqli_query($con, $select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}

/*if (isset($_POST['confirm_payment'])) {
    $invoice_number= $_POST['invoice_number'];
    $amount= $_POST['amount'];
    $payment_mode= $_POST['payment_mode'];
    $insert_query="Insert into `user_payments` (order_id, invoice_number, amount, payment_mode) values($order_id,$invoice_number,$amount,'$payment_mode') ";
    $result=mysqli_query($con, $insert_query);

    if ($result) {
        echo "<h3 class='text-center text-light'>Successfully Completed The Payment</h3>";
        echo "<script>window.open('profile.php?my_orders', '_self')</script>";
    }

    $update_query="update `user_order` set order_status ='Complete' where order_id=$order_id ";
    $result_orders=mysqli_query($con, $update_query);
}*/

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
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
            width: 50%;
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
            width: 280px;
            height: 30px;
        }
</style>
<body>
    <div class="container my-5">
        <h1 class="text-center text-info ">Confirm Payment</h1>
        <form action="" method="post" >
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <input type="text" class="form-control w-50 m-auto " name="invoice_number" value="<?php echo $invoice_number ?>" >
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <label for="" class="text-secondary" >Amount</label>
                <input type="text" class="form-control w-50 m-auto " name="amount" value="$<?php echo $amount_due ?>" >
            </div>
            <div class="container text-info">

                <h2 class="text-bold" >Delivery</h2>
        
                <label for="first_name">Country</label>
                <input type="text" id="country" name="country"><br><br>

                <label for="first_name">First name:</label>
                <input type="text" id="first_name" name="first_name"><br><br>

                <label for="full_name">Full name:</label>
                <input type="text" id="full_name" name="full_name"><br><br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address"><br><br>

                <label for="apartment_suite_company_business">Apartment, suite, company or business name:</label>
                <input type="text" id="apartment_suite_company_business" name="apartment_suite_company_business"><br><br>

                <label for="city">City:</label>
                <input type="text" id="city" name="city"><br><br>

                <label for="postal_code">Postal code (optional):</label>
                <input type="text" id="postal_code" name="postal_code"><br><br>

                <label for="phone_number">Phone number:</label>
                <input type="text" id="phone_number" name="phone_number"><br><br>
       
                <h2>Payment Information</h2>
                <form action="process_payment.php" method="POST">
                    <img src="../images/paypal-credit-card-icon-11.png" alt="" class="paypal" >
                    <label for="payment-method">Choose Payment Method:</label>
                    <select id="payment-method" name="payment_method" onchange="togglePaymentFields()">
                        <option value="Choose_Payment_Method">Choose Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cashapp">cashapp</option>
                        <option value="venmo">Venmo</option>
                        <option value="zelle">Zelle</option>
                    </select>

                    <!--<div id="credit-card-fields">
                        <label for="card-number">Card Number:</label>
                        <input type="text" id="card-number" name="card_number" required="required">

                        <label for="card-name">Cardholder Name:</label>
                        <input type="text" id="card-name" name="card_name" required="required">

                        <label for="expiry">Expiry Date:</label>
                        <input type="text" id="expiry" name="exp_date" placeholder="MM/YY" required>

                        <label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" required="required">
                        <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment" >
                    </div>-->

                    <div id="credit-card-fields" style="display: none;">
                        <p>Click the button below to proceed with Credit Card payment:</p>
                        <button type="button" onclick="window.location.href='credit.php' ">Pay with Credit Card</button>
                    </div>

                    <div id="paypal-fields" style="display: none;">
                        <p>Click the button below to proceed with PayPal payment:</p>
                        <button type="button" onclick="window.location.href='paypal.php' ">Pay with PayPal</button>
                    </div>

                    <div id="gift-card-field" style="display: none;">
                        <p>Click the button below to proceed with Gift Card payment:</p>
                        <button type="button" onclick="window.location.href='gift_card.php' ">Pay with Gift Card</button>
                    </div>
                    
                    <div id="cashapp-field" style="display: none;">
                        <p>Click the button below to proceed with CashApp payment:</p>
                        <button type="button" onclick="window.location.href='cashapp.php' ">Pay with CashApp</button>
                    </div>

                    <div id="venmo-field" style="display: none;">
                        <p>Click the button below to proceed with Venmo payment:</p>
                        <button type="button" onclick="window.location.href='venmo.php' ">Pay with Venmo</button>
                    </div>

                    <div id="zelle-field" style="display: none;">
                        <p>Click the button below to proceed with Zelle payment:</p>
                        <button type="button" onclick="window.location.href='zelle.php' ">Pay with Zelle</button>
                    </div>
                </form>
            </div>

            <script>
                function togglePaymentFields() {
                    var method = document.getElementById('payment-method').value;
                    document.getElementById('credit-card-fields').style.display = method === 'credit_card' ? 'block' : 'none';
                    document.getElementById('paypal-fields').style.display = method === 'paypal' ? 'block' : 'none';
                    document.getElementById("gift-card-field").style.display = (method === "gift-card") ? "block" : "none";
                    document.getElementById("cashapp-field").style.display = (method === "cashapp") ? "block" : "none";
                    document.getElementById("venmo-field").style.display = (method === "venmo") ? "block" : "none";
                    document.getElementById("zelle-field").style.display = (method === "zelle") ? "block" : "none";
                }
            </script>

                    <div class="form-outline my-4 text-center w-50 m-auto ">
                        
                    </div>
                </form>
            </div>
</body>
</html>
