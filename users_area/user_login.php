<?php

include('../include/connect.php');
include('../function/common_function.php');
@session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnceeHub</title>
    <!--Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        overflow-x: hidden;
    }
</style>
<body>
    <div class="container-fluid my-3 ">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flrx align-items-center justify-content-center mt-5 ">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <!--username field-->
                    <div class="form-outline mb-4 ">
                        <label for="user_username" class="form-lable" >Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username" />
                    </div>
                    <!--password field-->
                    <div class="form-outline mb-4 ">
                        <label for="user_password" class="form-lable" >Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password" />
                    </div>
                    <div class="mt-4 pt-2" >
                        <input type="submit" value="Login" class="bg-info py2 px3 border-0" name="user_login" >
                        <p class="small fw-bold mt-2 pt-1 mb-0" >Don't have an account ? <a href="user_registration.php" class="text-danger" > Register</a> </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>

<?php

if (isset($_POST['user_login'])) {
    $user_username=$_POST['user_username'];
    //$user_password=$_POST['user_password'];

    $select_query="Select * from `user_table` where username= '$user_username'";
    $result=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip= getIPAddress();

    //cart item
    $select_query_cart="Select * from `cart_details` where ip_address= '$user_ip'";
    $select_cart=mysqli_query($con, $select_query_cart);
    $rows_count_cart=mysqli_num_rows($select_cart);

    if ($rows_count>0) {
        $_SESSION['username']=$user_username;
        //if (password_verify($user_password,$row_data['user_password'])) {
            if ($rows_count==1 and $rows_count_cart==0) {
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            }else {
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php', '_self')</script>";
            }
        //}else {
          //  echo "<script>alert('Invalid Credentials')</script>";
        //}
    }else {
        echo "<script>alert('Invalid Credentials')</script>";
    }

}

?>













