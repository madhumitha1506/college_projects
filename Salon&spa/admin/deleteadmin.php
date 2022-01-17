<?php
    include('../config/constants.php');
    $id =  $_GET['id'];
    $sql = "DELETE FROM admin WHERE id = $id";
    $res = mysqli_query($conn,$sql);
    if($res == True)
    {
        $_SESSION['delete'] = "<div class='success'>Admin Deleted successfully</div>";
        header('location:'.SITEURL.'admin/manageadmin.php');
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin</div>";
        header('location:'.SITEURL.'admin/manageadmin.php');
    }
?>