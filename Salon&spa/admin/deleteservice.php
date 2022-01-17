<?php
    include('../config/constants.php');
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/service/".$image_name;
            $remove = unlink($path);
            if($remove == False)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to upload Image.</div>";
                header('location:'.SITEURL.'admin/manageservice.php');
                die();
            }
        }
        $sql = "DELETE FROM service WHERE id = $id";
        $res = mysqli_query($conn,$sql);
        if($res == True)
        {
            $_SESSION['delete'] = "<div class='success'>Service Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manageservice.php');

        }
        else{
            $_SESSION['delete'] = "<div class='error'>Failed to Delete service.</div>";
            header('location:'.SITEURL.'admin/manageservice.php');
        }
    }
    else{
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manageservice.php');
    }

?>