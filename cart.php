<?php

include('include/connect.php');
include('function/common_function.php');
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
    <!--Font Awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="style.css">

    <!--styles-->
    <style>

        .cart_image{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

    </style>

</head>
<body>
    <!--first child-->
    <!--Navbar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="./images/logo.jpg" alt="" class="logo" >
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"><sup><?php cart_item();?></sup></i></a>
                        </li>
                         
                    </ul>
                </div>
            </div> 
        </nav>

        <!--calling cart function-->
        <?php
        
        cart();

        ?>

        <!--Second Child-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php
                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>";
                    }else {
                        echo "<li class='nav-item'>
                                <a class='nav-link' href='#.php'>Welcome ".$_SESSION['username']."</a>
                            </li>";
                        }
                    ?>

                <?php
                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                        </li>";
                    }else {
                      echo "<li class='nav-item'>
                            <a class='nav-link' href='logout.php'>Logout</a>
                        </li>";
                    }
                ?>

            </ul>
        </nav>

        <!--Third Child-->
        <div class="bg-light">
            <h3 class="text-center">EnceeHub</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!--fourth child-->
        <div class="container" text-center>
            <div class="row">
                <form action="" method="post">
                    <table class="table toble-bordered">
                            <!--php to display dynamic data-->
                            <?php
                            
                                $get_ip_add = getIPAddress();
                                $total_price = 0;
                                $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add' ";
                                $result = mysqli_query($con, $cart_query);
                                $result_count=mysqli_num_rows($result);
                                if ($result_count>0) {
                                    echo "<thead>
                                        <tr>
                                            <th>Product Title</th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Remove</th>
                                            <th colspan='2' >Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    while ($row=mysqli_fetch_array($result)) {
                                        $product_id=$row['product_id'];
                                        $select_products= "Select * from `products` where product_id='$product_id' ";
                                        $result_products = mysqli_query($con, $select_products);

                                        while ($row_product_price=mysqli_fetch_array($result_products)) {
                                            $product_price = array ($row_product_price['product_price']);
                                            $price_table = array ($row_product_price['product_price']);
                                            $product_title = array ($row_product_price['product_title']);
                                            $product_image1 = array ($row_product_price['product_image1']);
                                            $product_value = array_sum ($product_price);
                                            $total_price += $product_value;
                                        

                                ?>  

                                        <tr>
                                            <td><?php echo implode("", $product_title) ?></td>
                                            <td><img src="./admin_area/product_images/<?php echo implode("", $product_image1) ?>" ait="" class="cart_image" ></td>
                                            <td><input type="text" class="form-input w-50 " name="qty"></td>

                                            <?php

                                            $get_ip_add = getIPAddress();
                                            if (isset($_POST['update_cart'])) {
                                                $quantities = $_POST['qty'];
                                                $update_cart ="Update `cart_details` set quantity=$quantities where ip_address= '$get_ip_add' ";
                                                $result_products_quantity = mysqli_query($con, $update_cart);
                                                $total_price = $total_price * $quantities;
                                            }
                                            
                                            ?>

                                            <td><?php echo implode("", $price_table) ?>/-</td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"  ></td>
                                            <td>
                                                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 mx-3 border-0" name="update_cart" ></input>
                                                <input type="submit" value="Remove Cart" class="bg-info p-3 py-2 mx-3 border-0" name="remove_cart" ></input>
                                            </td>
                                        </tr>

                                        <?php   
                                            }
                                    } 
                                }
                                else {
                                    echo "<h2 class='text-center  text-danger' >Cart is Empty!!!</h2>";
                                }
                            ?>

                        </tbody>
                    </table>
                        
                    <!--subtotals-->
                    <div class="d-flex mb-5" >

                        <?PHP
                        $get_ip_add = getIPAddress();
                                $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add' ";
                                $result = mysqli_query($con, $cart_query);
                                $result_count=mysqli_num_rows($result);
                                if ($result_count>0) {
                                    echo "<h4 class='px-3'>Subtotal: <strong class='text-info' >$$total_price</strong>/-</h4>
                                    <a href='index.php' class='bg-info px-3 py-2 mx-3 border-0 text-decoration-none '>Continue Shopping</a>
                                    <button class='bg-secondary px-3 py-2 border-0' ><a href='./users_area/checkout.php' class='text-light text-decoration-none' >Checkout</button></a>";
                                }else {
                                    echo "<a href='index.php' class='bg-info px-3 py-2 mx-3 border-0 '>Continue Shopping</a>";
                                }
                        ?>
                    </div>               
                
            </div>
        </div>
        </form>

        <!--funvtion to remove item-->
        <?php
        
        function remove_cart_item(){
            global $con;
            if (isset($_POST['remove_cart'])) {

                foreach ($_POST['removeitem'] as $remove_id ) {
                    echo $remove_id;
                    $delete_query = "Delete from `cart_details` where product_id=$remove_id ";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php', '_self')</script>"; 
                    }
                }
                
            }

        }
        echo $remove_item= remove_cart_item();
        
        ?>
           
        <!--last child-->
        <div class="bg-info p-3 text-center " >
            <p>Copy Right</p>
        </div>

    </div>


    <!--Bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>