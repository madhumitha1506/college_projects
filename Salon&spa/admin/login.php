<?php include('../config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css" >
</head>
<body class="login-back">
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        <?php
        
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login']))
            {
                echo $_SESSION['no-login'];
                unset($_SESSION['no-login']);
            }
        
        ?>
        <br><br>
        <form action="" method = "POST" class="text-center">
            Username: <br><br>
            <input type="text" name="username" placeholder="Enter Username">
            <br><br>
            Password: <br><br>
            <input type="password" name="password" placeholder="Enter Password">
            <br><br>
            <input type="submit" value="Login" name="submit" class="btn-primary">
        </form>
        <br><br>
        <p class="text-center">Created By. <a href="www.madhu.com">Madhumitha</a></p>
    </div>
</body>
</html>

<?php
    
    if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $count  = mysqli_num_rows($res);

        if($count == 1)
        {
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'admin/');
        }
        else{
            $_SESSION['login'] = "<div class='error'>Login Failed.</div>";
            header('location:'.SITEURL.'admin/');
        }
    }
?>