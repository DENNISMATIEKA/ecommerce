<?php

    if (isset($_GET['delete_category'])) {
        $delete_category=$_GET['delete_category'];
        
        $delete_query="Delete from `categories` where category_id=$delete_category ";
        $result_query=mysqli_query($con, $delete_query);

        if ($result_query) {
            echo "<script>alert('Category is been deleted successfully')</script>";
            echo "<script>window.open('./index.php?view_categories', '_self')</script>";
        }
    }

?>