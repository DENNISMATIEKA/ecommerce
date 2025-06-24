<?php

include('../include/connect.php');
include('../function/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--Bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Font Awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file-->
    <link rel="stylesheet" href="../style.css">

    <style>
        .admin_image{
            width: 100px;
            object-fit: contain;
        }

        .footer{
            position: absolute;
            bottom: 0;
        }

        body{
            overflow-x: hidden;
        }

        .product_img{
            width: 100px;
            object-fit: contain;
        }

    </style>


</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </nav>

        <!--Second Child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!--Third Child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center ">
                <div class="px-5 py-3" >
                    <a href="#"><img src="../images/5.JPEG" alt="" class="admin_image" ></a>
                </div>
                <div class="button text-center">
                    <button class="my-3" ><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?list_oders" class="nav-link text-light bg-info my-1">All Orders </a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payment</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="../index.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!--fourth child-->
        <div class="container my-3">
            <?php 
                if (isset($_GET['insert_categories'])) {
                    include('insert_categories.php');
                }
                if (isset($_GET['view_categories'])) {
                    include('view_categories.php');
                }
                if (isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }
                if (isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }
                if (isset($_GET['insert_brands'])) {
                    include('insert_brands.php');
                }
                if (isset($_GET['view_brands'])) {
                    include('view_brands.php');
                }
                if (isset($_GET['edit_brand'])) {
                    include('edit_brand.php');
                }
                if (isset($_GET['delete_brand'])) {
                    include('delete_brand.php');
                }
                if (isset($_GET['list_oders'])) {
                    include('list_oders.php');
                }
                   if (isset($_GET['delete_order'])) {
                    include('delete_order.php');
                }
                if (isset($_GET['view_products'])) {
                    include('view_products.php');
                }
                if (isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }
                if (isset($_GET['delete_product'])) {
                    include('delete_product.php');
                }
                if (isset($_GET['list_payments'])) {
                    include('list_payments.php');
                }
                if (isset($_GET['list_users'])) {
                    include('list_users.php');
                }
                
                
                
               
            ?>
        </div>

        <!--last child
        <div class="bg-info p-3 text-center footer" >
            <p>Copy Right</p>
        </div>-->

    </div>

    <!--Bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>