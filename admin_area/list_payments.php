<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

        <?php
        
        $get_payments="Select * from `user_payments` ";
        $result=mysqli_query($con, $get_payments);
        $row=mysqli_num_rows($result);
       
        if ($row==0) {
            echo "<h2 class='text-danger text-center nt-5'>No Payments Recieved Yet</h2>";
        }else {
            $number=0;
             echo "
                <th>SI no</th>
                <th>Invoice number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Order date</th>
                <th>Delete</th>
            </thead>
            <tbody class='bg-secondary text-light' >
            ";

            while ($row_data=mysqli_fetch_assoc($result)) {
                $order_id=$row_data['order_id'];
                $payment_id=$row_data['payment_id'];
                $amount=$row_data['amount'];
                $invoice_number=$row_data['invoice_number'];
                $payment_mode=$row_data['payment_mode'];
                $date=$row_data['date'];
                $number++;
                echo "
                
                    <tr>
                        <td>$number</td>
                        <td>$invoice_number</td>
                        <td>$amount</td>
                        <td>$payment_mode</td>
                        <td>$date</td>  
                        <td><a href='index.php?delete_payment' class='text-light' ><i class='fa-solid fa-trash'></i></a></td>
                    </tr>

                ";
            }
        }
        
        ?>

        
        
    </tbody>
</table>