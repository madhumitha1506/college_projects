<?php include ('partials/menu.php');?>

<div class="main">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
        
            $id = $_GET['id'];

            $sql = "SELECT * FROM admin WHERE id = $id";

            $res = mysqli_query($conn,$sql);

            if($res == True)
            {
                $count = mysqli_num_rows($res);

                if($count == 1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else{
                    header('location:'.SITEURL.'admin/manageadmin.php');
                }
            }
        
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>UserName:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>"> 
                        <input type="submit" name= "submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
    </div>
</div>
<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username']; 

    $sql = "UPDATE admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id= '$id'
     ";

     $res = mysqli_query($conn,$sql);

     if($res == True)
     {
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
        header('location:'.SITEURL.'admin/manageadmin.php');
     }
     else{
        $_SESSION['update'] = "<div class='error'>Failed to Update Admin</div>";
        header('location:'.SITEURL.'admin/manageadmin.php');
     }
}




?>
<?php include ('partials/footer.php');?>


