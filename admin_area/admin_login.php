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
    <title>Admin Login</title>
    <!--Bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Font Awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            overflow: hidden;         
        }
    </style>

</head>
<body>
    <div class="container-fluid my-3 ">
        <h2 class="text-center">Admin Login</h2>
        <div class="row d-flrx align-items-center justify-content-center mt-5 ">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <!--username field-->
                    <div class="form-outline nmb-4 ">
                        <label for="admin_username" class="form-lable" >Username</label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="admin_username" />
                    </div>
                    <!--password field-->
                    <div class="form-outline mb-4 ">
                        <label for="admin_password" class="form-lable" >Password</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="admin_password" />
                    </div>
                    <div class="mt-4 pt-2" >
                        <input type="submit" value="Login" class="bg-info py2 px3 border-0" name="admin_login" >
                        <p class="small fw-bold mt-2 pt-1 mb-0" >Don't have an account ? <a href="admin_registration.php" class="text-danger" > Register</a> </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</body>
</html>

<?php

if (isset($_POST['admin_login'])) {
    $admin_username=$_POST['admin_username'];
    $admin_password=$_POST['admin_password'];

    $select_query="Select * from `admin_table` where admin_name= '$admin_username'";
    $result=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if ($rows_count>0) {
        $_SESSION['admin_name']=$admin_username;
        if (password_verify($admin_password,$row_data['admin_password'])) {
            if ($rows_count==1) {
                $_SESSION['admin_name']=$admin_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }else {
               $_SESSION['admin_name']=$admin_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }
        }else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else {
        echo "<script>alert('Invalid Credentials')</script>";
    }


}

?>
