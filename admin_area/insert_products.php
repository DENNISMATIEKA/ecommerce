<?php

include('../include/connect.php'); 

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords =$_POST['product_keywords'];
    $product_categories =$_POST['product_categories'];
    $product_brands =$_POST['product_brands'];

    $product_image1 =$_FILES['product_image1']['name'];
    $product_image2 =$_FILES['product_image2']['name'];
    $product_image3 =$_FILES['product_image3']['name'];

    $temp_image1 =$_FILES['product_image1']['tmp_name'];
    $temp_image2 =$_FILES['product_image2']['tmp_name'];
    $temp_image3 =$_FILES['product_image3']['tmp_name'];

    $product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';
    $product_status = 'true';

    if ($product_title=='' or $description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='') {
        echo "<script>alert('Please fill all the available fields');</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, product_date, product_status) VALUES ('$product_title', '$description', '$product_keywords', '$product_categories', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the products');</script>";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product Admin-Dashboard</title>
     <!--Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Font Awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file-->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light" >
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_title" class="form-lable">Product Title</lable>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="description" class="form-lable">Product Description</lable>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_keywords" class="form-lable">Product Keywords </lable>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select Category</option>

                    <?php
                    
                    $select_query = "Select * from categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row=mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }

                    ?>
                    
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select Brand</option>

                    <?php
                    
                    $select_query = "Select * from brands";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row=mysqli_fetch_assoc($result_query)) {
                        $Brand_title = $row['brand_title'];
                        $Brand_id = $row['brand_id'];
                        echo "<option value='$Brand_id'>$Brand_title</option>";
                    }

                    ?>
                      
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_image1" class="form-lable">Product Image 1 </lable>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_image2" class="form-lable">Product Image 2 </lable>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_image3" class="form-lable">Product Image 3 </lable>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_price" class="form-lable">Product Price </lable>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
    
</body>
</html>