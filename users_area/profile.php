<?php

include('../include/connect.php');
include('../function/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <!--Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Font Awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }
        .profile_img{
            width: 90%;
            display: block;
            margin: auto;
            object-fit: contain;
        }
        .edit_image{
            width: 100px;
            height: 100px;
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
                <img src="../images/logo.jpg" alt="" class="logo" >
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="profile.php">My Account</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart"><sup><?php cart_item();?></sup></i></a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>
                        
                    </ul>
                    <form class="d-flex" action="../search_products.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
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
                            <a class='nav-link' href='3'>Welcome Guest</a>
                        </li>";
                    }else {
                        echo "<li class='nav-item'>
                                <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
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
                            <a class='nav-link' href='#'>Logout</a>
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

        <!--Fourth child-->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh" >
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
                    </li>

                    <?php
                    
                    $username=$_SESSION['username'];
                    $user_image="Select * from `user_table` where username='$username' ";
                    $result_image=mysqli_query($con, $user_image);
                    $row_image=mysqli_fetch_array($result_image);
                    $user_image=$row_image['user_image'];
                    echo "<li class='nav-item'>
                        <img src='./users_images/$user_image' alt='' class='profile_img my-4' >
                    </li>";
                    
                    ?>
                    
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">Logout</a>
                    </li>
                </ul>                             
            </div>

            <div class="col-md-10 text-center">
                <?php get_user_order_details(); 
                    if (isset($_GET['edit_account'])) {
                        include('edit_account.php');
                    }
                    if (isset($_GET['my_orders'])) {
                        include('user_orders.php');
                    }
                     if (isset($_GET['delete_account'])) {
                        include('delete_account.php');
                    }
                ?>
            </div>

        </div>

       

        <!--last child-->
        <div class="bg-info p-3 text-center " >
            <p>Copy Right</p>
        </div>

    </div>


    <!--Bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>