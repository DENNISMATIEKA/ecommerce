<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

        <?php
        
        $get_user="Select * from `user_table` ";
        $result=mysqli_query($con, $get_user);
        $row=mysqli_num_rows($result);
       
        if ($row==0) {
            echo "<h2 class='text-danger text-center nt-5'>No User Yet</h2>";
        }else {
            $number=0;
             echo "
                <th>SI no</th>
                <th>Username</th>
                <th>User Email</th>
            
                <th>User Address</th>
                <th>User mobile</th>
                <th>Delete</th>
            </thead>
            <tbody class='bg-secondary text-light' >
            ";

            while ($row_data=mysqli_fetch_assoc($result)) {
                $user_id=$row_data['user_id'];
                $username=$row_data['username'];
                $user_email=$row_data['user_email'];
               
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;
                echo "
                
                    <tr>
                        <td>$number</td>
                        <td>$username</td>
                        <td>$user_email</td>
                   
                        <td>$user_address</td>
                        <td>$user_mobile</td>    
                        <td><a href='index.php?delete_payment' class='text-light' ><i class='fa-solid fa-trash'></i></a></td>
                    </tr>

                ";
            }
        }
        
        ?>

        
        
    </tbody>
</table>