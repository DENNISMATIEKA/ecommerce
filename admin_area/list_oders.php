<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

        <?php
        
        $get_orders="Select * from `user_order` ";
        $result=mysqli_query($con, $get_orders);
        $row=mysqli_num_rows($result);
       
        if ($row==0) {
            echo "<h2 class='text-danger text-center nt-5'>No Oders Yet</h2>";
        }else {
            $number=0;
             echo "
                <th>SI no</th>
                <th>Due Amount</th>
                <th>Invoice number</th>
                <th>Total products</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Delete</th>
            </thead>
            <tbody class='bg-secondary text-light' >
            ";

            while ($row_data=mysqli_fetch_assoc($result)) {
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $amount_due=$row_data['amount_due'];
                $invoice_number=$row_data['invoice_number'];
                $total_products=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];
                $number++;
                echo "
                
                    <tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$invoice_number</td>
                        <td>$total_products</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        <td><a href='index.php?delete_order' class='text-light' ><i class='fa-solid fa-trash'></i></a></td>
                    </tr>

                ";
            }
        }
        
        ?>

        
        
    </tbody>
</table>