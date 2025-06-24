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
    <!--Font Awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="style.css">

    <style>
        .logo{
            width: 7%;
            height: 7%;
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                        </li>
                        
                    </ul>
                    <form class="d-flex" action="search_products.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

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
            <h3 class="text-center">Our Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

        <!--Fourth Child-->
        <div class="row p-1">

            <div class="col-md-12">

                <!--products-->
                <div class="row">

                <?php
                    if(!isset($_SESSION['username'])){
                        include('../users_area/user_login.php');
                    }else {
                        include('payment.php');
                    }
                ?>
                    
                </div>
            </div>

            <div class="col-md-2 bg-secondary p-0">
                <!--sidenav -->
                <!--Brands to be dislayed-->
                <ul class="navbar-nav me-auto text-center">

                </ul>

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