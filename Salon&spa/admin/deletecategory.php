<?php
    
    include('../config/constants.php');
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name !="")
        {
            $path = "../images/category/".$image_name;

            $remove  = unlink($path);

            if($remove == False)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to remove Image</div>";
                header('location:'.SITEURL.'admin/managecategory.php');
                die();
            }
        }

        $sql = "DELETE FROM category WHERE id = $id";

        $res = mysqli_query($conn, $sql);

        if($res == True)
        {
            $_SESSION['delete'] ="<div class='success'>Category Deleted successfully.</div>";
            header('location:'.SITEURL.'admin/managecategory.php');
        }
        else{
            $_SESSION['delete'] ="<div class='error'>Failed to Delete Category .</div>";
            header('location:'.SITEURL.'admin/managecategory.php');
        }

         
    }
    else{
        header('location:'.SITEURL.'admin/managecategory.php');
    }



?>