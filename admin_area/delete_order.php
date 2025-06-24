<?php

    if (isset($_GET['delete_order'])) {
        $delete_order=$_GET['delete_order'];
        
        $delete_query="Delete from `user_order` where order_id='$delete_order' ";
        $result_query=mysqli_query($con, $delete_query);

        if ($result_query) {
            echo "<script>alert('Order is been deleted successfully')</script>";
            echo "<script>window.open('./index.php?list_orders', '_self')</script>";
        }
    }

?>